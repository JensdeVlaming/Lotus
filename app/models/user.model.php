<?php

class UserModel {

    public function __construct() {
        $this->db = new Database;
    }

    public function getUsers() {
        $this->db->query("SELECT * FROM account;");
        
        $result = $this->db->resultSet();

        return $result;
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