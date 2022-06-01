<?php
class CoordController extends Controller
{
    public static function showRequestOverview()
    {
        $coordModel = self::model("coord");

        $resultSet = $coordModel->getAssignmentRequests();

        if (sizeOf($resultSet) > 0) {
            self::view("coord/requestOverview", $resultSet);
        } else {
            echo "No requests found.";
        }
    }
}
