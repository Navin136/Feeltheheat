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
    <?php   
    include("header.php");
    ?>
    <div id="boxes">
    <div class="box1">
    <div id="form">
    <form action="moulding.php" method="post">
        <label for="current_part">Please Enter Running part      </label>
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

    </div>
    <?php
        if(isset($_POST["current_part"])){
        $current_part=$_POST["current_part"];
        if($current_part!=""){
            echo"<p class='success'>{$current_part} is now choosen !!</p>";
            $nk = "select * from live where id=1";
            $result = $conn->query($nk);
            if($result->num_rows>0){
                $sql = "UPDATE live SET current_part=$current_part where id=1";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Updated database</p>";
                }
            }
            else{
                $sql = "INSERT INTO live(current_part,id) VALUES ($current_part,1)";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Pushed to database</p>";
                }
            }
        }
        }
        else{
            echo "<p id='warning'>Please choose part number carefully, This change will reflect everywhere</p>";
        }
    ?>
    <?php
        if(isset($_POST["plan1"])){
            if($_POST["plan1"] != ''){
                $plan1 = $_POST["plan1"];
                $nk = "select * from live where id=2";
                $result = $conn->query($nk);
                if($result->num_rows>0){
                    $nextplan = "UPDATE live set current_part=$plan1 where id=2";
                    $nextplanpushed = $conn->query($nextplan);
                    if($nextplanpushed){
                        echo"<p class='success'>Next plan Updated to database</p>";
                    }
                    else{
                         echo "<p id='warning'>Failed to update database</p>";
                    }
            }else{
                $nextplan = "INSERT INTO live(current_part,id) VALUES ('$plan1','2')";
                $nextplanpushed = $conn->query($nextplan);
                if($nextplanpushed){
                    echo"<p class='success'>Next plan Pushed to database</p>";
                }
                else{
                     echo "<p id='warning'>Failed to update database</p>";
                }
            }
            }
            else{
                echo "<p id='warning'>Please Give next pattern to process</p>";
            }
        }
        else{
            echo "<p id='warning'>Please Give next pattern to process</p>";
        }
            
    ?>
    <div class="mouldingplan">
        <form action="moulding.php" method="post">
        <div class="plan1">
            <label for="plan1">Next Pattern</label>
            <select name="plan1">
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
        <button type="submit" id="npbtn">Submit</button>    
        </div>
        </form>
    </div>
    </div>
    <div class="box2">
            <?php
            $cp="SELECT current_part from live where id=1";
            $np="SELECT current_part from live where id=2";
            $cpr = $conn->query($cp);
            $cpp = $cpr->fetch_assoc();
            $npr = $conn->query($np);
            $npp = $npr->fetch_assoc();
            echo '<p>Current pattern :</br><b>'.$cpp["current_part"].'</b></br> Next Pattern :</br><b>'.$npp["current_part"].'</b></p>';
            ?>
    </div>
    </div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>
