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
    
}