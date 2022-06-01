<?php

class ClientModel {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getRequestDetail($requestId) {
        $this->db->query("SELECT * FROM  request INNER JOIN user ON request.clientEmail=user.email WHERE id = :id;");
        $this->db->bind(":id",$requestId);
        
        $result = $this->db->resultSet();

        return $result;
    }

    // function getRequestDetails($requestId) {
    //     $this->db->query("SELECT * FROM request WHERE id = :id;");
    //     $this->db->bind(":id", $requestId);
        
    //     $result = $this->db->resultSet();

    //     return $result;
      
    // }

}
