<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Melting</title>
    <link rel='stylesheet' href='css/melting.css'>
    <script defer src='js/melting.js'></script>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['rc'])){
                $rc=$_POST['rc'];
                $rsi=$_POST['rsi'];
                $rcu=$_POST['rcu'];
                $rsn=$_POST['rsn'];
                $rmn=$_POST['rmn'];
                $rmo=$_POST['rmo'];
                $rni=$_POST['rni'];
                $rti=$_POST['rti'];
                $ptn=$_POST['ptn'];
                $pcarbon = $_POST['pcarbon'];
                $psilicon = $_POST['psilicon'];
                $pcopper = $_POST['pcopper'];
                $ptin = $_POST['ptin'];
                $pmanganese = $_POST['pmanganese'];
                $pnickel = $_POST['pnickel'];
                $pmolybdenum = $_POST['pmolybdenum'];
                $ptitanium = $_POST['ptitanium'];
            }
        }
        else{
            header('location:./spectrolab.php');
            exit;
        }
    ?>
    <?php
		$part = 'SELECT current_part,id from live where id=1';
		$respart = $conn->query($part);
		$partrow = $respart->fetch_assoc();
		$nk = "$partrow[current_part]";
		$sql = "SELECT * FROM part_details where part_number=".$nk;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
        ?>
    <div id='fbox'>
        <div id='patternbox'>
            <h3>Pattern Chemistry</h3>
            <label for='pattern'>Pattern</label>
            <input type='text' id='pattern' readonly value=<?php echo "$ptn";?>><br>
                    <table class='spec'>
                        <td>
                            <tr class='elecomp'>C%</tr>
                            <tr><input name='pcarbon' id='pcarbon' readonly value=<?php echo "$pcarbon";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Si%</tr>
                            <tr><input name='psilicon' readonly id='psilicon' value=<?php echo "$psilicon";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Cu%</tr>
                            <tr><input name='pcopper' readonly id='pcopper' value=<?php echo "$pcopper";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Sn%</tr>
                            <tr><input name='ptin' id='ptin' readonly value=<?php echo "$ptin";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Mn%</tr>
                            <tr><input name='pmanganese' id='pmanganese' readonly value=<?php echo "$pmanganese";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Mo%</tr>
                            <tr><input name='pmolybdenum' id='pmolybdenum' readonly value=<?php echo "$pmolybdenum";?>></tr></br>
                        </td>
                        <td>
                            <tr class='elecomp'>Ni%</tr>
                            <tr><input name='pnickel' id='pnickel' readonly value=<?php echo "$pnickel";?>></tr></br>
                        </td>
                    </table>
        </div>
        <div id="reqchem">
            <h3>Required Chemistry</h3>
            <label for="rc">C%</label>
            <input type="text" id="reqcarbon" value='<?php echo "$rc";?>'></br>
            <label for="rsi">Si%</label>
            <input type="text" id="reqsilicon" value='<?php echo "$rsi";?>'></br>
            <label for="rcu">Cu%</label>
            <input type="text" id="reqcopper" value='<?php echo "$rcu";?>'></br>
            <label for="rsn">Sn%</label>
            <input type="text" id="reqtin" value='<?php echo "$rsn";?>'></br>
            <label for="rsn">Mn%</label>
            <input type="text" id="reqmanganese" value='<?php echo "$rmn";?>'></br>
            <label for="rmo">Mo%</label>
            <input type="text" id="reqmolybdenum" value='<?php echo "$rmo";?>'></br>
            <label for="rni">Ni%</label>
            <input type="text" id="reqnickel" value='<?php echo "$rni";?>'></br>
            <label for="rti">Ti%</label>
            <input type="text" id="reqtitanium" value='<?php echo "$rti";?>'></br>
        </div>
        <div class='gradeselector' onchange='chargemix()'>
            <label for='grade'>Grade: </label>
            <select id='grade' name='grade'  readonly>
                <option value='sg-tin'>SG - Tin Route</option>
                <option value='sg-copper'>SG - Copper Route</option>
                <option value='sg-azterlan'>SG - Azterlan</option>
                <option value='sg-lowmoly'>SG - Low Molybdenum</option>
                <option value='sg-highmoly'>SG - High Molybdenum</option>
                <option value='cg-moly'>CG - Molybdenum</option>
                <option value='simoni'>CG - SiMoNi</option>
                </select>
                <table>
                <tr>
                    <th>Raw Material</th>
                    <th>Proportion</th>
                    <th>Weight</th>
                </tr>
                <tr>
                    <td>Steel</td>
                    <td><input id='psteel' readonly></td>
                    <td><input id='wsteel' readonly></td>
                </tr>
                <tr>
                    <td>Foundry Returns</td>
                    <td><input id='preturns' readonly></td>
                    <td><input id='wreturns' readonly></td>
                </tr>
                <tr>
                    <td>Borings</td>
                    <td><input id='pborings' readonly></td>
                    <td><input id='wborings' readonly></td>
                </tr>
                <tr>
                    <td>Pig Iron</td>
                    <td><input id='ppigiron' readonly></td>
                    <td><input id='wpigiron' readonly></td>
                </tr>
        </table>
    </div>  
    <div class='additives' onchange='chargemix()'>
        
        <h2>Enter the mandatory Additives:</h2>
        <label for='maddn'>Neograf</label>
        <input type='text' class='maddn'>
        <label for='maddh'>Hi-carbon</label>
        <input type='text' class='maddh'>
        <div class='result'></div>
        <!-- <button onclick='chargemix()' id='btn'>Give me additives</button> -->
    </div>
</div>

    <?php   
    include("footer.php");
    ?>
</body>
</html>
