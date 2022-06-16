<?php
class CoordModel extends Model
{
    public function getAssignmentRequests()
    {
        $this->db->query("SELECT * FROM request 
                                LEFT JOIN company ON request.companyId = company.companyId
                                LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                                LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                                LEFT JOIN contact ON request.contactId = contact.contactId
                                LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId");

        $result = $this->db->resultSet();

        return $result;
    }

    public function declineAssignment($id)
    {
        $this->db->query("UPDATE request SET approved = 3 WHERE requestId = $id;");

        $result = $this->db->resultSet();
    }

    
    // public function getRequestDetailsAcceptDeny($id){
    //     $this->db->query("SELECT *,  user.firstName AS uFirstName, user.lastName AS uLastName, user.email AS uEmail, user.phoneNumber AS uPhoneNumber FROM solicit 
    //                         LEFT JOIN request ON solicit.requestId = request.requestId
    //                         LEFT JOIN company ON request.companyId = company.companyId 
    //                         LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId 
    //                         LEFT JOIN playground ON request.playgroundId = playground.playgroundId 
    //                         LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId 
    //                         LEFT JOIN user ON solicit.email = user.email
    //                         LEFT JOIN contact ON request.contactId = contact.contactId
    //                         WHERE request.requestId = :id;");
                            
    //     $this->db->bind(":id", $id);

    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    public function AssigmentInProgress($id)
    {
        $this->db->query("UPDATE request SET approved = 1 WHERE requestId = $id;");

        $result = $this->db->resultSet();
    }

    public function getProfile($email)
    {
        $this->db->query("SELECT * FROM user
            WHERE email = :email;");

        $this->db->bind(":email", $email);

        $results = $this->db->resultSet();

        return $results;
    }
    
    public function getRequestDetails($id)
    {
        $this->db->query("SELECT * FROM request
                                LEFT JOIN user ON user.email = request.clientEmail 
                                LEFT JOIN playground ON request.playGroundId = playground.playGroundId 
                                LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId 
                                LEFT JOIN company ON request.companyId = company.companyId 
                                LEFT JOIN contact ON request.contactId = contact.contactId 
                                LEFT JOIN billingaddress ON request.billingAddressId = billingaddress.billingAddressId 
                                WHERE requestId = :id;");

        $this->db->bind(":id", $id);

        $results = $this->db->single();

        return $results;
    }

    public function assignMemberToAssigment($id, $email)
    {
        $this->db->query("SELECT * FROM solicit WHERE requestId = :id AND email = :email;");

        $this->db->bind(":id", $id);
        $this->db->bind(":email", $email);

        $check = $this->db->resultSet();

        if (count($check) > 0) {
            $this->db->query("UPDATE solicit SET assigned = 1 WHERE email = :email AND requestId = :id;");
    
            $this->db->bind(":email", $email);
            $this->db->bind(":id", $id);
    
            $result = $this->db->execute();
        } else {
            $this->db->query("INSERT INTO solicit (email, requestId, assigned) VALUES (:email, :id, 1);");
    
            $this->db->bind(":email", $email);
            $this->db->bind(":id", $id);
    
            $result = $this->db->execute();
        }

        return $result;
    }

    public function deleteMemberFromAssigment($id, $email)
    {
        $this->db->query("UPDATE solicit SET assigned = 4 WHERE requestId = :id AND email = :email;");

        $this->db->bind(":id", $id);
        $this->db->bind(":email", $email);

        $result = $this->db->execute();

        return $result;
    }
}
