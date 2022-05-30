<?php require 'database\dbconnection.php'; ?>
<style>
    <?php include 'css\table.css' ?>
</style>


<?php
$query = "SELECT * FROM request WHERE approved = 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Summary</th>
                <th>Date</th>
                <th>Time</th>
                <th>Place</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["requestName"]."</td><td>".$row["summary"]."</td><td>".$row["playDate"]."</td><td>".$row["playTime"]."</td><td>".$row["playGround"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();
?>