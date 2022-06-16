<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "participateAssignment", "getRegisteredOverview", "deregister", "getRequestDetails", "getMemberProfile", "getRequestDetailsAssigned"]));
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

        if ($result) {
            $this->redirect("/opdrachten");
        } else {
            echo "Er is iets fout gegegaan tijdens het aanmelden voor opdracht " . $id;
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

    public function getRequestDetailsAssigned($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        $this->view("/member/requestDetailsAssigned", $result);
    }
}
