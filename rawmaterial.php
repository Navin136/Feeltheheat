<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Raw Material Requirements</title>
    <link rel='stylesheet' href='css/rawmaterial.css'>
    <script defer src='js/melting.js'></script>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if(isset($_POST['get_material'])){
            $part_no = $_POST['part_no'];
            $moulds = $_POST['moulds'];
            $get_part = "SELECT * FROM part_details WHERE part_number=$part_no";
            $get_pert_result = $conn->query($get_part);
            if($get_pert_result->num_rows>0){
                $row=$get_pert_result->fetch_assoc();
                $treewt_db = $row['treewt'];
                $inoculant = $row['inoculant'];
                $alloy = $row['alloy'];
                $mtwt = $row['metalweight'];
                $fr = $row['flow_rate'];
                $laddition = $row['laddition'];
                $taddition = $row['taddition'];
                $mischmetal = $row['mischmetal'];
                $copper = $row['copper'];
                $tin = $row['tin'];
                $manganese = $row['manganese'];
                $magnesium = $row['magnesium'];
                $pouring_time = $row['pouring_time'];
                $trim_time = (int)substr($pouring_time,0,-3);
                $flow_rate = (int)$row['flow_rate'];
                $metal_needed = ($treewt_db * $moulds)/1000;
                echo "<div id='result'><p>The needed metal for the plan of <b>'$part_no'</b> for <b>'$moulds'</b> moulds is <b>'$metal_needed'</b> tons"."</p>";
                $inoculant_required = ($flow_rate*$moulds*$trim_time)/1000;
                echo "<p>Inoculant needed is <b>$inoculant_required</b> Kgs of <b>".$inoculant."</b></p>";
                $moulds_per_ladle = $mtwt/$treewt_db;
                echo "<p>Moulds per ladle is <b>".(int)$moulds_per_ladle . "</b>   [ ".$mtwt." Kgs ]"."</p>";
                $number_of_ladles=(int)($moulds/$moulds_per_ladle);
                echo "<p>Number of Ladles Required is <b>".$number_of_ladles."</b></p>";
                $tin_needed=round($number_of_ladles*$mtwt*($tin-0.01)/95,2);
                echo "<p>Required Tin is <b>$tin_needed</b> Kgs</p>";
                $copper_needed=round($number_of_ladles*$mtwt*($copper-0.1)/95,1);
                echo "<p>Required Copper is <b>$copper_needed</b> Kgs</p>";
                if($magnesium > 0.02){
                    $alloy_needed = $number_of_ladles * 0.95 * $mtwt / 100;
                    echo "<p>Alloy needed is <b>$alloy_needed</b> Kgs of <b>$alloy</b> </p></div>";
                }else{
                    $alloy_needed = $number_of_ladles * 0.3 * $mtwt / 100;
                    echo "<p>Alloy needed is <b>$alloy_needed</b> Kgs of <b>$alloy </b></p></div>";
                }
                
                
            }else{
                echo "Query failed";
            }
        }
    ?>
    <div id='plannerpage'>
    <form action="rawmaterial.php" method="post">
        <div id='partsel'>
        <label for="part_no">Part Number</label>
        <select name="part_no">
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
        </select></br></div>
        <label for="moulds">No. of Moulds</label>
        <input name="moulds"><br>
        <button type="submit" name="get_material">Get Required material</button>
    </form></div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>
