<?php
    class CoordModel{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAssignmentRequests() {
            $this->db->query("SELECT * FROM request 
                                JOIN company ON request.companyId = company.companyId
                                JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                                JOIN playground ON request.playgroundId = playground.playgroundId
                                WHERE request.approved = 0");
        
            $result = $this->db->resultSet();

            return $result;
        }

        public function declineAssignment($id) {
            $this->db->query("UPDATE request SET approved = 2 WHERE requestId = $id;");
            
            $result = $this->db->resultSet();
        }

        public function acceptAssignment($id) {
            $this->db->query("UPDATE request SET approved = 1 WHERE requestId = $id;");
            
            $result = $this->db->resultSet();
        }
    }
?>
