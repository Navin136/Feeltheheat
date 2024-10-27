<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Today plan</title>
    <link rel='stylesheet' href='css/plan.css'>
    <script defer src='js/plan.js'></script>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if(isset($_POST['uploadplan'])){
            $condate = date('Y-m-d', strtotime($_POST['todaydate']));
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
        }
    ?>
    <form action="./plan.php" method="post">
        <label for="todaydate">Date</label>
        <input type="date" name="todaydate" id="datechooser">
    <div>
        <table id="plantable">
            <tr>
                <th>Plan No.</th>
                <th>Part Number</th>
                <th>No. of Moulds</th>
            </tr>
        </table>
        <input type="button" id="addplan" value="Add new plan">
    </div>
    <button type="submit" name="uploadplan">Upload Plan</button>
    </form>
    
    <?php   
    include("footer.php");
    ?>
</body>
</html>
