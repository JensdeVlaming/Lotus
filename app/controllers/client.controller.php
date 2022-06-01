<?php

class ClientController extends Controller
{

    public function __construct() {
        $this->clientModel=$this->model("client");
    }

    public function requests()
    {
        $data = [
            "email" => $_POST["email"],
            "error" => "Foutieve inlog"
        ];

    
       $resultSet=$this->clientModel->getRequests("clienta@lotus.nl");

      print_r($resultSet);
    }

}