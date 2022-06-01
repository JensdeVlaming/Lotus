<?php

class UserModel {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addRequest() {
        $this->db->query("INSERT INTO solicit (email, requestId, approved) VALUES ('dede@dede.com', '1', '0')");

        $result = $this->db->execute();

        
    }
    
}