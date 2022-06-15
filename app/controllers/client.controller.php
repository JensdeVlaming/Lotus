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

        $this->clientModel->cancelRequest($id);

        echo "U heeft opdracht " . $id . " verwijderd.";

    }

    public function getRequestDetails($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        self::view("/client/requestDetails", $result);
       
    }

    public function getRequestDetailsForEdit($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->getRequestDetailsForEdit($id);

        self::view("/client/editRequest", $result);
       
    }

    
}
