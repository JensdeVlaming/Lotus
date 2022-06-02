<?php

<<<<<<< HEAD
class ClientModel {

=======
class MemberModel{
>>>>>>> 24b8c92678babfc3602175d7ceecc7f10f8d985f
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

<<<<<<< HEAD
    public function getRequestDetail($requestId) {
        $this->db->query("SELECT * FROM  request INNER JOIN user ON request.clientEmail=user.email WHERE id = :id;");
        $this->db->bind(":id",$requestId);
=======
    public function getOpenAssignments() {
        $this->db->query("SELECT * FROM request WHERE approved = 1");
>>>>>>> 24b8c92678babfc3602175d7ceecc7f10f8d985f
        
        $result = $this->db->resultSet();

        return $result;
    }

<<<<<<< HEAD
    // function getRequestDetails($requestId) {
    //     $this->db->query("SELECT * FROM request WHERE id = :id;");
    //     $this->db->bind(":id", $requestId);
        
    //     $result = $this->db->resultSet();

    //     return $result;
      
    // }

=======
    public function getYourAssignments(){
        
    }

    public function test(){
        echo "test";
    }
>>>>>>> 24b8c92678babfc3602175d7ceecc7f10f8d985f
}
