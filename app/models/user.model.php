<?php

class UserModel {

    private $email;
    private $password;
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUsers() {
        $this->db->query("SELECT * FROM account;");
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function authenticate($email, $password) {
        $this->db->query("SELECT * FROM user WHERE email = :email AND password = :password;");
        
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);

        $result = $this->db->single();

        if ($result != null) {
            return $result["email"];
        }
        return null;
    }
    
    
    function getEmail() {
        return $this->email;
    }
    
    function getPassword() {
        return $this->password;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }

    function test() {
        return "ljadhflskdj";
    }
}