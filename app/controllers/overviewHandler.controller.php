<?php
class OverviewHandler extends Controller
{
    public function __construct()
    {
        $this->memberController = new MemberController;
        $this->coordController = new CoordController;
        $this->clientController = new ClientController;
        $this->exceptionController = new ExceptionController;
        
    }

    public function getOverview() {
        $activeRole = Application::$app->session->get("activeRole");

        if (strtolower($activeRole) == "lid") {
            $this->memberController->getOverview();
        } else if (strtolower($activeRole) == "coordinator") {
            $this->coordController->getOverview();
        } else if (strtolower($activeRole) == "opdrachtgever") {
            $this->clientController->getOverview();
        } else {
            $this->exceptionController->_500();
        }
    }
}