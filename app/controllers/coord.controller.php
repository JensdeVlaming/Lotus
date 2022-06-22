<?php
class CoordController extends Controller
{
    public function __construct()
    {
        $this->coordModel = $this->model("coord");
        $this->memberModel = $this->model("member");
        $this->userModel = $this->model("user");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "getRegistry", "declineAssignment", "acceptAssignment", "getRequestDetails", "getMemberAndRequestDetails", "getCoordProfile", "addMember", "createMember"]));
        $this->mailModel = $this->model("mail");
    }

    public function getOverview()
    {
        $resultSet = $this->coordModel->getAssignmentRequests();

        if (sizeOf($resultSet) > 0) {
            $this->view("coord/overview", $resultSet);
        } else {
            echo "No requests found.";
        }
    }

    public function getRegistry()
    {
        $result = $this->memberModel->getAllMembers();

        $this->view("coord/registry", $result);
    }

    public function declineAssignment($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->declineAssignment($id);
        $this->mailModel->requestReviewEmail(0, $this->coordModel->getRequestDetails($id));

        Application::$app->controller->redirect("/overzicht");
    }

    public function AssignmentInProgress($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->AssignmentInProgress($id);
        $this->mailModel->requestReviewEmail(1, $this->coordModel->getRequestDetails($id));

        Application::$app->controller->redirect("/overzicht");
    }

    public function getRequestDetails($data) {
        $id = $data["params"]["id"];

        $result =  $this->coordModel->getRequestDetails($id);
        $openMembers = $this->memberModel->getAllOpenMembersByRequestId($id);
        $assignedMembers = $this->memberModel->getAllAssignedMembersByRequestId($id);

        $result = Array(
            "details" => $result,
            "openMembers" => $openMembers,
            "assignedMembers" => $assignedMembers
        );

        $this->view("/coord/requestDetails", $result);
    }

    public function getMemberAndRequestDetails($data)
    {
        $email = $data["params"]["email"];

        $result = $this->memberModel->getMemberDetailsStatisticsAndHistory($email);

        $this->view("/coord/memberDetails", $result);
    }

    public function getCoordProfile()
    {
        $email = Application::$app->session->get("user");

        $result = $this->coordModel->getProfile($email);

        $this->view("/coord/profile", $result);
    }

    public function getCoordDetails()
    {
        $email = Application::$app->session->get("user");

        $result = $this->coordModel->getCoordDetails($email);

        $this->view("/editProfile", $result);
    }

    public function addMember()
    {
        $this->view("/coord/memberForm");
    }

    public function createMember($data)
    {
        $email = $data["email"];
        $firstName = $data["firstName"];
        $lastName = $data["lastName"];
        $street = $data["street"];
        $premise = $data["premise"];
        $city = $data["city"];
        $postalCode = $data["postalCode"];
        $phoneNumber = $data["phoneNumber"];
        $gender = $data["gender"];

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, 6);

        $result = $this->userModel->create($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $password);

        if ($result == 1) {
            $this->redirect("/leden");
        } else {
            $data = [
                "error" => "Lid bestaat al of er is iets fout gegaan."
            ];
            $this->view("/coord/memberForm", $data);
        }
    }

    public function assignMemberToAssigment($data) {
        $id = $data["params"]["id"];
        $email = $data["params"]["email"];

        $result = $this->coordModel->assignMemberToAssigment($id, $email);

        if ($result) {
            $this->redirect("/opdracht/$id/details");
        } else {
            echo "Er is iets fout gegegaan tijdens het toewijzen van lid voor opdracht " . $id;
        }
    }

    public function deleteMemberFromAssigment($data) {
        $id = $data["params"]["id"];
        $email = $data["params"]["email"];

        $result = $this->coordModel->deleteMemberFromAssigment($id, $email);

        if ($result) {
            $this->redirect("/opdracht/$id/details");
        } else {
            echo "Er is iets fout gegegaan tijdens het verwijderen van lid voor opdracht " . $id;
        }
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
              $result = $this->coordModel->userExists($email);
          } else {
             $result = null;
          }
  
          if ($result != null) {
          
              $message['message'] = "Gebruiker met deze email bestaat al!";
              $this->view("/editProfile", $message);
              
          } else {
  
              Application::$app->session->set("user", $email);
              $result = $this->coordModel->editProfile($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $userEmail);
  
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
  
  
          $result = $this->coordModel->authenticate($email, $oldPwd);
  
          if ($result != null) {
  
              if ($newPwd == $payload['copyPdw']) {
                  $this->coordModel->changePwd($email, $newPwd);
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
