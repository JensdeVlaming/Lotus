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

        print_r($payload);

        // change profile info
        if (!empty($payload['checkEmail'])) {
          
            $email = $payload['email'];
            $firstName = $payload['firstName'];
            $lastName = $payload['lastName'];
            $street = $payload['street'];
            $premise = $payload['premise'];
            $city = $payload['city'];
            $postalCode = $payload['postalCode'];
            $phoneNumber = $payload['phoneNumber'];
            $checkEmail = $payload['checkEmail'];

            $result = $this->memberModel->userExists($email);
            if ($result != null) {
                $data = [
                            "error" => "Gebruiker met deze email bestaat al!"
                        ];
                        $this->view('/profiel',$data);
            }
            $this->view('/profiel');

            

            // $result = $this->memberModel->editProfile($email,$firstName,$lastName,$street,$premise,$city,$postalCode,$phoneNumber,$checkEmail);

            // if ($result != null){
            //     $this->redirect("/profiel");
            // } else {
            //     $data = [
            //         "error" => "Oud wachtwoord is onjuist"
            //     ];
            //     $this->view($data);
            // }
        }

        // change pwd
        // if (!empty($payload['oldPdw'])) { 

        //     $oldPwd = $payload['oldPdw'];
        //     $newPwd = $payload['newPdw'];
        //     $copyPwd = $payload['copyPdw'];

        //     if (empty( $oldPwd) || empty($newPwd) || empty($copyPwd)) {
        //         $data = [
        //             "error" => "Controleer of alle velden zijn ingevuld"
        //         ];
        //         $this->view($data);
        //     }

        //     $result = $this->userModel->authenticate($email,$oldPwd);

        //     if ($result != null){
        //         $this->userModel->changePwd($email,$newPwd);
                
        //         if ($newPwd == $payload['copyPdw']) {

        //         } else {
        //             $data = [
        //                 "error" => "Herhaald wachtwoord komt niet overeen"
        //             ];
        //             $this->view($data);
        //         }

        //     } else {
        //         $data = [
        //             "error" => "Oud wachtwoord is onjuist"
        //         ];
        //         $this->view($data);
        //     }

        // } 
       
        // $this->redirect("/profiel");
    }



}
