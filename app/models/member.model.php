<?php

class MemberModel extends Model
{
    public function getOpenAssignments()
    {
        $email = Application::$app->session->get("user");

        $this->db->query("SELECT DISTINCT * FROM request 
                            LEFT JOIN company ON request.companyId = company.companyId
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                            LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                            LEFT JOIN contact ON request.contactId = contact.contactId
                            LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
                            WHERE request.approved = 1;");

        // $this->db->bind(":email", $email);


        $result = $this->db->resultSet();
        
        // $temp_array = [];
        // $key = "requestId";
        // foreach ($result as &$v) {
        //     if (!isset($temp_array[$v[$key]]))
        //     $temp_array[$v[$key]] =& $v;
        // }
        // $result = array_values($temp_array);
        return $result;
    }

    public function participateAssignment($id)
    {
        $email = Application::$app->session->get("user");

        $this->db->query("INSERT INTO solicit (email, requestId, assigned) VALUES (:email, :id, 0);");

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

        foreach ($result as $key => $member) {
            $result[$key]["completedAssignment"] = $this->getCountOfCompletedAssigments($member["email"]);
        }

        return $result;
    }

    private function getCountOfCompletedAssigments($email)
    {
        // TODO check on date
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT COUNT(*) AS CompletedAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) <= DATE_FORMAT(NOW(),'%d-%m-%Y ');");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->single();

        return $result["CompletedAssignments"];
    }

    private function getCountOfSolicitAssigments($email)
    {
        $assignedId = 0;
        $approvedId = 2;

        $this->db->query("SELECT COUNT(*) AS SolicitAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->single();

        return $result["SolicitAssignments"];
    }

    private function getCountOfUpcomingAssigments($email)
    {
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT COUNT(*) AS UpcommingAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) >= DATE_FORMAT(NOW(),'%d-%m-%Y ');");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->single();

        return $result["UpcommingAssignments"];
    }

    public function unsuscribeAssignment($id)
    {
        $email = Application::$app->session->get("user");

        $this->db->query("INSERT INTO solicit (email, requestId) VALUES (:email, :id);");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);

        $result = $this->db->execute();

        return $result;
    }


    public function getMemberDetails($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email;");
        $this->db->bind(":email", $email);


        $result = $this->db->single();


        return $result;
    }

    public function getMemberRequestsByEmail($email)
    {
        $this->db->query("SELECT * FROM solicit 
                                LEFT JOIN user ON user.email = solicit.email
                                LEFT JOIN request ON request.requestId = solicit.requestId
                                WHERE user.email = :email AND assigned = 1;");

        $this->db->bind(":email", $email);
        $results = $this->db->resultSet();
        return $results;
    }



    // memberdetail page
    public function getMemberDetailsStatisticsAndHistory($email)
    {
        $result = $this->getMemberDetails($email);

        $result["completedAssignmentList"] = $this->getAllMemberCompletedAssigments($email);
        $result["solicitAssignmentList"] = $this->getAllMemberSolicitAssigments($email);
        $result["upcommingAssignmentList"] = $this->getAllMemberUpcommingAssigments($email);

        $result["completedAssignments"] = count($result["completedAssignmentList"]);
        $result["solicitAssignments"] = count($result["solicitAssignmentList"]);
        $result["upcommingAssignments"] = count($result["upcommingAssignmentList"]);

        return $result;
    }

    private function getAllMemberCompletedAssigments($email)
    {
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT * FROM request 
                                    LEFT JOIN solicit ON request.requestId = solicit.requestId
                                    LEFT JOIN company ON request.companyId = company.companyId 
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) <= DATE_FORMAT(NOW(),'%d-%m-%Y ');");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();

        if ($result) {
            return $result;
        }

        return [];
    }

    private function getAllMemberSolicitAssigments($email)
    {
        $assignedId = 0;
        $approvedId = 2;

        $this->db->query("SELECT * FROM request 
                                    LEFT JOIN solicit ON request.requestId = solicit.requestId
                                    LEFT JOIN company ON request.companyId = company.companyId
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();

        if ($result) {
            return $result;
        }

        return [];
    }

    private function getAllMemberUpcommingAssigments($email)
    {
        $assignedId = 1;
        $approvedId = 2;

        $this->db->query("SELECT * FROM request 
                                    LEFT JOIN solicit ON request.requestId = solicit.requestId
                                    LEFT JOIN company ON request.companyId = company.companyId
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) >= DATE_FORMAT(NOW(),'%d-%m-%Y ');");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();

        if ($result) {
            return $result;
        }

        return [];
    }







    public function deregister($requestId, $reasonFor = null)
    {
        $email = Application::$app->session->get("user");

        $this->db->query("UPDATE solicit SET assigned = 3, deregisterReason = :reasonFor WHERE email = :email AND requestId = :requestId;");
        $this->db->bind(":reasonFor", $reasonFor);
        $this->db->bind(":requestId", $requestId);
        $this->db->bind(":email", $email);

        $this->db->execute();
    }
}
