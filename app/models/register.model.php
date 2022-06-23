<?php
class RegisterModel extends Model
{

    private $billingId;
    private $companyId;

    public function addCompany($country, $companyName, $province, $city, $street, $houseNumber, $postalCode)
    {

        $this->db->query("INSERT INTO company (companyName, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode) VALUES (:companyName, :country, :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':country', $country);
        $this->db->bind(':companyName', $companyName);
        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->companyId = $this->db->insertedRow();
    }

    public function addBilling($country, $email, $province, $city, $street, $houseNumber, $postalCode)
    {
        $this->db->query("INSERT INTO billingaddress (bCountry, bEmail, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES (:country, :email, :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':email', $email);
        $this->db->bind(':country', $country);
        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);

        $this->db->execute();
        $this->billingId = $this->db->insertedRow();
    }

    public function addClient($email, $firstName, $lastName, $phoneNumber, $password)
    {
        $this->db->query("INSERT INTO user (email, firstName, lastName, phoneNumber, roles, password, companyId, billingAddressId) VALUES (:email, :firstName, :lastName, :phoneNumber, :roles, :password, :companyId, :billingAddressId);");

        $this->db->bind(':email', $email);
        $this->db->bind(':firstName', $firstName);
        $this->db->bind(':lastName', $lastName);
        $this->db->bind(':phoneNumber', $phoneNumber);
        $this->db->bind(':roles', '3');
        $this->db->bind(':password', $password);
        $this->db->bind(':companyId', $this->companyId);
        $this->db->bind(':billingAddressId', $this->billingId);


        return $this->db->execute();
    }
}
