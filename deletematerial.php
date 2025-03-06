<?php include("header.php");?>
<?php
    $conn = new mysqli('localhost','root','','MASTER');
    if($conn->connect_error){
        die("Connection Error".$conn->connect_error);
    }
    else{
        $material=$_GET['material'];
        echo $material;
        $sql="DELETE from composition where material='$material'";
        $deleted=$conn->query($sql);
        if($deleted){
            header("location: ./chargemix.php");
        }else{
            echo "Something went wrong. Please contact Navin";
        }
    }
?>
<?php include("footer.php");?>