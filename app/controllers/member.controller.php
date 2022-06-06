<?php
class MemberController extends Controller
{

    public function __construct() {
        $this->memberModel=$this->model("member");
    }

    public function requestDetails()
    {
    
       $resultSet=$this->memberModel->getRequestDetails(3);

    //   print_r($resultSet);
        // $this->view("/member/requestDetails",$resultSet);
        if (sizeOf($resultSet) > 0) {
            self::view("member/requestDetails", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }

    
    public function showAssignmentOverview()
    {

        $resultSet = $this->memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }
    

}



