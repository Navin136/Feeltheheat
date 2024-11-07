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
    
    <form action="moulding.php" method="post">
        <label for="todaydate">Choose date </label>
        <input type="date" name="todaydate"></br>
        <button name="planfetcher">Fetch plans</button></br>
    </form>
    <form action="moulding.php" method="post">
    <?php
    if(isset($_POST['planfetcher'])){
        $todaydate = $_POST['todaydate'];
        //$todaydate = date('Y-m-d', strtotime($_POST['todaydate']));
        echo '<label for="current_part">Please choose running part      </label>';
        echo '<select name="current_part">';
        echo '<option value=""></option>';
            $sql="select id,part from todayplan where todaydate='$todaydate'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo"<option value=\"$row[id]\">$row[part]</option>";
                }
            }
        echo '</select>';
        echo "<button type=\"submit\">Submit</button>";
        }?>
        
        </form>
    <?php
        if(isset($_POST["current_part"])){
        $id=$_POST["current_part"];
        $partgot = "select part from todayplan where id='$id'";
        $res=$conn->query($partgot);
        if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
                $current_part=$row['part'];
            }
        }
        else{
            echo "Query failed";
        }
        $nid=(int)$id+1;
        $nextpart= "select part from todayplan where id='$nid'";
        $nres=$conn->query($nextpart);
        if($nres->num_rows>0){
            while($row=$nres->fetch_assoc()){
                $next_part=$row['part'];
            }
        }
        else{
            echo "Query failed";
        }
        if($current_part!=""){
            echo"<p class='success'>{$current_part} is now choosen !!</p>";
            $nk = "select * from live where id=1";
            $result = $conn->query($nk);
            if($result->num_rows>0){
                $sql = "UPDATE live SET current_part=$current_part where id=1";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Updated Current Pattern to database</p>";
                }
            }
            else{
                $sql = "INSERT INTO live(current_part,id) VALUES ($current_part,1)";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Pushed Current Pattern to database</p>";
                }
            }
        }
        if($next_part!=""){
            $nk = "select * from live where id=2";
            $result = $conn->query($nk);
            if($result->num_rows>0){
                $sql = "UPDATE live SET current_part=$next_part where id=2";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Updated Next Pattern to database</p>";
                }
            }
            else{
                $sql = "INSERT INTO live(current_part,id) VALUES ($next_part,2)";
                $result = $conn->query($sql);
                if($result){
                    echo"<p class='success'>Pushed Next Pattern to database</p>";
                }
            }
        }
        }
        else{
            echo "<p id='warning'>Please choose part number carefully, This change will reflect everywhere</p>";
        }
    ?>
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
