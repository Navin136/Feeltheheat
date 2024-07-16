<?php
$conn = new mysqli('localhost', 'root', '', 'MASTER');
if ($conn -> connect_errno){ 
       echo "Failed to connect to MySQL: " . $conn -> connect_error; 
       exit(); 
}
$sql = "select * from part_details "; 
$result = $conn->query($sql);
$row =[]; 
if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $row = $result->fetch_all(MYSQLI_ASSOC);   
    }
print_r($row);
?>