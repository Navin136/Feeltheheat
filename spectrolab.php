<?php
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holding</title>
    <script defer src="js/spec.js"></script>
    <script src="js/spectrolab.js"></script>
    <script defer src="js/holderchemistry.js"></script>
    <link rel="stylesheet" href="css/spectrolab.css">
    <link rel="icon" href="icon.png">
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
                $part = 'SELECT current_part,id from live where id=1';
                $respart = $conn->query($part);
                $partrow = $respart->fetch_assoc();
                $nk = "$partrow[current_part]";
                $sql = "SELECT * FROM part_details where part_number=".$nk;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $holder = 'SELECT * from holder where id=1';
                $reshold = $conn->query($holder);
                $rowholder =$reshold->fetch_assoc();
            ?>
    <div id="header">
        <h3>Holding Furnace Calculations</h3>
        <label for="hlevel">Holder Level  </label>
        <input name="hlevel" id="hlevel" value="" onchange="calculate()">
        <label for="tweight">Tapping Weight  </label>
        <input name="tweight" value="6" id="tweight">
        <label for="carburizer">Choose carburizer: </label>
        <select name="carburizer" id="carbsel">
            <option value="hic">Hi-Carbon</option>
            <option value="neo">Neograf / Graphite</option>
        </select>
        <label for="heat">Last Heat Transferred</label>
        <input name="heat" value=<?php echo "$rowholder[heat]";?>></br>
    </div>
    <div id="calccon">
        <div id="patternspec">
            <label for="pattern">Running Pattern</label>
            <input name="pattern" id="pattern" class="comp" value=<?php echo "$row[part_number]";?>><br>
            <label for="pcarbon">C%</label>
            <input name="pcarbon" id="pcarbon" class="comp" value=<?php echo "$row[carbon]";?>><br>
            <label for="psilicon">Si%</label>
            <input name="psilicon" id="psilicon" class="comp" value=<?php
            if("$row[magnesium]">0.03){
                $hsilicon = "$row[silicon]"-(0.45);
                echo round($hsilicon,1);
            }else{
                $hsilicon = "$row[silicon]"-(0.30*0.45);
                echo round($hsilicon,1);
            }?>><br>
            <label for="pcopper" id="lpcopper">Cu%</label>
            <input name="pcopper" id="pcopper" class="comp" value=<?php echo "$row[copper]";?>><br>
            <label for="ptin" id="lptin">Sn%</label>
            <input name="ptin" id="ptin" class="comp" value=<?php echo "$row[tin]";?>><br>
            <label for="pmanganese" id="lpmanganese">Mn%</label>
            <input name="pmanganese" id="pmanganese" class="comp" value=<?php echo "$row[manganese]";?>><br>
            <label for="pmolybdenum" id="lpmolybdenum">Mo%</label>
            <input name="pmolybdenum" id="pmolybdenum" class="comp" value=<?php echo "$row[molybdenum]";?>><br>
            <label for="pnickel" id="lpnickel">Ni%</label>
            <input name="pnickel" id="pnickel" class="comp" value=<?php echo "$row[nickel]";?>><br>
            <label for="ptitanium" id="lptitanium">Ti%</label>
            <input name="ptitanium" id="ptitanium" class="comp" value=<?php
            if("$row[magnesium]">0.03){
                echo 0.001;
            }else{
                echo 0.07;
            }?>><br>
            <!-- <input type="button" id="getdata" onclick="getdata()" value="Get data"> -->
        </div>
        <div id="holdercalc">
        <table>
                <tr>
                    <th class="boxtitle">Elements</th>
                    <th class="boxtitle">Holder Chemistry</th>
                    <th class="boxtitle">Required Chemistry</th>
                    <th class="boxtitle">Furnace Chemistry</th>
                    <th class="boxtitle">Additions to be Added (Kgs.)</th>
                </tr>
                <tr>
                    <td>C%</td>
                    <td><input name="hc" id="hc" value=<?php echo "$rowholder[carbon]";?>></td>
                    <td><input name="rc" id="rc" readonly></td>
                    <td><input name="fc" id="fc"></td>
                    <td><input name="wc" id="wc" readonly></td>
                </tr>
                <tr>
                    <td>Si%</td>
                    <td><input name="hsi" id="hsi" value=<?php echo "$rowholder[silicon]";?>></td>
                    <td><input name="rsi" id="rsi" readonly></td>
                    <td><input name="fsi" id="fsi"></td>
                    <td><input name="wsi" id="wsi" readonly></td>
                </tr>
                <tr class="cuclass">
                    <td>Cu%</td>
                    <td><input name="hcu" id="hcu" value=<?php echo "$rowholder[copper]";?>></td>
                    <td><input name="rcu" id="rcu" readonly></td>
                    <td><input name="fcu" id="fcu"></td>
                    <td><input name="wcu" id="wcu" readonly></td>
                </tr>
                <tr class="snclass">
                    <td>Sn%</td>
                    <td><input name="hsn" id="hsn" value=<?php echo "$rowholder[tin]";?>></td>
                    <td><input name="rsn" id="rsn" readonly></td>
                    <td><input name="fsn" id="fsn"></td>
                    <td><input name="wsn" id="wsn" readonly></td>
                </tr>
                <tr class="mnclass">
                    <td>Mn%</td>
                    <td><input name="hmn" id="hmn" value=<?php echo "$rowholder[manganese]";?>></td>
                    <td><input name="rmn" id="rmn" readonly></td>
                    <td><input name="fmn" id="fmn"></td>
                    <td><input name="wmn" id="wmn" readonly></td>
                </tr>
                <tr class="moclass">
                    <td>Mo%</td>
                    <td><input name="hmo" id="hmo" value=<?php echo "$rowholder[molybdenum]";?>></td>
                    <td><input name="rmo" id="rmo" readonly></td>
                    <td><input name="fmo" id="fmo"></td>
                    <td><input name="wmo" id="wmo" readonly></td>
                </tr>
                <tr class="niclass">
                    <td>Ni%</td>
                    <td><input name="hni" id="hni" value=<?php echo "$rowholder[nickel]";?>></td>
                    <td><input name="rni" id="rni" readonly></td>
                    <td><input name="fni" id="fni"></td>
                    <td><input name="wni" id="wni" readonly></td>
                </tr>
                <tr class="ticlass">
                    <td>Ti%</td>
                    <td><input name="hti" id="hti" value=<?php echo "$rowholder[titanium]";?>></td>
                    <td><input name="rti" id="rti" readonly></td>
                    <td><input name="fti" id="fti"></td>
                    <td><input name="wti" id="wti" readonly></td>
                </tr>
            </table>
        
        </div>
    </div>
    <button onclick="calculate()">Calculate</button>
    <?php   
    include("footer.php");
    ?>
</body>
</html>