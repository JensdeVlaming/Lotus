<?php

class ClientModel extends Model
{

    public function getClientDetails($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email;");
        $this->db->bind(":email", $email);


        $result = $this->db->single();


        return $result;
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
        $this->db->query("UPDATE request SET approved = 4 WHERE requestId = :id;");
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

    // public function getRequestDetailsForEdit($id) {
    //     $this->db->query("SELECT * FROM request 
    //                                 LEFT JOIN company ON request.companyId = company.companyId
    //                                 LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
    //                                 LEFT JOIN playground ON request.playgroundId = playground.playgroundId
    //                                 LEFT JOIN contact ON request.contactId = contact.contactId
    //                                 LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId
    //                                 WHERE request.requestId = :id;");

    //     $this->db->bind(":id", $id);
    //     $result = $this->db->resultSet();

    //     return $result;
    // }

    public function editRequest($id)
    {
        $this->db->query("UPDATE request
                                SET column1 = value1, column2 = value2, ...
                                WHERE requestId = :id;");

        $this->db->bind(":id", $id);
        $this->db->execute();
    }



    public function getProfile($email)
    {

        $this->db->query("SELECT * FROM user                
                        WHERE email = :email;");

        $this->db->bind(":email", $email);

        $results = $this->db->single();
        return $results;

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
