<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Charge Mix Chooser</title>
    <link rel='stylesheet' href='css/chargemixchooser.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['runningpart'])==''){
                echo "Please Choose Part number before submitting";
            }
            else{
                $runningpart = $_POST['runningpart'];
                $checkquery = "SELECT runningpart from chargemixdisplay";
                $res=$conn->query($checkquery);
                if($res->num_rows>0){
                    $query = "UPDATE chargemixdisplay SET runningpart='$runningpart' WHERE id=1";
                    $result=$conn->query($query);
                    if($result){
                        echo "<b>Updated Successfully !</b></br>";
                        echo "<a href='chargemixdisplay.php'>Click here </a>to go to Chargemix display";
                    }
                }else{
                    echo "Row not available";
                    $addquery = "INSERT INTO chargemixdisplay(id,runningpart) VALUES (1,'$runningpart')";
                    $result=$conn->query($addquery);
                    if($result){
                        echo "<b>Pushed Successfully !</b></br>";
                        echo "<a href='chargemixdisplay.php'>Click here </a>to go to Chargemix display";
                    }
                }
                
            }
        }
    ?>
    <form action="chargemixchooser.php" method="post">
        <label for="runningpart">Part Number</label>
        <select name="runningpart">
            <option value=""></option>
            <?php
            $sql = "SELECT part_number from part_details";
            $res = $conn->query($sql);
            if(!$res->num_rows>0){
                echo "Query Failed";
            }
            else{
                while($row=$res->fetch_assoc()){
                echo "<option value='$row[part_number]'>$row[part_number]</option>";}}
            ?>
        </select>
        <button type="submit">Update</button>
    </form>
    <?php   
    include("footer.php");
    ?>
</body>
</html>