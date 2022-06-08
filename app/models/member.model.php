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

    public function participateAssignment($id)
    {
        $email = Application::$app->session->get("user");

        $this->db->query("INSERT INTO solicit (email, requestId) VALUES (:email, :id);");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);

        $result = $this->db->execute();

        return $result;
    }

    public function getRegisteredAssignments()
    {
        $email = Application::$app->session->get("user");
        $this->db->query("SELECT * FROM solicit 
                            LEFT JOIN request ON solicit.requestId = request.requestId
                            LEFT JOIN company ON request.companyId = company.companyId 
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId 
                            LEFT JOIN playground ON request.playgroundId = playground.playgroundId 
                            LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId 
                            WHERE solicit.email = :email;");

        $this->db->bind(":email", $email);

        $result = $this->db->resultSet();

        return $result;
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


    public function getAllMembers()
    {
        $id = 1;

        $this->db->query("SELECT * FROM user WHERE roles = :id");
        $this->db->bind(":id", $id);

        $result = $this->db->resultSet();

        foreach ($result as $key=>$member) {
            $result[$key]["completedAssignment"] = $this->getCountOfCompletedAssigments($member["email"]);
        }

        return $result;
    }

    private function getCountOfCompletedAssigments($email) {
        $id = 1;
        $approved = 2;

        $this->db->query("SELECT COUNT(*) AS CompletedAssignments FROM solicit LEFT JOIN request ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :id AND approved = :approved");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);
        $this->db->bind(":approved", $approved);

        $result = $this->db->single();
        
        return $result["CompletedAssignments"];
    }

    public function unsuscribeAssignment($id) {
        $email = Application::$app->session->get("user");
        
        $this->db->query("INSERT INTO solicit (email, requestId) VALUES (:email, :id);");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);
        
        $result = $this->db->execute();
        
        return $result;
    }
}
