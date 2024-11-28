<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Nodularity Lab</title>
    <link rel='stylesheet' href='css/nodlab.css'>
    <meta http-equiv="refresh" content="5">
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php
    include("header.php");
    ?>
        <div class='labcontent'>
            <table>
                <?php
                    $sql= 'SELECT current_part,id from live where id=1';
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()){
                            echo "<tr>
                                    <td><label for='pattern'>Running Part Number</label></td>
                                    <td><input type='text' id='pattern' readonly value='$row[current_part]'></td>
                                </tr>";
                        }
                    }
                ?>
                <?php
                    $nk='';
                    $part = 'SELECT current_part,id from live where id=1';
                    $respart = $conn->query($part);
                    $row = $respart->fetch_assoc();
                    $nk = "$row[current_part]";
                    $sql= 'SELECT * from part_details where part_number='.$nk;
                    $result = $conn->query($sql);
                    if($result->num_rows>0)
                        while ($row=$result->fetch_assoc()){
                            $grade=$row['grade'];
                            $metalweight=$row['metalweight'];
                            $temperature=$row['temperature'];
                            $treewt=$row['treewt'];
                            $pouring_time=$row['pouring_time'];
                            $inoculant=$row['inoculant'];
                            $flow_rate=$row['flow_rate'];
                            $taddition=$row['taddition'];
                            $mg=$row['magnesium'];
                            if($mg>0.025){
                                $fadingtime="960";
                            }else{
                                $fadingtime="720";
                            }
                            $mouldsperladle = round($metalweight/($treewt+0.1));//100 grams spillage is choosen approximately
                ?>
                        <tr>
                            <td><label for='grade'>Grade</label></td>
                            <td><input type='text' name='grade' readonly id='pattern' value='<?php echo $grade;?>'></td>
                        </tr>
                        <tr>
                            <td><label for='mtwt'>Metal Weight</label></td>
                            <td><input type='text' name='mtwt' readonly id='pattern' value='<?php echo $metalweight;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='mpl'>Moulds Per Ladle</label></td>
                            <td><input type='text' name='mpl' readonly id='mpl' value='<?php echo $mouldsperladle;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='temperature'>Pouring temperature</label></td>
                            <td><input type='text' name='temperature' readonly id='temperature' value='<?php echo $temperature;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='ptime'>Pouring time (Seconds)</label></td>
                            <td><input type='text' name='ptime' id='ptime' readonly value='<?php echo $pouring_time;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='ftime'>Fading time (Seconds)</label></td>
                            <td><input type='text' name='ftime' id='ftime' readonly value='<?php echo $fadingtime;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='inoculant'>Inoculant</label></td>
                            <td><input type='text' name='inoculant' readonly id='pattern' value='<?php echo $inoculant;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='flowrate'>Flow Rate in Gms/Sec</label></td>
                            <td><input name='flowrate' id='flowrate' readonly value='<?php echo $flow_rate;?>' readonly></td>
                        </tr>
                        <tr>
                            <td><label for='taddition'>Tundish Addition</label></td>
                            <td><input type='text' name='taddition' id='taddition' readonly value="<?php echo $taddition;?>"></td>
                        </tr>
                        <?php };?>
            </table>
            <!-- <button id='gather' onclick=''>Get Data</button> -->
        </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
