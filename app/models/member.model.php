<?php

class MemberModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getOpenAssignments()
    {
        $this->db->query("SELECT * FROM request 
                            JOIN company ON request.companyId = company.companyId
                            JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                            JOIN playground ON request.playgroundId = playground.playgroundId
                            WHERE request.approved = 1;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getRequestDetails($requestId) {
        $this->db->query("SELECT * FROM request 
                            JOIN playground ON playground.playGroundId=request.playGroundId 
                            JOIN grimeLocation ON grimeLocation.grimeLocationId=request.grimeLocationId 
                            JOIN company ON company.companyId=request.companyId 
                            JOIN contact ON contact.contactId=request.contactId 
                            WHERE requestId=$requestId;");
            
        $result = $this->db->resultSet();

        return $result;
    }

        
    public function getYourAssignments() {
    }

    public function test()
    {
        echo "test";
    }
}
