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

    

}
=======
class MemberController extends Controller
{

    public function showAssignmentOverview()
    {
        $memberModel = $this->model("member");

        $resultSet = $memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }
}
>>>>>>> 24b8c92678babfc3602175d7ceecc7f10f8d985f
