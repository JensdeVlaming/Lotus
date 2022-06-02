<?php
<<<<<<< HEAD

class MemberController extends Controller
{

    public function __construct() {
        $this->memberModel=$this->model("member");
    }

    public function requestDetails()
    {
    
       $resultSet=$this->memberModel->getRequestDetails(20);

    //   print_r($resultSet);
    $this->view("/member/requestDetails",$resultSet);
    }

    
    public function showAssignmentOverview()
    {

        $resultSet = $memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }
    

}



