<?php
class MemberController extends Controller
{

    public function __construct()
    {
        $this->memberModel = $this->model("member");
        $this->registerMiddleware(new AuthMiddleware(["getOverview"]));
    }
    
    public function getOverview()
    {
        $resultSet = $this->memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }

    public function participateAssignment($data) {
        $id = $data["params"]["id"];

        $result = $this->memberModel->participateAssignment($id);
    
        if ($result) {
            echo "Succesvol aangemeld voor opdracht ".$id;
        } else {
            echo "Er is iets fout gegegaan tijdens het aanmelden voor opdracht ".$id;
        }
    }
}
