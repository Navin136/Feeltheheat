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
        else{
            echo "<p id='warning'>Please choose part number carefully, This change will reflect everywhere</p>";
        }
        }
    ?>
    <?php
        if(isset($_POST["date"]) && isset($_POST["plan1"]) && isset($_POST["plan1moulds"])){
            $date = $_POST["date"];
            $plan1 = $_POST["plan1"];
            $plan2 = $_POST["plan2"];
            $plan3 = $_POST["plan3"];
            $plan4 = $_POST["plan4"];
            $plan5 = $_POST["plan5"];
            $plan6 = $_POST["plan6"];
            $plan1moulds = $_POST["plan1moulds"];
            $plan2moulds = $_POST["plan2moulds"];
            $plan3moulds = $_POST["plan3moulds"];
            $plan4moulds = $_POST["plan4moulds"];
            $plan5moulds = $_POST["plan5moulds"];
            $plan6moulds = $_POST["plan6moulds"];
        }
    ?>
    <div class="mouldingplan">
        <form action="moulding.php" method="post">
        <div class="date">
            <label for="date">Date</label>
            <input type="date" name="date" id="date">
        </div>
        <div class="plan1">
            <label for="plan1">Plan 1</label>
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
            <input type="text" name="plan1moulds" id="plan1moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan2">
            <label for="plan2">Plan 2</label>
            <select name="plan2">
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
            <input type="text" name="plan2moulds" id="plan2moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan3">
            <label for="plan3">Plan 3</label>
            <select name="plan3">
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
            <input type="text" name="plan3moulds" id="plan3moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan4">
            <label for="plan4">Plan 4</label>
            <select name="plan4">
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
            <input type="text" name="plan4moulds" id="plan4moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan5">
            <label for="plan5">Plan 5</label>
            <select name="plan5">
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
            <input type="text" name="plan5moulds" id="plan5moulds" placeholder="No. Of Moulds">
        </div>
        <div class="plan6">
            <label for="plan6">Plan 6</label>
            <select name="plan6">
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
            <input type="text" name="plan6moulds" id="plan6moulds" placeholder="No. Of Moulds">
        </div>
        <button type="submit">Submit</button>
        </form>
    </div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>
