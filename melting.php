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
                $pmagnesium = $_POST['pmagnesium'];
            }
        }
        else{
            header('location:./spectrolab.php');
            exit;
        }
    ?>
    <?php
		$part = "SELECT grade from part_details where part_number='$ptn'";
		$respart = $conn->query($part);
		$partrow = $respart->fetch_assoc();
		$grade = "$partrow[grade]";
        $cmq = "SELECT * from chargemix where grade='$grade'";
        $cmqf = $conn->query($cmq);
        $chargemix = $cmqf->fetch_assoc();
        ?>
    <div id='fbox'>
        <div id='patternbox'>
            <label for='pattern'>Pattern</label>
            <input type='text' id='pattern' readonly value=<?php echo "$ptn";?>><br>
            <h3>Pattern Chemistry</h3>
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
                        <td>
                            <tr class='elecomp'>Mg%</tr>
                            <tr><input name='pmagnesium' id='pmagnesium' readonly value=<?php echo "$pmagnesium";?>></tr></br>
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
            <input type="text" id="grade" value='<?php echo "$grade";?>'></br>
                <table>
                <tr>
                    <th>Raw Material</th>
                    <th>Proportion</th>
                    <th>Weight</th>
                </tr>
                <tr>
                    <td>Steel</td>
                    <td><input id='psteel' value="<?php echo "$chargemix[steelp]";?>" readonly></td>
                    <td><input id='wsteel' readonly></td>
                </tr>
                <tr>
                    <td>Tin Steel</td>
                    <td><input id='ptinsteel' value="<?php echo "$chargemix[tinsteelp]";?>" readonly></td>
                    <td><input id='wtinsteel' readonly></td>
                </tr>
                <tr>
                    <td>Grey Steel</td>
                    <td><input id='pgreysteel' value="<?php echo "$chargemix[greysteelp]";?>" readonly></td>
                    <td><input id='wgreysteel' readonly></td>
                </tr>
                <tr>
                    <td>Borings</td>
                    <td><input id='pborings' value="<?php echo "$chargemix[boringsp]";?>" readonly></td>
                    <td><input id='wborings' readonly></td>
                </tr>
                <tr>
                    <td>Pig Iron</td>
                    <td><input id='ppigiron' value="<?php echo "$chargemix[pigironp]";?>" readonly></td>
                    <td><input id='wpigiron' readonly></td>
                </tr>
                <tr>
                    <td>Foundry Returns</td>
                    <td><input id='preturns' value="<?php echo "$chargemix[returnsp]";?>" readonly></td>
                    <td><input id='wreturns' readonly></td>
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
    </div>
</div>
    <div class="steelsuggestion"></div>
    <div class="steelsuggestion1"></div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>
