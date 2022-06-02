<?php
class CoordController extends Controller
{
    public function __construct()
    {
        $this->coordModel = $this->model("coord");
    }

    public function showRequestOverview()
    {

        $resultSet = $this->coordModel->getAssignmentRequests();

        if (sizeOf($resultSet) > 0) {
            $this->view("coord/requestOverview", $resultSet);
        } else {
            echo "No requests found.";
        }
    }

    public function declineAssignment($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->declineAssignment($id);

        $this->showRequestOverview();
    }

    public function acceptAssignment($data)
    {
        $id = $data["params"]["id"];

        $this->coordModel->acceptAssignment($id);
        $this->showRequestOverview();

    }
}