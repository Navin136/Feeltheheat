<?php include("header.php");?>
<?php
    $conn = new mysqli('localhost','root','','MASTER');
    if($conn->connect_error){
        die("Connection Error".$conn->connect_error);
    }
    else{
        echo "Connection Succesful";
        $part=$_GET['part'];
        $sql="DELETE from part_details where part_number='$part'";
        $deleted=$conn->query($sql);
        if($deleted){
            header("location: ./master.php");
        }else{
            echo "Something went wrong. Please contact Navin";
        }
    }
?>
<?php include("footer.php");?>