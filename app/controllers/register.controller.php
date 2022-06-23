<?php
class RegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->registerModel = $this->model("register");
    }

    public function register($payload)
    {
        $this->registerModel->addCompany($payload['companyCountry'], $payload['companyName'], $payload['companyProvince'], $payload['companyCity'], $payload['companyStreet'], $payload['companyHouseNumber'], $payload['companyPostalCode']);
        $this->registerModel->addBilling($payload['billingCountry'], $payload['billingEmailAddress'], $payload['billingProvince'], $payload['billingCity'], $payload['billingStreet'], $payload['billingHouseNumber'], $payload['billingPostalCode']);
        $result = $this->registerModel->addClient($payload['emailAddress'], $payload['firstName'], $payload['lastName'], $payload['phoneNumber'], $payload['password']);


        if ($result) {
            $initials = $this->getInitials($payload['firstName'], $payload['lastName']);
    
            Application::$app->session->set("user", $payload['emailAddress']);
            Application::$app->session->set("initials", $initials);
            Application::$app->session->set("activeRole", "Opdrachtgever");
    
            $this->redirect("/overzicht");
        } else {
            $data = [
                "error" => "E-mailadres bestaat al of er is iets fout gegaan."
            ];
            $this->viewContentOnly("user/register", $data);
        }
    }
}
