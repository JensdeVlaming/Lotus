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

        public function declineAssignment($id) {
            $this->db->query("UPDATE request SET approved = 2 WHERE id = $id;");
            
            $result = $this->db->resultSet();
        }

        public function acceptAssignment($id) {
            $this->db->query("UPDATE request SET approved = 1 WHERE id = $id;");
            
            print_r($this->db->resultSet());
        }
    }
?>
