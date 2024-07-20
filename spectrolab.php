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
    <div id="mainheader">
        <p id="FTH"><img src="fth.png" alt="" id="fthicon"> Melt Ease</p>
        <a class="dept" href="melting.php">Melting</a>
        <a class="dept" href="spectrolab.php">Holding</a>
        <a class="dept" href="treatment.php">Treatment</a>
        <a class="dept" href="nodlab.php">Nodularity Lab</a>
        <!-- <a class="dept" href="moulding.php">Moulding</a> -->
        <div class="threebar">
            <div class="bars"></div>
            <div class="bars bar2"></div>
            <div class="bars"></div>
        </div>
    </div>
    <div id="header">
        <h4>Holding Furnace Calculations</h4>
        <label for="hlevel">Holder Level</label>
        <input name="hlevel" id="hlevel" value="">
        <div>
            <label for="tweight">Tapping Weight</label>
            <input name="tweight" value="6" id="tweight">
        </div>
        <div>
            <label for="carburizer">Choose carburizer: </label>
            <select name="carburizer" id="carbsel">
                <option value="hic">Hi-Carbon</option>
                <option value="neo">Neograf / Graphite</option>
            </select>
        </div>
    </div>
    <div id="calccon">
        <div id="patternspec">
            <label for="pattern">Running Pattern</label>
            <?php
                $sql = "SELECT * FROM part_details where carbon=3.90";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                   while($row = $result->fetch_assoc()) {
                    $nk = $row["part_number"];
                        echo "<input value=\"{$nk}\" name=\"pattern\" id=\"pattern\"></br>";
                        $c = $row["carbon"];
                        $si = $row["silicon"];
                        $cu = $row["copper"];
                        $sn = $row["tin"];
                        $mn = $row["manganese"];
                        $mo = $row["molybdenum"];
                        $mg = $row["magnesium"];
                        $ni = $row["nickel"];
                    }
                }
            ?>
            <label for="pcarbon">C%</label>
            <input name="pcarbon" id="pcarbon" class="comp"><br>
            <label for="psilicon">Si%</label>
            <input name="psilicon" id="psilicon" class="comp"><br>
            <label for="pcopper" id="lpcopper">Cu%</label>
            <input name="pcopper" id="pcopper" class="comp"><br>
            <label for="ptin" id="lptin">Sn%</label>
            <input name="ptin" id="ptin" class="comp"><br>
            <label for="pmanganese" id="lpmanganese">Mn%</label>
            <input name="pmanganese" id="pmanganese" class="comp"><br>
            <label for="pmolybdenum" id="lpmolybdenum">Mo%</label>
            <input name="pmolybdenum" id="pmolybdenum" class="comp"><br>
            <label for="pnickel" id="lpnickel">Ni%</label>
            <input name="pnickel" id="pnickel" class="comp"><br>
            <label for="ptitanium" id="lptitanium">Ti%</label>
            <input name="ptitanium" id="ptitanium" class="comp"><br>
            <input type="button" id="getdata" onclick="getdata()" value="Get data">
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
                    <td><input name="hc" id="hc"></td>
                    <td><input name="rc" id="rc" readonly></td>
                    <td><input name="fc" id="fc"></td>
                    <td><input name="wc" id="wc" readonly></td>
                </tr>
                <tr>
                    <td>Si%</td>
                    <td><input name="hsi" id="hsi"></td>
                    <td><input name="rsi" id="rsi" readonly></td>
                    <td><input name="fsi" id="fsi"></td>
                    <td><input name="wsi" id="wsi" readonly></td>
                </tr>
                <tr class="cuclass">
                    <td>Cu%</td>
                    <td><input name="hcu" id="hcu"></td>
                    <td><input name="rcu" id="rcu" readonly></td>
                    <td><input name="fcu" id="fcu"></td>
                    <td><input name="wcu" id="wcu" readonly></td>
                </tr>
                <tr class="snclass">
                    <td>Sn%</td>
                    <td><input name="hsn" id="hsn"></td>
                    <td><input name="rsn" id="rsn" readonly></td>
                    <td><input name="fsn" id="fsn"></td>
                    <td><input name="wsn" id="wsn" readonly></td>
                </tr>
                <tr class="mnclass">
                    <td>Mn%</td>
                    <td><input name="hmn" id="hmn"></td>
                    <td><input name="rmn" id="rmn" readonly></td>
                    <td><input name="fmn" id="fmn"></td>
                    <td><input name="wmn" id="wmn" readonly></td>
                </tr>
                <tr class="moclass">
                    <td>Mo%</td>
                    <td><input name="hmo" id="hmo"></td>
                    <td><input name="rmo" id="rmo" readonly></td>
                    <td><input name="fmo" id="fmo"></td>
                    <td><input name="wmo" id="wmo" readonly></td>
                </tr>
                <tr class="niclass">
                    <td>Ni%</td>
                    <td><input name="hni" id="hni"></td>
                    <td><input name="rni" id="rni" readonly></td>
                    <td><input name="fni" id="fni"></td>
                    <td><input name="wni" id="wni" readonly></td>
                </tr>
                <tr class="ticlass">
                    <td>Ti%</td>
                    <td><input name="hti" id="hti"></td>
                    <td><input name="rti" id="rti" readonly></td>
                    <td><input name="fti" id="fti"></td>
                    <td><input name="wti" id="wti" readonly></td>
                </tr>
            </table>
        </div>
    </div>
    <button onclick="calculate()">Calculate</button>
    <div id="footer">
        <h2><b>Designed by Navin Kumar</b></h2>
        <p>&#169 Copyright 2024. All rights reserved.</p>
    </div>
</body>
</html>