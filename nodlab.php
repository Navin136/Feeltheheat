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
                    $nk='';
                    $cp="SELECT current_part from live where id=1";
                    $cpr = $conn->query($cp);
                    $cpp = $cpr->fetch_assoc();
                    $cppid=$cpp['current_part'];
                    $curr_patt = "SELECT * from todayplan where id='$cppid'";
                    $cresult = $conn->query($curr_patt);
                    $currresult = $cresult->fetch_assoc();
                    $nk = "$currresult[part]";
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
                        <div>
                            <label id="datelabel">Date: </label>
                            <input class="datearea" type="text" readonly value='<?php echo $currresult['todaydate'];?>'>
                            <label id="dclabel">Datecode:</label>
                            <?php
                                		$dateselected=$currresult['todaydate'];
                                        $yeargot = substr($dateselected,0,4);
                                        $lastdigit = substr($dateselected,3,1);
                                        $firstdate=$yeargot."-01-00";
                                        $datecode = (strtotime($dateselected)-strtotime($firstdate))/(60*60*24).$lastdigit;
                                        if(strlen((string)$datecode)==2 ){
                                            $datecode = "00".$datecode;
                                        }elseif(strlen((string)$datecode)==3 ){
                                            $datecode = "0".$datecode;
                                        }
                            ?>
                            <input class="datearea" id="dcinput" type="text" readonly value='<?php echo $datecode;?>'>
                        </div>
                        <tr>
                            <td class="labels"><label for='pattern'>Part Number</label></td>
                            <td><input type='text' name='pattern' readonly id='pattern' value='<?php echo $nk;?>'></td>
                        </tr>
                        <tr>
                            <td class="labels"><label for='noofmoulds'>Planned Moulds</label></td>
                            <td><input type='text' name='noofmoulds' readonly id='pattern' value='<?php echo $currresult['moulds'];?>'></td>
                        </tr>
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
