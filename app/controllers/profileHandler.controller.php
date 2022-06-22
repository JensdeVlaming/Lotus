<?php
class ProfileHandler extends Controller
{
    public function __construct()
    {
        $this->memberController = new MemberController;
        $this->coordController = new CoordController;
        $this->clientController = new ClientController;
        $this->exceptionController = new ExceptionController;
       
        
    }

    public function getProfile() {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->getMemberProfile();
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->getCoordProfile();
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->getClientProfile();
        } else {
            $this->exceptionController->_500();
        }
    }

    public function editProfile($payload)
    {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->editProfile($payload);
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->editProfile($payload);
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->editProfile($payload);
        } else {
            $this->exceptionController->_500();
        }
    }


    public function getProfileInfo() {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->getMemberDetails();
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->getCoordDetails();
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->getClientDetails();
        } else {
            $this->exceptionController->_500();
        }
    }    

    public function goEditPassword($data) {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->goEditPassword();
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->goEditPassword();
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->goEditPassword();
        } else {
            $this->exceptionController->_500();
        }
    }  

    public function editPassword($payload) {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->editPassword($payload);
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->editPassword($payload);
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->editPassword($payload);
        } else {
            $this->exceptionController->_500();
        }
    }  


}