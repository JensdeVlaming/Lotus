<?php
    class CoordModel{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAssignmentRequests() {
            $this->db->query("SELECT * FROM request 
                                LEFT JOIN company ON request.companyId = company.companyId
                                LEFT JOIN grimelocation ON request.grimeLocationId = grimelocation.grimeLocationId
                                LEFT JOIN playground ON request.playgroundId = playground.playgroundId
                                LEFT JOIN contact ON request.contactId = contact.contactId
                                LEFT JOIN billingaddress ON request.billingaddressId = billingaddress.billingaddressId");
        
            $result = $this->db->resultSet();

            return $result;
        }

        public function declineAssignment($id) {
            $this->db->query("UPDATE request SET approved = 3 WHERE requestId = $id;");
            
            $result = $this->db->resultSet();
        }

        public function AssigmentInProgress($id) {
            $this->db->query("UPDATE request SET approved = 1 WHERE requestId = $id;");
            
            $result = $this->db->resultSet();
        }
    }
?>
