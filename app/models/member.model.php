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
                            LEFT JOIN company ON request.companyId = company.companyId
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                            LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                            LEFT JOIN contact ON request.contactId = contact.contactId
                            LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
                            WHERE request.approved = 1;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function participateAssignment($id) {
        $email = Application::$app->session->get("user");
        
        $this->db->query("INSERT INTO solicit (email, requestId) VALUES (:email, :id);");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);
        
        $result = $this->db->execute();
        
        return $result;
    }
}
