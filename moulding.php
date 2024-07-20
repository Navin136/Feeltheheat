<?php
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moulding</title>
    <link rel="stylesheet" href="css/moulding.css">
    <link rel="icon" href="icon.png">
</head>
<body>
    <div id="mainheader">
        <p id="FTH"><img src="fth.png" alt="" id="fthicon"> Melt Ease</p>
        <a class="dept" href="melting.php">Melting</a>
        <a class="dept" href="spectrolab.php">Holding</a>
        <a class="dept" href="treatment.php">Treatment</a>
        <a class="dept" href="nodlab.php">Nodularity Lab</a>
        <!-- <a class="dept" href="moulding.php">Moulding</a> -->
    </div>
    <form action="moulding.php" method="post">
        <label for="current_part">Please Enter Running part</label>
        <select name="current_part">
        <option value=""></option>
            <?php
            $sql="select part_number from part_details";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo"<option value=\"$row[part_number]\">$row[part_number]</option>";
                }
            }
            ?>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php
        if($_POST["current_part"]!=""){
            $current_part=$_POST["current_part"];
            echo "<b>{$current_part}</b> is now choosen !!";
            $nk = "select * from live where id=1";
            $result = $conn->query($nk);
            if($result->num_rows>0){
                $sql = "UPDATE live SET current_part=$current_part where id=1";
                $result = $conn->query($sql);
                if($result){
                    echo"Updated database";
                }
            }
            else{
                $sql = "INSERT INTO live(current_part,id) VALUES ($current_part,1)";
                $result = $conn->query($sql);
                if($result){
                    echo"Pushed to database";
                }
            }
            $conn->close;
        }
        else{
            echo"Please choose part number carefully";
        }
    ?>
    <!-- <div class="mouldingplan">
        <div class="date">
            <label for="date">Date</label>
            <input type="date" name="date" id="date">
        </div>
        <div class="plan1">
            <label for="plan1">Plan 1</label>
            <input type="text" id="plan1" name="plan1" placeholder="Part Number">
            <input type="text" name="plan1moulds" id="plan1moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan2">
            <label for="plan2">Plan 2</label>
            <input type="text" id="plan2" name="plan2" placeholder="Part Number">
            <input type="text" name="plan2moulds" id="plan2moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan3">
            <label for="plan3">Plan 3</label>
            <input type="text" id="plan3" name="plan3" placeholder="Part Number">
            <input type="text" name="plan3moulds" id="plan3moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan4">
            <label for="plan4">Plan 4</label>
            <input type="text" id="plan4" name="plan4" placeholder="Part Number">
            <input type="text" name="plan4moulds" id="plan4moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan5">
            <label for="plan5">Plan 5</label>
            <input type="text" id="plan5" name="plan5" placeholder="Part Number">
            <input type="text" name="plan5moulds" id="plan5moulds" placeholder="No. Of Moulds">
        </div>
        <button type="submit">Upload</button>
    </div> -->
    <div id="footer">
        <h2><b>Designed by Navin Kumar</b></h2>
        <p>&#169 Copyright 2024. All rights reserved.</p>
    </div>
</body>
</html>