<?php

class MemberModel extends Model
{
    public function getAllMembers()
    {
        $this->db->query("SELECT * FROM user WHERE roles = :id");
        $this->db->bind(":id", 1);

        $result = $this->db->resultSet();

        $email = Application::$app->session->get("user");
        
        for ($x = 0; $x < sizeof($result); $x++) {
            $result[$x]['countAssignments'] = count($this->getAllMemberCompletedAssigments($result[$x]['email'])) + count($this->getAllMemberUpcommingAssigments($result[$x]['email']));
          }

        return $result;
    }

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
        return $result;
    }

    // public function getOpenAssignments()
    // {
    //     $email = Application::$app->session->get("user");

    //     $this->db->query("SELECT DISTINCT * FROM request 
    //                         LEFT JOIN company ON request.companyId = company.companyId
    //                         LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
    //                         LEFT JOIN playground ON request.playgroundId = playground.playgroundId
    //                         LEFT JOIN contact ON request.contactId = contact.contactId
    //                         LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
    //                         WHERE request.approved = 1;");

    //     // $this->db->bind(":email", $email);


    //     $result = $this->db->resultSet();

    //     foreach ($result as $key => $member) {
    //         $result[$key]["completedAssignment"] = $this->getCountOfCompletedAssigments($member["email"]);
    //     }

    //     return $result;
    // }

    public function getMemberDetails($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email;");
        $this->db->bind(":email", $email);


        $result = $this->db->single();


        return $result;
    }

    public function getOpenRequests($email)
    {
        $this->db->query("SELECT *, (SELECT assigned FROM solicit WHERE email = :email AND requestId = request.requestId) AS assigned FROM request 
                            LEFT JOIN playground ON request.playGroundId = playground.playGroundId 
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId 
                            LEFT JOIN company ON request.companyId = company.companyId 
                            LEFT JOIN contact ON request.contactId = contact.contactId 
                            LEFT JOIN billingaddress ON request.billingAddressId = billingaddress.billingAddressId
                            WHERE requestId NOT IN (SELECT requestId FROM solicit WHERE assigned IN (0,1,2,4) AND email = :email)
                            AND request.approved = 1;");

        $this->db->bind(":email", $email);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCountOfParticipationsByMember($email)
    {
        $this->db->query("SELECT COUNT(*) as participations FROM solicit WHERE email = :email AND assigned IN (0,1);");
        $this->db->bind(":email", $email);

        $result = $this->db->single();

        return $result["participations"];
    }

    public function participateAssignment($id, $email)
    {
        $this->db->query("SELECT * FROM solicit WHERE requestId = :id AND email = :email;");

        $this->db->bind(":id", $id);
        $this->db->bind(":email", $email);

        $check = $this->db->resultSet();

        if (count($check) > 0) {
            $this->db->query("UPDATE solicit SET assigned = 0 WHERE email = :email AND requestId = :id;");

            $this->db->bind(":email", $email);
            $this->db->bind(":id", $id);

            $result = $this->db->execute();
        } else {
            $this->db->query("INSERT INTO solicit (email, requestId, assigned) VALUES (:email, :id, 0);");

            $this->db->bind(":email", $email);
            $this->db->bind(":id", $id);

            $result = $this->db->execute();
        }

        return $result;
    }

    public function unsubscribeFromAssignment($requestId, $reasonFor = null)
    {
        $email = Application::$app->session->get("user");

        $this->db->query("UPDATE solicit SET assigned = 3, deregisterReason = :reasonFor WHERE requestId = :requestId AND email = :email;");
        $this->db->bind(":reasonFor", $reasonFor);
        $this->db->bind(":requestId", $requestId);
        $this->db->bind(":email", $email);

        $this->db->single();
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

    public function requestDetails($email, $id)
    {
        $this->db->query("SELECT *, (SELECT assigned FROM solicit WHERE email = :email AND requestId = request.requestId) AS assigned FROM request 
                            LEFT JOIN company ON request.companyId = company.companyId
                            LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                            LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                            LEFT JOIN contact ON request.contactId = contact.contactId
                            LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
                            WHERE request.requestId = :id;");

        $this->db->bind(":email", $email);
        $this->db->bind(":id", $id);

        $result = $this->db->single();

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

    // private function getCountOfSolicitAssigments($email)
    // {
    //     $assignedId = 0;
    //     $approvedId = 2;

    //     $this->db->query("SELECT COUNT(*) AS SolicitAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId;");

    //     $this->db->bind(":email", $email);
    //     $this->db->bind(":assignedId", $assignedId);
    //     $this->db->bind(":approvedId", $approvedId);

    //     $result = $this->db->single();

    //     return $result["SolicitAssignments"];
    // }

    // private function getCountOfUpcomingAssigments($email)
    // {
    //     $assignedId = 1;
    //     $approvedId = 2;

    //     $this->db->query("SELECT COUNT(*) AS UpcommingAssignments FROM request LEFT JOIN solicit ON request.requestId = solicit.requestId WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) >= DATE_FORMAT(NOW(),'%d-%m-%Y ');");

    //     $this->db->bind(":email", $email);
    //     $this->db->bind(":assignedId", $assignedId);
    //     $this->db->bind(":approvedId", $approvedId);

    //     $result = $this->db->single();

    //     return $result["UpcommingAssignments"];
    // }

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
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) < DATE_FORMAT(NOW(),'%Y-%m-%d ');");

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
                                    WHERE email = :email AND assigned = :assignedId AND request.approved = :approvedId AND CONCAT(request.date) >= DATE_FORMAT(NOW(),'%Y-%m-%d ');");

        $this->db->bind(":email", $email);
        $this->db->bind(":assignedId", $assignedId);
        $this->db->bind(":approvedId", $approvedId);

        $result = $this->db->resultset();

        if ($result) {
            return $result;
        }

        return [];
    }


    public function getAssignmentDetailsByMailAndId($id)
    {
        $this->db->query("SELECT * FROM solicit 
                                LEFT JOIN user ON user.email = solicit.email
                                LEFT JOIN request ON request.requestId = solicit.requestId
                                WHERE user.email = :email AND request.requestId = :id;");


        $this->db->bind(":email", Application::$app->session->get("user"));
        $this->db->bind(":id", $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllOpenMembersByRequestId($id)
    {
        $this->db->query("SELECT *, (SELECT COUNT(*) as Participations FROM solicit WHERE email = user.email AND assigned IN (0,1)) AS participations FROM user WHERE user.email NOT IN (SELECT email FROM solicit WHERE solicit.requestId = :id AND solicit.assigned IN (0, 1, 3)) AND user.roles IN (1, 4);");

        $this->db->bind(":id", $id);

        $result = $this->db->resultset();

        if (count($result)) {
            return $result;
        } else {
            return [];
        }
    }

    public function getAllAssignedmembersByRequestId($id) {
        $this->db->query("SELECT * FROM user LEFT JOIN solicit ON user.email = solicit.email WHERE solicit.requestId = :id AND solicit.assigned = 1;");

        $this->db->bind(":id", $id);

        $result = $this->db->resultset();

        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    public function getAllMembersByRequestId($id)
    {
        $this->db->query("SELECT *, (SELECT COUNT(*) as Participations FROM solicit WHERE email = user.email AND assigned IN (0,1)) AS participations FROM user LEFT JOIN solicit ON user.email = solicit.email WHERE solicit.requestId = :id ORDER BY assigned;");

        $this->db->bind(":id", $id);

        $result = $this->db->resultset();

        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }
    // Edit profile functions
    public function userExists($email)
    {
        $this->db->query("SELECT * FROM user WHERE email=:email;");
        $this->db->bind(':email', $email);

        $result = $this->db->single();

        return $result;
    }

    public function editProfile($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $userEmail)
    {

        $this->db->query("UPDATE user SET email=:email, firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, city=:city, street=:street, premise=:premise, postalCode=:postalCode, gender=:gender WHERE email=:userEmail;");

        $this->db->bind(":email", $email);
        $this->db->bind(":firstName", $firstName);
        $this->db->bind(":lastName", $lastName);
        $this->db->bind(":street", $street);
        $this->db->bind(":premise", $premise);
        $this->db->bind(":city", $city);
        $this->db->bind(":postalCode", $postalCode);
        $this->db->bind(":phoneNumber", $phoneNumber);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":userEmail", $userEmail);


        $result = $this->db->execute();

        if ($result != null) {
            return $result;
        }
        return null;
    }

    public function changePwd($email, $newPwd)
    {

        print_r('reached pwd changer');

        $this->db->query("UPDATE user SET password=:password WHERE email=:email;");
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $newPwd);

        $result = $this->db->execute();

        if ($result != null) {
            return $result;
        }
        return null;
    }

    public function authenticate($email, $password)
    {
        $this->db->query("SELECT * FROM user LEFT JOIN role ON user.roles = role.id WHERE email = :email AND password = :password;");

        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);

        $result = $this->db->single();

        if ($result != null) {
            return $result;
        }
        return null;
    }
}   
