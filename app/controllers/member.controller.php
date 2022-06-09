<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
    }

    public function getOverview()
    {
        $resultSet = $this->memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            $this->view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }

    public function participateAssignment($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->participateAssignment($id);

        if ($result) {
            echo "Succesvol aangemeld voor opdracht " . $id;
        } else {
            echo "Er is iets fout gegegaan tijdens het aanmelden voor opdracht " . $id;
        }
    }

    public function getRegisteredOverview()
    {
        $resultSet = $this->memberModel->getRegisteredAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/registeredAssignments", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }

    public function deregister($payload)
    {
        $requestId = $payload["requestId"];
        $reasonFor = $payload["reasonFor"];

        $resultSet = $this->memberModel->deregister($requestId, $reasonFor);

        $this->redirect("/opdrachten");
    }

    public function getRequestDetails($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        if ($result) {
            self::view("/member/requestDetails", $result);
        } else {
            echo "The request with id: " . $id . " is not found. Make sure you got the right id!";
        }
    }
}
