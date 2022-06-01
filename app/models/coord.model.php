<?php
    class CoordModel{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        public function getAssignmentRequests() {
            $this->db->query("SELECT * FROM request WHERE approved = 0");
            
            $result = $this->db->resultSet();

            return $result;
        }
    }
?>
