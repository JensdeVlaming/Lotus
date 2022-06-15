<?php
class AssigmentDetailsHandler extends Controller
{
    public function __construct()
    {
        $this->memberController = new MemberController;
        $this->coordController = new CoordController;
        $this->clientController = new ClientController;
        $this->exceptionController = new ExceptionController;
        
    }

    public function getDetails($data) {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->getRequestDetails($data);
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->getRequestDetails($data);
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->getRequestDetails($data);
        } else {
            $this->exceptionController->_500();
        }
    }
}