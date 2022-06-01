<?php

class ClientModel {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getRequests($email) {
        $this->db->query("SELECT * FROM  request WHERE clientEmail = :email;");
        $this->db->bind(":email", $email);
        
        $result = $this->db->resultSet();

        return $result;
    }

}

