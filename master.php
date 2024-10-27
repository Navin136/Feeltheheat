<?php
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>
    <link rel="stylesheet" href="css/master.css">
    <script defer src="js/melting.js"></script>
    <link rel="icon" href="icon.png">
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <div class="master">
        <div class="new_master"><a href="./create.php" id="np">Create Part data</a></div>
        <table>
            <tr>
                <th>Part</th>
	            <th>C%</th>
                <th>Si%</th>
                <th>Cu%</th>
                <th>Sn%</th>
                <th>Mn%</th>
                <th>Mo%</th>
                <th>Ni%</th>
                <th>Mg%</th>
                <th>Misch metal</th>
                <th>L.A</th>
                <th>Alloy</th>
                <th>Metal Wt.</th>
                <th>Temp</th>
                <th>Inoculant</th>
                <th>Flow Rate</th>
                <th>TA</th>
                <th>Pouring Time</th>
                <th>Tree Weight</th>
                <th>Last updated on</th>
                <th>Amend</th>
            </tr>
            <tr>
            <?php
                $sql = "SELECT * FROM part_details";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                   while($row = $result->fetch_assoc()) {
                    $part = $row["part_number"];
                    $c = $row["carbon"];
                    $si = $row["silicon"];
                    $cu = $row["copper"];
                    $sn = $row["tin"];
                    $mn = $row["manganese"];
                    $mo = $row["molybdenum"];
                    $mg = $row["magnesium"];
                    $ni = $row["nickel"];
                    $mm = $row["mischmetal"];
                    $la = $row["laddition"];
                    $ta = $row["taddition"];
                    $temp = $row["temperature"];
                    $mtwt = $row["metalweight"];
                    $fr = $row["flow_rate"];
                    $pt = $row["pouring_time"];
                    $in = $row["inoculant"];
                    $alloy = $row["alloy"];
                    $treewt = $row["treewt"];
                    $updated = $row["created_at"];
                    echo "<tr><td>$part</td><td>$c</td><td>$si</td><td>$cu</td><td>$sn</td><td>$mn</td><td>$mo</td><td>$ni</td><td>$mg</td><td>$mm</td><td>$la</td><td>$alloy</td><td>$mtwt</td><td>$temp</td><td>$in</td><td>$fr</td><td>$ta</td><td>$pt</td><td>$treewt</td><td>$updated</td><td><a id=\"edit\" href='./edit.php?part=$part'>Edit</a></td></tr>";
                    }
                }
            ?>
            </tr>
        </table>
    </div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>