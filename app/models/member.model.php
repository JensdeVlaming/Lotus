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
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT COUNT(*) AS CompletedAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->single();
        
        return $result["CompletedAssignments"];
    }

    private function getCountOfSolicitAssigments($email) {
        $assignedId = 0;
        $approvedId = 2;

        $this->db->query("SELECT COUNT(*) AS SolicitAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->single();
        
        return $result["SolicitAssignments"];
    }

    public function unsuscribeAssignment($id) {
        $email = Application::$app->session->get("user");
        
        $this->db->query("INSERT INTO solicit (email, requestId) VALUES (:email, :id);");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);
        
        $result = $this->db->execute();
        
        return $result;
    }


    public function getMemberDetails($email) {
        $this->db->query("SELECT * FROM user WHERE email = :email;");
        $this->db->bind(":email", $email);


        $results = $this->db->resultset();

        foreach ($results as $key=>$member) {
        $results[$key]["completedAssignment"] = $this->getCountOfCompletedAssigments($member["email"]);
        $results[$key]["solicitAssignment"] = $this->getCountOfSolicitAssigments($member["email"]);
        }

        return $results;
    }

    public function getMemberRequestsByEmail($email) {
        $this->db->query("SELECT * FROM solicit 
                                LEFT JOIN user ON user.email = solicit.email
                                LEFT JOIN request ON request.requestId = solicit.requestId
                                WHERE user.email = :email AND assigned = 1;");
                                
            $this->db->bind(":email", $email);
            $results = $this->db->resultSet();
            return $results;

    }

    

    // memberdetail page
    public function getAllMemberRequests($email) {
        $assigned = $this->db->getAllMemberAssignedAssigments($email);
        $solicit = $this->db->getAllMemberHisSolicitAssigments($email);

        return $assigned + $solicit;
    }


    private function getAllMemberAssignedAssigments($email) {
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT * FROM request 
                                    LEFT JOIN solicit ON request.requestId = solicit.requestId 
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();
        
        return $result;
    }

    private function getAllMemberHisSolicitAssigments($email) {
        $assignedId = 0;
        $approvedId = 2;

        $this->db->query("SELECT * FROM request 
                                    LEFT JOIN solicit ON request.requestId = solicit.requestId
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();
        
        return $result;
    }





}
