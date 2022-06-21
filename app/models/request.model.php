<?php

class RequestModel
{

    private $db;
    private $playGroundId;
    private $grimeLocationId;
    private $companyId;
    private $billingAddressId;
    private $contactId;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPlayGroundRequest($province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("INSERT INTO playground (pCountry, pProvince, pCity, pStreet, pHouseNumber, pPostalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->playGroundId = $this->db->insertedRow();
    }

    public function addGrimeLocationRequest($province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("INSERT INTO grimelocation (gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->grimeLocationId = $this->db->insertedRow();
    }

    public function addBusinessAddressRequest($user)
    {

        $this->db->query("INSERT INTO company (companyName, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode) VALUES (:companyName, :country, :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':country', $user['cCountry']);
        $this->db->bind(':companyName', $user['companyName']);
        $this->db->bind(':province', $user['cProvince']);
        $this->db->bind(':city', $user['cCity']);
        $this->db->bind(':street', $user['cStreet']);
        $this->db->bind(':houseNumber', $user['cHouseNumber']);
        $this->db->bind(':postalCode', $user['cPostalCode']);

        $this->db->execute();
        $this->companyId = $this->db->insertedRow();
    }

    public function addBillingAddressRequest($user)
    {

        $this->db->query("INSERT INTO billingaddress (bEmail, bCountry, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES (:email, :country, :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':email', $user['bEmail']);
        $this->db->bind(':country', $user['bCountry']);
        $this->db->bind(':province', $user['bProvince']);
        $this->db->bind(':city', $user['bCity']);
        $this->db->bind(':street', $user['bStreet']);
        $this->db->bind(':houseNumber', $user['bHouseNumber']);
        $this->db->bind(':postalCode', $user['bPostalCode']);

        $this->db->execute();
        $this->billingAddressId = $this->db->insertedRow();
    }

    public function addContactRequest($user)
    {
        $this->db->query("INSERT INTO contact (firstName, lastName, email, phoneNumber) VALUES (:firstName, :lastName, :email, :phoneNumber);");

        $this->db->bind(':firstName', $user['firstName']);
        $this->db->bind(':lastName', $user['lastName']);
        $this->db->bind(':email', $user['email']);
        $this->db->bind(':phoneNumber', $user['phoneNumber']);

        $this->db->execute();
        $this->contactId = $this->db->insertedRow();
    }

    public function addRequest($description, $comments, $date, $time, $casualties)
    {
        $client = Application::$app->session->get("user");
        $this->db->query("INSERT INTO request (description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId, clientEmail) VALUES (:description, :comments, :date, :time, :casualties, :playGroundId, :grimeLocationId, :companyId, :contactId, :billingAddressId, :clientEmail);");

        $this->db->bind(':description', $description);
        $this->db->bind(':comments', $comments);
        $this->db->bind(':date', $date);
        $this->db->bind(':time', $time);
        $this->db->bind(':casualties', $casualties);
        $this->db->bind(':playGroundId', $this->playGroundId);
        $this->db->bind(':grimeLocationId', $this->grimeLocationId);
        $this->db->bind(':companyId', $this->companyId);
        $this->db->bind(':contactId', $this->contactId);
        $this->db->bind(':billingAddressId', $this->billingAddressId);
        $this->db->bind(':clientEmail', $client);

        $this->db->execute();
    }

    public function getLoggedInUser()
    {
        $this->db->query("SELECT * FROM user 
                            LEFT JOIN company ON user.companyId = company.companyId
                            LEFT JOIN billingaddress ON user.billingAddressId = billingaddress.billingAddressId 
                            WHERE email = :email;");

        $this->db->bind(':email', Application::$app->session->get("user"));

        return $this->db->single();
    }
}
