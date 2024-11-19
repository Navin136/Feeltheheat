<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Updater</title>
    <link rel="stylesheet" href="css/planupdater.css">
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if(isset($_POST['uploadplan'])){
            $condate = date('Y-m-d', strtotime($_POST['tdate']));
            if(isset($_POST['plan1']) && $_POST['part1'] !='' && $_POST['moulds1'] !=''){
                $value=1;
                for($i=1;$i<=$value;$i++){
                    if(isset($_POST["plan$i"]) && $_POST["part$i"]!='' && $_POST["moulds$i"]!=''){
                        $plan = $_POST["plan$i"];
                        $part = $_POST["part$i"];
                        $moulds = $_POST["moulds$i"];
                        echo "Plan Number ".$plan. " is".$part." for ". $moulds."moulds\n"."</br>";
                        $value++;
                        $sql = "INSERT INTO todayplan(todaydate,plan_no,part,moulds) VALUES('$condate','$plan','$part','$moulds')";
                        $pushed = $conn->query($sql);
                        if(!$pushed){
                            echo "Something Errored !";
                        }
                    }else{
                        $noofplan = $i-1;
                        if($noofplan == 1){
                            echo "One plan is given";
                        }
                        else{
                            echo "$noofplan plans are given";
                        }
                    }
            }
            }else{
                echo "Please Fill all the fields";
            }
        }?>
    <form action="planupdater.php" method="post">
        <div id='tdate'><label for="tdate">Date</label>
        <input type="date" name="tdate"></div>
        <?php
        $conn=new mysqli('localhost','root','','MASTER');
        if($conn->connect_error){
            echo "Something rekt while connecting db";
        }
        echo "<table id='plantable'>";
        echo "<tr><th>Plan No</th>";
        echo "<th>Part</th>";
        echo "<th>No. Of Moulds</th></tr><tr>";
        for($i=1;$i<=20;$i++){
            echo "<td><input class='slno' name='plan$i' value=$i readonly></td>";
            echo "<td><select class='partseltag' name='part$i'>";
            echo "<option value=></option>";
            $parts="select part_number from part_details";
            $resparts=$conn->query($parts);
            if($resparts->num_rows>0){
                while($row = $resparts->fetch_assoc()){
                    echo"<option value=\"$row[part_number]\">$row[part_number]</option>";
                }
            }else{
                echo "Query failed";
            }
            echo "</select></td>";
            echo "<td><input name='moulds$i'></td></tr>";
        }
        echo "</table>";
        ?>
        <button type="submit" name="uploadplan">Submit</button>
    </form>
    <?php   
    include("footer.php");
    ?>
</body>
</html>