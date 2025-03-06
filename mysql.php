<?php
$servername = "localhost";
$username = "root";
$password = "navin";
$db = "MASTER";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $sql = "SELECT * FROM part_details";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "{$row["part_number"]}";
//     }
// }
//$conn->close;
?> 