<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "participateAssignment", "getRegisteredOverview", "deregister", "getRequestDetails", "getMemberProfile", "getRequestDetailsAssigned"]));
        $this->mailModel = $this->model("mail");
    }

    public function getOverview()
    {
        $email = Application::$app->session->get("user");

        $resultSet = $this->memberModel->getOpenRequests($email);

        $this->view("member/overview", $resultSet);
    }

    public function participateAssignment($data)
    {
        $id = $data["params"]["id"];
        $email = Application::$app->session->get("user");

        $result = $this->memberModel->participateAssignment($id, $email);

        if ($result == 1) {
            $this->mailModel->participateAssignment($this->memberModel->getAssignmentDetailsByMailAndId($id));
            $this->redirect("/opdrachten");
        } else {
            $this->exceptionController->_500();
        }
    }

    public function getRegisteredOverview()
    {
        $resultSet = $this->memberModel->getRegisteredAssignments();

        $this->view("member/registeredAssignments", $resultSet);
    }

    public function deregister($payload)
    {
        $requestId = $payload["requestId"];
        $reasonFor = $payload["reasonFor"];

        $this->memberModel->deregister($requestId, $reasonFor);

        $this->redirect("/opdrachten");
    }

    public function getRequestDetails($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        $this->view("/member/requestDetails", $result);
    }

    public function getMemberProfile()
    {
        $email = Application::$app->session->get("user");

        $result = $this->memberModel->getMemberDetailsStatisticsAndHistory($email);

        $this->view("/member/profile", $result);
    }

    public function getMemberDetails()
    {
        $email = Application::$app->session->get("user");

        $result = $this->memberModel->getMemberDetails($email);

        $this->view("/editProfile", $result);
    }

    public function getRequestDetailsAssigned($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        $this->view("/member/requestDetailsAssigned", $result);
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
            $result = $this->memberModel->editProfile($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $userEmail);

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


        $result = $this->memberModel->authenticate($email, $oldPwd);

        if ($result != null) {

            if ($newPwd == $payload['copyPdw']) {
                $this->memberModel->changePwd($email, $newPwd);
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
