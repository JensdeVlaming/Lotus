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

    public function addBusinessAddressRequest($companyName, $province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("INSERT INTO company (companyName, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode) VALUES (:companyName, 'Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':companyName', $companyName);
        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->companyId = $this->db->insertedRow();
    }

    public function addBillingAddressRequest($province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("INSERT INTO billingaddress (bCountry, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->billingAddressId = $this->db->insertedRow();
    }

    public function addContactRequest($firstName, $lastName, $email, $phoneNumber)
    {
        $this->db->query("INSERT INTO contact (firstName, lastName, email, phoneNumber) VALUES (:firstName, :lastName, :email, :phoneNumber);");

        $this->db->bind(':firstName', $firstName);
        $this->db->bind(':lastName', $lastName);
        $this->db->bind(':email', $email);
        $this->db->bind(':phoneNumber', $phoneNumber);

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
}
