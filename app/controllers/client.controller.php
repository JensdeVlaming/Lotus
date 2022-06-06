<?php

class ClientController extends Controller
{

    public function __construct()
    {
        $this->clientModel = $this->model("client");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
    }

    public function getOverview()
    {
        $email = Application::$app->session->get("user");
        $resultSet = $this->clientModel->getRequests($email);

        $this->view("/client/overview", $resultSet);
    }

    public function cancelRequest($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->cancelRequest($id);
    
        if ($result) {
            echo "Opdracht is succesvol geannuleerd met id ".$id;
        } else {
            echo "Er is iets fout gegegaan tijdens het annuleren van opdracht ".$id;
        }
    }
}
