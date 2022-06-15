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

        $this->redirect("/overzicht");
    }

    public function getRequestDetails($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->requestDetails($id);

        self::view("/client/requestDetails", $result);
       
    }

<<<<<<< HEAD
    public function getRequestDetailsForEdit($data) {
        $id = $data["params"]["id"];

        $result = $this->clientModel->getRequestDetailsForEdit($id);

        self::view("/client/editRequest", $result);
       
    }

    
=======
    public function getClientProfile() {
        $email = Application::$app->session->get("user");


        $result = $this->clientModel->getProfile($email);
        self::view("/client/profile", $result );
    }
>>>>>>> a54ff9987fef7c2e27450d3241d97c9b6cd1eb78
}
