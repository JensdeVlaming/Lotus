<?php

class RequestModel extends Model
{
    private $playGroundId;
    private $grimeLocationId;
    private $companyId;
    private $billingAddressId;
    private $contactId;

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

    public function editPlayGroundRequest($playGroundId,$province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("UPDATE playGround SET pProvince = :province, pCity = :city, pStreet = :street, pHouseNumber = :houseNumber, pPostalCode = :postalCode WHERE playGroundId = :id;");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        $this->db->bind(':id', $playGroundId);

        $this->db->execute();
    }

    public function editGrimeLocationRequest($grimeLocationId,$province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("UPDATE grimelocation SET gProvince = :province, gCity = :city, gStreet = :street, gHouseNumber = :houseNumber, gPostalCode = :postalCode WHERE grimeLocationId = :id;");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        $this->db->bind(':id', $grimeLocationId);

        $this->db->execute();
    }

    public function editBusinessAddressRequest($companyId,$companyName, $province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("UPDATE company SET companyName = :companyName, cProvince = :province, cCity = :city, cStreet = :street, cHouseNumber = :houseNumber, cPostalCode = :postalCode WHERE companyId = :id;");

        $this->db->bind(':companyName', $companyName);
        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        $this->db->bind(':id', $companyId);

        $this->db->execute();
    }

    public function editBillingAddressRequest($billingAddressId,$province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("UPDATE billingAddress SET bProvince = :province, bCity = :city, bStreet = :street, bHouseNumber = :houseNumber, bPostalCode = :postalCode WHERE billingAddressId = :id;");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        $this->db->bind(':id', $billingAddressId);

        $this->db->execute();
    }

    public function editContactRequest($contactId,$firstName, $lastName, $email, $phoneNumber)
    {
        $this->db->query("UPDATE contact SET firstName = :firstName, lastName = :lastName, email = :email, phoneNumber = :phoneNumber WHERE contactId = :id;");

        $this->db->bind(':firstName', $firstName);
        $this->db->bind(':lastName', $lastName);
        $this->db->bind(':email', $email);
        $this->db->bind(':phoneNumber', $phoneNumber);
        $this->db->bind(':id', $contactId);

        $this->db->execute();
    }

    public function editRequest($requestId,$description, $comments, $date, $time, $casualties)
    {
        $client = Application::$app->session->get("user");
        $this->db->query("UPDATE request SET description = :description ,comments = :comments ,date = :date ,time = :time ,casualties = :casualties, approved = 5 WHERE requestId = :id;");

        $this->db->bind(':description', $description);
        $this->db->bind(':comments', $comments);
        $this->db->bind(':date', $date);
        $this->db->bind(':time', $time);
        $this->db->bind(':casualties', $casualties);
        $this->db->bind(':id', $requestId);


        $this->db->execute();
    }




}
