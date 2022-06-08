<?php
class CoordController extends Controller
{
    public function __construct()
    {
        $this->coordModel = $this->model("coord");
        $this->memberModel = $this->model("member");
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

    public function AssigmentInProgress($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->AssigmentInProgress($id);
        Application::$app->controller->redirect("/overzicht-coordinator");

    }
}