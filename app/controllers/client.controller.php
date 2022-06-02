<?php

class ClientController extends Controller
{

    public function __construct()
    {
        $this->clientModel = $this->model("client");
    }

    public function overview()
    {
        $email = Application::$app->session->get("user");
        $resultSet = $this->clientModel->getRequests($email);

        $this->view("/client/requestOverview", $resultSet);
    }
}
