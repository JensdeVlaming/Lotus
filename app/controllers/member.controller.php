<?php
class MemberController extends Controller
{

    public static function showAssignmentOverview()
    {
        $memberModel = self::model("member");

        $resultSet = $memberModel->getOpenAssignments();

        if (sizeOf($resultSet) > 0) {
            self::view("member/overview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }

    public static function showRequestOverview()
    {
        $memberModel = self::model("member");

        $resultSet = $memberModel->getAssignmentRequests();

        if (sizeOf($resultSet) > 0) {
            self::view("coord/requestOverview", $resultSet);
        } else {
            echo "No open assignments found.";
        }
    }
}
