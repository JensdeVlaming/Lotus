<?php
class CoordController extends Controller
{
    public function __construct()
    {
        $this->coordModel = $this->model("coord");
        $this->memberModel = $this->model("member");
        $this->userModel = $this->model("user");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
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

        Application::$app->controller->redirect("/overzicht-coordinator");
    }

    public function acceptAssignment($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->acceptAssignment($id);
        Application::$app->controller->redirect("/overzicht-coordinator");
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
        } else if ($result == 2) {
            $data = [
                "error" => "Lid bestaat al"
            ];
            $this->view("/coord/memberForm", $data);
        } else {
            $data = [
                "error" => "Er is iets fout gegaan. Probeer het opnieuw."
            ];
            $this->view("/coord/memberForm", $data);
        }
    }
}
