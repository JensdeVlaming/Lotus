<?php

class ClientController extends Controller
{

    public function __construct() {
        $this->clientModel=$this->model("client");
    }

    public function requests()
    {
    

       $resultSet=$this->clientModel->getRequests("clienta@lotus.nl");

    //   print_r($resultSet);
    $this->view("/client/requestOverview",$resultSet);
    }

}