<?php

class ClientModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRequests($email)
    {
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

    public function cancelRequest($id)
    {

        $this->db->query("DELETE FROM request WHERE requestId = :id");
        $this->db->bind(":id", $id);

        $results = $this->db->resultSet();

        return $results;
    }
    
    public function requestDetails($id)
    {
        $this->db->query("SELECT * FROM request 
                        LEFT JOIN company ON request.companyId = company.companyId
                        LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                        LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                        LEFT JOIN contact ON request.contactId = contact.contactId
                        LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
                        WHERE request.requestId = :id;");

        $this->db->bind(":id", $id);
        $result = $this->db->resultSet();

        return $result;
    }
}
