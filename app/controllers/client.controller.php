<?php

class ClientController extends Controller
{

    public function __construct()
    {
        $this->clientModel = $this->model("client");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "cancelRequest", "getRequestDetails", "editRequest", "getClientProfile"]));
    }

    public function getOverview()
    {
        $email = Application::$app->session->get("user");

        $resultSet = $this->clientModel->getRequests($email);

        $this->view("/client/overview", $resultSet);
    }

    public function cancelRequest($data)
    {
        $id = $data["params"]["id"];

        $this->clientModel->cancelRequest($id);

        $this->redirect("/overzicht");
    }

    public function getRequestDetails($data)
    {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        $this->view("/client/requestDetails", $result);
    }


    public function editRequest($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        $this->view("/client/editRequest", $result);
    }


    public function getClientProfile() {
        $email = Application::$app->session->get("user");

        $result = $this->clientModel->getProfile($email);

        $this->view("/client/profile", $result);
    }

    public function getClientDetails()
    {
        $email = Application::$app->session->get("user");

        $result = $this->clientModel->getClientDetails($email);

        $this->view("/editProfile", $result);
    }

     // edit profile functions
     public function editProfile($payload)
     {
         $email = $payload['email'];
         $firstName = $payload['firstName'];
         $lastName = $payload['lastName'];
         $street = $payload['street'];
         $premise = $payload['premise'];
         $city = $payload['city'];
         $postalCode = $payload['postalCode'];
         $phoneNumber = $payload['phoneNumber'];
         $gender = $payload['gender'];
         $userEmail = Application::$app->session->get("user");
 
     
         if ($gender == "1") {
             $gender = "M";
         } else if ($gender == "2") {
             $gender = "V";
         } else if ($gender == "3") {
             $gender = "O";
         }
 
         $message = $this->profileMessageArray($email,$firstName,$lastName,$street,$premise,$city,$postalCode,$phoneNumber,$gender);
 
         if ($email != $userEmail) {
             $result = $this->memberModel->userExists($email);
         } else {
            $result = null;
         }
 
         if ($result != null) {
         
             $message['message'] = "Gebruiker met deze email bestaat al!";
             $this->view("/editProfile", $message);
             
         } else {
 
             Application::$app->session->set("user", $email);
             $result = $this->clientModel->editProfile($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $userEmail);
 
             if ($result != null) {
                 $message['message'] = "Profielgegevens zijn gewijzigd!";
                 $this->view("/editProfile", $message);
             } else {
                 $message['message'] = "Er is iets fout gegaan met het wijzigen van je profiel!";
                 $this->view("/editProfile", $message);
             }
         }
 
         
     }
 
     public function editPassword($payload)
     {
         $email = Application::$app->session->get("user");
         $oldPwd = $payload['oldPdw'];
         $newPwd = $payload['newPdw'];
         $copyPwd = $payload['copyPdw'];
 
 
         $result = $this->clientModel->authenticate($email, $oldPwd);
 
         if ($result != null) {
 
             if ($newPwd == $payload['copyPdw']) {
                 $this->clientModel->changePwd($email, $newPwd);
                 $message['message'] = "Uw wachtwoord is gewijzigd!";
                 $this->view("/editPassword", $message);
             } else {
                 $message['message'] = "Herhaald wachtwoord komt niet overeen!";
                 $this->view("/editPassword", $message);
             }
         } else {
             $message['message'] = "Wachtwoord is onjuist!";
             $this->view("/editPassword", $message);
         }
     }
 
     public function goEditPassword() {
     
         $this->view("/editPassword");
     }
 
     public function profileMessageArray($email,$firstName,$lastName,$street,$premise,$city,$postalCode,$phoneNumber,$gender) {
         $message['email'] = $email ;
         $message['firstName'] = $firstName;
         $message['lastName'] = $lastName;
         $message['street'] = $street;
         $message['premise'] = $premise;
         $message['city'] = $city;
         $message['postalCode'] = $postalCode;
         $message['phoneNumber'] = $phoneNumber;
         $message['gender'] = $gender;
 
         return $message;
 
     }

}
