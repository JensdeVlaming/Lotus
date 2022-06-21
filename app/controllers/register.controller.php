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
        $this->registerModel->addClient($payload['emailAddress'], $payload['firstName'], $payload['lastName'], $payload['phoneNumber'], $payload['password']);

        

        $this->redirect("/overzicht");
    }
}
