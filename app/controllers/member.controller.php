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

    public function unsubscribeFromAssignment($payload)
    {
        $requestId = $payload["requestId"];
        if (isset($payload["reasonFor"])) {
            $reasonFor = $payload["reasonFor"];
        } else {
            $reasonFor = null;
        }

        $this->memberModel->unsubscribeFromAssignment($requestId, $reasonFor);

        $this->redirect("/opdracht/$requestId/details");
    }

    public function getRequestDetails($data)
    {
        $email = Application::$app->session->get("user");
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($email, $id);
        $assignedMembers = $this->memberModel->getAllAssignedMembersByRequestId($id);

        $result = Array(
            "details" => $result,
            "assignedMembers" => $assignedMembers
        );
        $this->view("/member/requestDetails", $result);
    }

    public function getMemberProfile($message = null)
    {
        $email = Application::$app->session->get("user");

        $result = $this->memberModel->getMemberDetailsStatisticsAndHistory($email);

        if ($message != null) {
            $result['message'] = $message;
            $this->view("/member/profile", $result);
        }

        $this->view("/member/profile", $result);
    }

    public function getRequestDetailsAssigned($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails("jens@lotus.nl", $id);

        $this->view("/member/requestDetailsAssigned", $result);
    }

    public function changeProfile($payload)
    {
        $activeRole = Application::$app->session->get("activeRole");
        // change profile info
        if (!empty($payload['userEmail'])) {
            $this->editProfile($payload);
        }
        // change pwd
        if (!empty($payload['oldPdw'])) {
            $this->editPwd($payload);
        }

        // $this->redirect("/profiel");
    }

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
        $userEmail = $payload['userEmail'];


        if ($gender == "1") {
            $gender = "M";
        } else if ($gender == "2") {
            $gender = "V";
        } else if ($gender == "3") {
            $gender = "O";
        }



        if ($email != $userEmail) {
            $result = $this->memberModel->userExists($email);
        } else {
            $result = null;
        }

        if ($result != null) {
            $message['message'] = "Gebruiker met deze email bestaat al!";
            // $this->view("/member/profile", $data);
            $this->getMemberProfile($message);
        } else {

            Application::$app->session->set("user", $email);
            $result = $this->memberModel->editProfile($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $userEmail);

            if ($result != null) {
                $message['message'] = "Profielgegevens zijn gewijzigd!";
                $this->getMemberProfile($message);
            } else {
                $message['message'] = "Er is iets fout gegaan met het wijzigen van je profiel!";
                $this->getMemberProfile($message);
            }
        }
    }

    public function editPwd($payload)
    {
        $email = $payload['email'];
        $oldPwd = $payload['oldPdw'];
        $newPwd = $payload['newPdw'];
        $copyPwd = $payload['copyPdw'];


        $result = $this->memberModel->authenticate($email, $oldPwd);

        if ($result != null) {

            if ($newPwd == $payload['copyPdw']) {
                $this->memberModel->changePwd($email, $newPwd);
                $message['message'] = "Uw wachtwoord is gewijzigd!";
                $this->getMemberProfile($message);
            } else {
                $message['message'] = "Herhaald wachtwoord komt niet overeen";
                $this->getMemberProfile($message);
            }
        } else {
            $message['message'] = "Wachtwoord is onjuist";
            $this->getMemberProfile($message);
        }
    }
}
