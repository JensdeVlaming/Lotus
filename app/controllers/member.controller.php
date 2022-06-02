<?php
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
