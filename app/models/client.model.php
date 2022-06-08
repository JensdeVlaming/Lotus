<?php

class ClientModel {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getRequests($email) {
        $this->db->query("SELECT * FROM request 
                            LEFT JOIN playground ON request.playGroundId = playground.playGroundId 
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId 
                            LEFT JOIN company ON request.companyId = company.companyId 
                            LEFT JOIN contact ON request.contactId = contact.contactId 
                            LEFT JOIN billingaddress ON request.billingAddressId = billingaddress.billingAddressId 
                            WHERE clientEmail = :email;");
        $this->db->bind(":email", $email);
        
        $results = $this->db->resultSet();

        return $results;
    }

    public function cancelRequest($id) {

        $this->db->query("UPDATE request SET approved = 4 WHERE requestId = :id;");
        $this->db->bind(":id", $id);

        $results = $this->db->resultSet();

        return $results;
    }


}

