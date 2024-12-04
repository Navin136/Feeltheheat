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
        $steelmaterial = $conn->query("SELECT * from composition where material='steel'");
        if($steelmaterial->num_rows>0){
            while($row=$steelmaterial->fetch_assoc()){
                $steelc = $row['carbon'];
                $steelsi = $row['silicon'];
                $steelcu = $row['copper'];
                $steelsn = $row['tin'];
                $steelmn = $row['manganese'];
                $steelmo = $row['molybdenum'];
                $steelni = $row['nickel'];
                $steelti = $row['titanium'];
                echo "<input type='hidden' id='steelc'  value='$steelc'>";
                echo "<input type='hidden' id='steelsi' value='$steelsi'>";
                echo "<input type='hidden' id='steelcu' value='$steelcu'>";
                echo "<input type='hidden' id='steelsn' value='$steelsn'>";
                echo "<input type='hidden' id='steelmn' value='$steelmn'>";
                echo "<input type='hidden' id='steelmo' value='$steelmo'>";
                echo "<input type='hidden' id='steelni' value='$steelni'>";
                echo "<input type='hidden' id='steelti' value='$steelti'>";
            }
        }else{
            echo "<p>Material composition for Steel scrap is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        $tinsteelmaterial = $conn->query("SELECT * from composition where material='tinsteel'");
        if($tinsteelmaterial->num_rows>0){
            while($row=$tinsteelmaterial->fetch_assoc()){
                $tinsteelc = $row['carbon'];
                $tinsteelsi = $row['silicon'];
                $tinsteelcu = $row['copper'];
                $tinsteelsn = $row['tin'];
                $tinsteelmn = $row['manganese'];
                $tinsteelmo = $row['molybdenum'];
                $tinsteelni = $row['nickel'];
                $tinsteelti = $row['titanium'];
                echo "<input type='hidden' id='tinsteelc'  value='$tinsteelc'>";
                echo "<input type='hidden' id='tinsteelsi' value='$tinsteelsi'>";
                echo "<input type='hidden' id='tinsteelcu' value='$tinsteelcu'>";
                echo "<input type='hidden' id='tinsteelsn' value='$tinsteelsn'>";
                echo "<input type='hidden' id='tinsteelmn' value='$tinsteelmn'>";
                echo "<input type='hidden' id='tinsteelmo' value='$tinsteelmo'>";
                echo "<input type='hidden' id='tinsteelni' value='$tinsteelni'>";
                echo "<input type='hidden' id='tinsteelti' value='$tinsteelti'>";
            }
        }else{
            echo "<p>Material composition for Tin Steel scrap is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        $greysteelmaterial = $conn->query("SELECT * from composition where material='greysteel'");
        if($greysteelmaterial->num_rows>0){
            while($row=$greysteelmaterial->fetch_assoc()){
                $greysteelc = $row['carbon'];
                $greysteelsi = $row['silicon'];
                $greysteelcu = $row['copper'];
                $greysteelsn = $row['tin'];
                $greysteelmn = $row['manganese'];
                $greysteelmo = $row['molybdenum'];
                $greysteelni = $row['nickel'];
                $greysteelti = $row['titanium'];
                echo "<input type='hidden' id='greysteelc'  value='$greysteelc'>";
                echo "<input type='hidden' id='greysteelsi' value='$greysteelsi'>";
                echo "<input type='hidden' id='greysteelcu' value='$greysteelcu'>";
                echo "<input type='hidden' id='greysteelsn' value='$greysteelsn'>";
                echo "<input type='hidden' id='greysteelmn' value='$greysteelmn'>";
                echo "<input type='hidden' id='greysteelmo' value='$greysteelmo'>";
                echo "<input type='hidden' id='greysteelni' value='$greysteelni'>";
                echo "<input type='hidden' id='greysteelti' value='$greysteelti'>";
            }
        }else{
            echo "<p>Material composition for Grey Steel scarp is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        $boringsmaterial = $conn->query("SELECT * from composition where material='borings'");
        if($boringsmaterial->num_rows>0){
            while($row=$boringsmaterial->fetch_assoc()){
                $boringsc = $row['carbon'];
                $boringssi = $row['silicon'];
                $boringscu = $row['copper'];
                $boringssn = $row['tin'];
                $boringsmn = $row['manganese'];
                $boringsmo = $row['molybdenum'];
                $boringsni = $row['nickel'];
                $boringsti = $row['titanium'];
                echo "<input type='hidden' id='boringsc'  value='$boringsc'>";
                echo "<input type='hidden' id='boringssi' value='$boringssi'>";
                echo "<input type='hidden' id='boringscu' value='$boringscu'>";
                echo "<input type='hidden' id='boringssn' value='$boringssn'>";
                echo "<input type='hidden' id='boringsmn' value='$boringsmn'>";
                echo "<input type='hidden' id='boringsmo' value='$boringsmo'>";
                echo "<input type='hidden' id='boringsni' value='$boringsni'>";
                echo "<input type='hidden' id='boringsti' value='$boringsti'>";
            }
        }else{
            echo "<p>Material composition for Borings is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        $pigironmaterial = $conn->query("SELECT * from composition where material='pigiron'");
        if($pigironmaterial->num_rows>0){
            while($row=$pigironmaterial->fetch_assoc()){
                $pigironc = $row['carbon'];
                $pigironsi = $row['silicon'];
                $pigironcu = $row['copper'];
                $pigironsn = $row['tin'];
                $pigironmn = $row['manganese'];
                $pigironmo = $row['molybdenum'];
                $pigironni = $row['nickel'];
                $pigironti = $row['titanium'];
                echo "<input type='hidden' id='pigironc'  value='$pigironc'>";
                echo "<input type='hidden' id='pigironsi' value='$pigironsi'>";
                echo "<input type='hidden' id='pigironcu' value='$pigironcu'>";
                echo "<input type='hidden' id='pigironsn' value='$pigironsn'>";
                echo "<input type='hidden' id='pigironmn' value='$pigironmn'>";
                echo "<input type='hidden' id='pigironmo' value='$pigironmo'>";
                echo "<input type='hidden' id='pigironni' value='$pigironni'>";
                echo "<input type='hidden' id='pigironti' value='$pigironti'>";
            }
        }else{
            echo "<p>Material composition for Pig iron is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        if(stripos("$grade","copper")){
            $cureturnsmaterial = $conn->query("SELECT * from composition where material='cureturns'");
            if($cureturnsmaterial->num_rows>0){
                while($row=$cureturnsmaterial->fetch_assoc()){
                    $returnsc = $row['carbon'];
                    $returnssi = $row['silicon'];
                    $returnscu = $row['copper'];
                    $returnssn = $row['tin'];
                    $returnsmn = $row['manganese'];
                    $returnsmo = $row['molybdenum'];
                    $returnsni = $row['nickel'];
                    $returnsti = $row['titanium'];
                }
            }
        }else{
            echo "<p>Material composition for SG- Copper returns is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        if(stripos("$grade","tin")){
            $snreturnsmaterial = $conn->query("SELECT * from composition where material='snreturns'");
            if($snreturnsmaterial->num_rows>0){
                while($row=$snreturnsmaterial->fetch_assoc()){
                    $returnsc = $row['carbon'];
                    $returnssi = $row['silicon'];
                    $returnscu = $row['copper'];
                    $returnssn = $row['tin'];
                    $returnsmn = $row['manganese'];
                    $returnsmo = $row['molybdenum'];
                    $returnsni = $row['nickel'];
                    $returnsti = $row['titanium'];
                }
            }
        }else{
            echo "<p>Material composition for SG-Tin returns is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        if(stripos("$grade","sg-simo")){
            $simoreturnsmaterial = $conn->query("SELECT * from composition where material='simoreturns'");
            if($simoreturnsmaterial->num_rows>0){
                while($row=$simoreturnsmaterial->fetch_assoc()){
                    $returnsc = $row['carbon'];
                    $returnssi = $row['silicon'];
                    $returnscu = $row['copper'];
                    $returnssn = $row['tin'];
                    $returnsmn = $row['manganese'];
                    $returnsmo = $row['molybdenum'];
                    $returnsni = $row['nickel'];
                    $returnsti = $row['titanium'];
                }
            }
        }else{
            echo "<p>Material composition for SiMo returns is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        if(stripos("$grade","simoni")){
            $simonireturnsmaterial = $conn->query("SELECT * from composition where material='simonireturns'");
            if($simonireturnsmaterial->num_rows>0){
                while($row=$simonireturnsmaterial->fetch_assoc()){
                    $returnsc = $row['carbon'];
                    $returnssi = $row['silicon'];
                    $returnscu = $row['copper'];
                    $returnssn = $row['tin'];
                    $returnsmn = $row['manganese'];
                    $returnsmo = $row['molybdenum'];
                    $returnsni = $row['nickel'];
                    $returnsti = $row['titanium'];
                }
            }
        }else{
            echo "<p>Material composition for SiMoNi returns is not given. please goto <a href='addmaterial.php' id='complink'>Chargemix Page</a> to update composition</p>";
        }
        echo "<input type='hidden' id='returnsc'  value='$returnsc'>";
        echo "<input type='hidden' id='returnssi' value='$returnssi'>";
        echo "<input type='hidden' id='returnscu' value='$returnscu'>";
        echo "<input type='hidden' id='returnssn' value='$returnssn'>";
        echo "<input type='hidden' id='returnsmn' value='$returnsmn'>";
        echo "<input type='hidden' id='returnsmo' value='$returnsmo'>";
        echo "<input type='hidden' id='returnsni' value='$returnsni'>";
        echo "<input type='hidden' id='returnsti' value='$returnsti'>";
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
                    <td><input id='wsteel' value="<?php echo $chargemix['steelp']*60?>" readonly></td>
                </tr>
                <tr>
                    <td>Tin Steel</td>
                    <td><input id='ptinsteel' value="<?php echo "$chargemix[tinsteelp]";?>" readonly></td>
                    <td><input id='wtinsteel' value="<?php echo $chargemix['tinsteelp']*60?>" readonly></td>
                </tr>
                <tr>
                    <td>Grey Steel</td>
                    <td><input id='pgreysteel' value="<?php echo "$chargemix[greysteelp]";?>" readonly></td>
                    <td><input id='wgreysteel' value="<?php echo $chargemix['greysteelp']*60?>" readonly></td>
                </tr>
                <tr>
                    <td>Borings</td>
                    <td><input id='pborings' value="<?php echo "$chargemix[boringsp]";?>" readonly></td>
                    <td><input id='wborings' value="<?php echo $chargemix['boringsp']*60?>" readonly></td>
                </tr>
                <tr>
                    <td>Pig Iron</td>
                    <td><input id='ppigiron' value="<?php echo "$chargemix[pigironp]";?>" readonly></td>
                    <td><input id='wpigiron' value="<?php echo $chargemix['pigironp']*60?>" readonly></td>
                </tr>
                <tr>
                    <td>Foundry Returns</td>
                    <td><input id='preturns' value="<?php echo "$chargemix[returnsp]";?>" readonly></td>
                    <td><input id='wreturns' value="<?php echo $chargemix['returnsp']*60?>" readonly></td>
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
