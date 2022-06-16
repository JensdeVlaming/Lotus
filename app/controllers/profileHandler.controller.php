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

    public function changeProfile($data) {
        // change pwd
        if (!empty($date['old-pwd'])) { 
            $result = $this->userModel->authenticate($data["email"], $data["old-pwd"]);

            if ($result != null && $datap["new-pwd"] == $data['copy-pwd']){
                $this->userModel->changePwd($data["new"]);
            }
        } 

        // change profile info
        if (!empyt($date['email'])) {
            $this->userModel->editProfile($data);
        }
       
        $this->view("member/profile");
    }
}