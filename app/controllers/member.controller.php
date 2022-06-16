<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->mailModel = $this->model("mail");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
    }

    public function getOverview()
    {
        $resultSet = $this->memberModel->getOpenAssignments();

        $this->view("member/overview", $resultSet);
    }

    public function participateAssignment($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->participateAssignment($id);
        $this->mailModel->participateAssignment();

        if ($result) {
            $this->redirect("/opdrachten");
        } else {
            echo "Er is iets fout gegegaan tijdens het aanmelden voor opdracht " . $id;
        }
    }

    public function getRegisteredOverview()
    {
        $resultSet = $this->memberModel->getRegisteredAssignments();

        self::view("member/registeredAssignments", $resultSet);
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

        self::view("/member/requestDetails", $result);
       
    }

    public function getRequestDetailsAssigned($data) {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        
            self::view("/member/requestDetailsAssigned", $result);
        

    }
}
