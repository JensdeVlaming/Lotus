<?php
class CoordModel extends Model
{
    public function getCoordDetails($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email;");
        $this->db->bind(":email", $email);


        $result = $this->db->single();


        return $result;
    }

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

    public function AssignmentInProgress($id)
    {
        $this->db->query("UPDATE request SET approved = 1 WHERE requestId = $id;");

        $result = $this->db->resultSet();
    }

    public function acceptAssignment($id)
    {
        $this->db->query("UPDATE request SET approved = 2 WHERE requestId = $id;");

        $result = $this->db->resultSet();
    }

    public function getProfile($email)
    {
        $this->db->query("SELECT * FROM user
            WHERE email = :email;");

        $this->db->bind(":email", $email);

        $results = $this->db->single();

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

    public function declineMemberFromAssigment($id, $email)
    {
        $this->db->query("UPDATE solicit SET assigned = 2 WHERE requestId = :id AND email = :email;");

        $this->db->bind(":id", $id);
        $this->db->bind(":email", $email);

        $result = $this->db->execute();

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

    // Edit profile functions
    public function userExists($email) {
        $this->db->query("SELECT * FROM user WHERE email=:email;");
        $this->db->bind(':email',$email);

        $result = $this->db->single();

        return $result;
        
    }

    public function editProfile($email,$firstName,$lastName,$street,$premise,$city,$postalCode,$phoneNumber,$gender,$userEmail) {
        
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

    public function changePwd($email,$newPwd) {

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

    public function authenticate($email, $password) {
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
