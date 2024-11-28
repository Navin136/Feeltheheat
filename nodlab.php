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
                <div>
                    <label id="datelabel">Date: </label>
                    <input class="datearea" type="text" readonly value='<?php echo date('d-m-Y');?>'>
                    <label id="dclabel">Datecode:</label>
                    <input class="datearea" id="dcinput" type="text" readonly value='<?php echo "1234";?>'>
                </div>
                <?php
                    $sql= 'SELECT current_part,id from live where id=1';
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()){
                            echo "<tr>
                                    <td class='labels'><label for='pattern'>Part Number</label></td>
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
                            $mp = "SELECT moulds from todayplan where part='$nk'";
                            $mpres = $conn->query($mp);
                            $mpresrow = $mpres->fetch_assoc();
                            $noofmoulds= $mpresrow['plan'];
                ?>
                        <!-- <tr>
                            <td class="labels"><label for='noofmoulds'>Planned Moulds</label></td>
                            <td><input type='text' name='noofmoulds' readonly id='pattern' value='<?php echo $noofmoulds;?>'></td>
                        </tr> -->
                        <tr>
                            <td class="labels"><label for='grade'>Grade</label></td>
                            <td><input type='text' name='grade' readonly id='pattern' value='<?php echo $grade;?>'></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='mtwt'>Metal Weight</label></td>
                            <td><input type='text' name='mtwt' readonly id='pattern' value='<?php echo "$metalweight"." Kgs";?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='mpl'>Moulds Per Ladle</label></td>
                            <td><input type='text' name='mpl' readonly id='mpl' value='<?php echo $mouldsperladle;?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='temperature'>Pouring temperature</label></td>
                            <td><input type='text' name='temperature' readonly id='temperature' value='<?php echo "$temperature"." C";?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='ptime'>Pouring time</label></td>
                            <td><input type='text' name='ptime' id='ptime' readonly value='<?php echo "$pouring_time"." Seconds";?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='ftime'>Fading time</label></td>
                            <td><input type='text' name='ftime' id='ftime' readonly value='<?php echo "$fadingtime"." Seconds";?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='inoculant'>Inoculant</label></td>
                            <td><input type='text' name='inoculant' readonly id='pattern' value='<?php echo $inoculant;?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='flowrate'>Flow Rate in Gms/Sec</label></td>
                            <td><input name='flowrate' id='flowrate' readonly value='<?php echo $flow_rate;?>' readonly></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='taddition'>Tundish Addition</label></td>
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
