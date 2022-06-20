<?php
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->memberModel = $this->model("register");
    }

    public function register($payload)
    {

        $this->requestModel->addClient();


        $this->redirect("/overzicht");
    }
}
