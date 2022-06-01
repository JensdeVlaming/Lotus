<?php

class RequestModel {

    private $db;
    private $playgroundId;
    private $grimeLocationId;

    public function __construct() {
        $this->db = new Database;
    }

    public function addPlayGroundRequest($province, $city, $street, $houseNumber, $postalCode) {

        $this->db->query("INSERT INTO playground (country, province, city, street, houseNumber, postalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        
        $this->db->execute();
        $this->playgroundId = $this->db->insertedRow();

    }

    public function addGrimeLocationRequest($province, $city, $street, $houseNumber, $postalCode) {

        $this->db->query("INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        
        $this->db->execute();
        $this->grimeLocationId = $this->db->insertedRow();

    }

    public function addBusinessAddressRequest($province, $city, $street, $houseNumber, $postalCode) {

        $this->db->query("INSERT INTO company (country, province, city, street, houseNumber, postalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        
        $this->db->execute();
        $this->playgroundId = $this->db->insertedRow();

    }

    public function addBillingAddressRequest($province, $city, $street, $houseNumber, $postalCode) {

        $this->db->query("INSERT INTO billingaddress (country, province, city, street, houseNumber, postalCode) VALUES ('Nederland', :province, :city, :street, :houseNumber, :postalCode);");

        $this->db->bind(':province', $province);
        $this->db->bind(':city', $city);
        $this->db->bind(':street', $street);
        $this->db->bind(':houseNumber', $houseNumber);
        $this->db->bind(':postalCode', $postalCode);
        
        $this->db->execute();
        $this->grimeLocationId = $this->db->insertedRow();

    }
    
}