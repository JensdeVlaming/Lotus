<?php
class CoordController extends Controller
{
    public function __construct()
    {
        $this->coordModel = $this->model("coord");
        $this->memberModel = $this->model("member");
        $this->userModel = $this->model("user");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "getRegistry", "declineAssignment", "acceptAssignment", "getRequestDetails", "getMemberAndRequestDetails", "getCoordProfile", "addMember", "createMember"]));
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

        Application::$app->controller->redirect("/overzicht");
    }

    public function acceptAssignment($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->AssigmentInProgress($id);
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
}
