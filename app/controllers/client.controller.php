<?php

class ClientController extends Controller
{

    public function __construct()
    {
        $this->clientModel = $this->model("client");
        $this->registerMiddleware(new AuthMiddleware(["getOverview", "cancelRequest", "getRequestDetails", "editRequest", "getClientProfile"]));
    }

    public function getOverview()
    {
        $email = Application::$app->session->get("user");

        $resultSet = $this->clientModel->getRequests($email);

        $this->view("/client/overview", $resultSet);
    }

    public function cancelRequest($data)
    {
        $id = $data["params"]["id"];

        $this->clientModel->cancelRequest($id);

        $this->redirect("/overzicht");
    }

    public function getRequestDetails($data)
    {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        $this->view("/client/requestDetails", $result);
    }


    public function getRequestDetailsForEdit($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        $this->view("/client/editRequest", $result);
    }


    public function getClientProfile() {
        $email = Application::$app->session->get("user");

        $result = $this->clientModel->getProfile($email);

        $this->view("/client/profile", $result);
    }

}
