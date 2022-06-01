<?php

class MemberModel{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getOpenAssignments() {
        $this->db->query("SELECT * FROM request WHERE approved = 1");
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getYourAssignments(){
        
    }

    public function test(){
        echo "test";
    }
}
