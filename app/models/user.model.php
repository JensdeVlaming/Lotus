<?php

class UserModel {
    public function __construct() {
        $this->db = new Database;
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

    public function create($email, $firstName, $lastName, $street, $premise, $city, $postalCode, $phoneNumber, $gender, $password) {
        $this->db->query("INSERT INTO user (email, firstName, lastName, street, premise, city, postalCode, phoneNumber, gender, password, roles) VALUES (:email, :firstName, :lastName, :street, :premise, :city, :postalCode, :phoneNumber, :gender, :password, :roles)");
        
        $this->db->bind(":email", $email);
        $this->db->bind(":firstName", $firstName);
        $this->db->bind(":lastName", $lastName);
        $this->db->bind(":street", $street);
        $this->db->bind(":premise", $premise);
        $this->db->bind(":city", $city);
        $this->db->bind(":postalCode", $postalCode);
        $this->db->bind(":phoneNumber", $phoneNumber);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":password", $password);
        $this->db->bind(":roles", 1);

        try {
            $result = $this->db->execute();

            if ($result == 1) {
                return 1;
            } else {
                return 2;
            }
        } catch(Exception $e) {
            return 3;
        }
    }


}