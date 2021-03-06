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

    public function addRequest($description, $comments, $date, $time,$endTime, $casualties)
    {
        $client = Application::$app->session->get("user");
        $this->db->query("INSERT INTO request (description, comments, date, time, endTime, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId, clientEmail) VALUES (:description, :comments, :date, :time, :endTime, :casualties, :playGroundId, :grimeLocationId, :companyId, :contactId, :billingAddressId, :clientEmail);");

        $this->db->bind(':description', $description);
        $this->db->bind(':comments', $comments);
        $this->db->bind(':date', $date);
        $this->db->bind(':time', $time);
        $this->db->bind(':endTime', $endTime);
        $this->db->bind(':casualties', $casualties);
        $this->db->bind(':playGroundId', $this->playGroundId);
        $this->db->bind(':grimeLocationId', $this->grimeLocationId);
        $this->db->bind(':companyId', $this->companyId);
        $this->db->bind(':contactId', $this->contactId);
        $this->db->bind(':billingAddressId', $this->billingAddressId);
        $this->db->bind(':clientEmail', $client);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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

    public function editRequest($requestId,$description, $comments, $date, $time, $endTime, $casualties)
    {
        $client = Application::$app->session->get("user");
        $this->db->query("UPDATE request SET description = :description ,comments = :comments ,date = :date ,time = :time, endTime = :endTime ,casualties = :casualties, approved = 5 WHERE requestId = :id;");

        $this->db->bind(':description', $description);
        $this->db->bind(':comments', $comments);
        $this->db->bind(':date', $date);
        $this->db->bind(':time', $time);
        $this->db->bind(':endTime', $endTime);
        $this->db->bind(':casualties', $casualties);
        $this->db->bind(':id', $requestId);


        $this->db->execute();
    }




}
