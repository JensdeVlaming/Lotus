<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
    }

    public function getOverview()
    {
        $resultSet = $this->memberModel->getOpenAssignments();

        $this->view("member/overview", $resultSet);
    }

    public function participateAssignment($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->participateAssignment($id);

        if ($result) {
            $this->redirect("/opdrachten");
        } else {
            echo "Er is iets fout gegegaan tijdens het aanmelden voor opdracht " . $id;
        }
    }

    public function getRegisteredOverview()
    {
        $resultSet = $this->memberModel->getRegisteredAssignments();

        self::view("member/registeredAssignments", $resultSet);
    }

    public function deregister($payload)
    {
        $requestId = $payload["requestId"];
        $reasonFor = $payload["reasonFor"];

        $resultSet = $this->memberModel->deregister($requestId, $reasonFor);

        $this->redirect("/opdrachten");
    }

    public function getRequestDetails($data)
    {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        self::view("/member/requestDetails", $result);   
    }

    public function getMemberProfile() {
        $email = Application::$app->session->get("user");

        $result = $this->memberModel->getMemberDetailsStatisticsAndHistory($email);
        
        self::view("/member/profile", $result );
    }

    public function getRequestDetailsAssigned($data) {
        $id = $data["params"]["id"];

        $result = $this->memberModel->requestDetails($id);

        
            self::view("/member/requestDetailsAssigned", $result);
        

    }

    public function changeProfile($payload) {
        $activeRole = Application::$app->session->get("activeRole");
        // change profile info
        if (!empty($payload['userEmail'])) {$this->editProfile($payload);}
        // change pwd
        if (!empty($payload['oldPdw'])) {$this->editPwd($payload);}
        
        // $this->redirect("/profiel");
    }

    public function editProfile($payload) {
            $email = $payload['email'];
            $firstName = $payload['firstName'];
            $lastName = $payload['lastName'];
            $street = $payload['street'];
            $premise = $payload['premise'];
            $city = $payload['city'];
            $postalCode = $payload['postalCode'];
            $phoneNumber = $payload['phoneNumber'];
            $gender = $payload['gender'];
            $userEmail = $payload['userEmail'];

            if ($gender =="Man") {
                $gender="M";
            } else if ($gender =="Vrouw") {
                $gender="V";
            } else {
                $gender="O";
            }
            
            if ($email != $userEmail) {
                $result = $this->memberModel->userExists($email);
            } else {$result = null;}
            
            if ($result != null) {
                $data = [
                    "error" => "Gebruiker met deze email bestaat al!"
                ];
                // $this->view("/member/profile", $data);
                $this->redirect("/profiel");
            } 

            Application::$app->session->set("user", $email);
            $result = $this->memberModel->editProfile($email,$firstName,$lastName,$street,$premise,$city,$postalCode,$phoneNumber,$gender,$userEmail);
            
            if ($result != null){
                $this->redirect("/profiel",$data);
            } else {
                $data = [
                    "error" => "Er is iets fout gegaan met het wijzigen van je profiel!"
                ];
                // $this->view("/member/profile", $data);
                $this->redirect("/profiel");
            }
    }

    public function editPwd($payload) {
        $email = $payload['email'];
        $oldPwd = $payload['oldPdw'];
        $newPwd = $payload['newPdw'];
        $copyPwd = $payload['copyPdw'];

        if (empty( $oldPwd) || empty($newPwd) || empty($copyPwd)) {
            $data = [
                "error" => "Controleer of alle velden zijn ingevuld"
            ];
            // $this->view("/member/profile", $data);
            $this->redirect("/profiel");
        }

        $result = $this->memberModel->authenticate($email,$oldPwd);

        if ($result != null){
            
            if ($newPwd == $payload['copyPdw']) {
                $this->memberModel->changePwd($email,$newPwd);
                $this->redirect("/profiel");
            } else {
                $data = [
                    "error" => "Herhaald wachtwoord komt niet overeen"
                ];
                // $this->view("/member/profile", $data);
                $this->redirect("/profiel");
            }

        } else {
            $data = [
                "error" => "Wachtwoord is onjuist"
            ];
            // $this->view("/member/profile", $data);
            $this->redirect("/profiel");
        }

        $this->redirect("/profiel");
    }


}
