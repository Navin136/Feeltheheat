<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "MASTER";
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$current_part=$_POST["current_part"];

?>
