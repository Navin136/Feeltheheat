<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit master Data</title>
    <link rel='stylesheet' href='css/edit.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include('header.php');
    ?>
    <?php
        $c = '';
        $si = '';
        $cu = '';
        $sn = '';
        $mn = '';
        $mo = '';
        $mg = '';
        $ni = '';
        $mm = '';
        $la = '';
        $ta = '';
        $temp = '';
        $mtwt = '';
        $fr = '';
        $pt = '';
        $in = '';
        $alloy =''; 
        $treewt ='';
        $grade = '';
        $alloyp ='';
        $coveringp ='';
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(!isset($_GET['part'])){
                header("location: ./master.php");
                exit;
            }
            $part=$_GET['part'];
            $sql="SELECT * FROM part_details where part_number=$part";
            $result=$conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $part_number = $row['part_number'];
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
                $ino = $row["inoculant"];
                $alloy = $row["alloy"];
                $treewt = $row["treewt"];
                $grade = $row["grade"];
                $alloyp = $_POST["alloyp"];
                $coveringp = $_POST["coveringp"];
            }
            else{
                echo "<b>The selected part number is not available in database. Please create part chemistry <a href='./create.php'>Here</a> <b>";
            }

        }
        if(isset($_POST['submit'])){
            $part_number = $_POST['part_number'];
            $c = $_POST["carbon"];
            $si = $_POST["silicon"];
            $cu = $_POST["copper"];
            $sn = $_POST["tin"];
            $mn = $_POST["manganese"];
            $mo = $_POST["molybdenum"];
            $mg = $_POST["magnesium"];
            $ni = $_POST["nickel"];
            $mm = $_POST["mischmetal"];
            $la = $_POST["laddition"];
            $ta = $_POST["taddition"];
            $temp = $_POST["temperature"];
            $mtwt = $_POST["metalweight"];
            $fr = $_POST["flow_rate"];
            $pt = $_POST["pouring_time"];
            $ino = $_POST["inoculant"];
            $alloy = $_POST["alloy"];
            $treewt = $_POST["treewt"];
            $grade = $_POST["grade"];
            $alloyp = $_POST["alloyp"];
            $coveringp = $_POST["coveringp"];
            $push = "UPDATE part_details SET carbon=$c, silicon=$si, copper=$cu, tin=$sn, manganese=$mn, molybdenum=$mo, nickel=$ni, magnesium=$mg, mischmetal='$mm', laddition='$la', inoculant='$ino', flow_rate='$fr', metalweight='$mtwt', temperature='$temp', taddition='$ta', pouring_time='$pt', alloy='$alloy', treewt='$treewt', grade='$grade', alloyp='$alloyp', coveringp='$coveringp' WHERE part_number=$part_number";
            $pushed=$conn->query($push);
            if(!$pushed){
                echo "Error". $conn->error();
            }
            else{
                header("location: ./master.php");
            }
        }
    
    ?>
    <div>
        <input type='hidden' name='' value='<?php echo $part;?>'>
        <form method='post'>
            <div class='sec1'>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for='part_number'>Part Number</label></td>
                        <td><input value='<?php echo $part_number;?>' name='part_number'></td>
                    </tr>
                    <tr>
                        <td><label for='carbon'>Carbon</label></td>
                        <td><input value='<?php echo $c;?>' name='carbon'></td>
                    </tr>
                    <tr>
                        <td><label for='silicon'>Silicon</label></td>
                        <td><input name='silicon' value='<?php echo $si;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='copper'>Copper</label></td>
                        <td><input name='copper' value='<?php echo $cu;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='tin'>Tin</label></td>
                        <td><input name='tin' value='<?php echo $sn;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='manganese'>Manganese</label></td>
                        <td><input name='manganese' value='<?php echo $mn;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='molybdenum'>Molybdenum</label></td>
                        <td><input name='molybdenum' value='<?php echo $mo;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='nickel'>Nickel</label></td>
                        <td><input name='nickel' value='<?php echo $ni;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='magnesium'>Magnesium</label></td>
                        <td><input name='magnesium' value='<?php echo $mg;?>'></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class='sec2'>
            <table>
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for='mischmetal'>Mischmetal</label></td>
                        <td><select id='mischmetal' name='mischmetal' >
                                <option value='<?php echo $mm;?>'><?php echo $mm;?></option>
                                <option value='None'>None</option>
                                <option value='200 Grams'>200 Grams</option>
                                <option value='300 Grams'>300 Grams</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='laddition'>Ladle Addition</label></td>
                        <td><select id='laddition' name='laddition'>
                                <option value='<?php echo $la;?>'><?php echo $la;?></option>
                                <option value='None'>None</option>
                                <option value='0.05% Fesi'>0.05% Fesi</option>
                                <option value='0.05% Bacal'>0.05% Bacal</option>
                                <option value='0.05% Ultraseed'>0.05% Ultraseed</option>
                                <option value='0.05% Superseed'>0.05% Superseed</option>
                                <option value='0.05% Zircseed'>0.05% Zircseed</option>
                                <option value='0.07% Fesi'>0.07% Fesi</option>
                                <option value='0.07% Bacal'>0.07% Bacal</option>
                                <option value='0.07% Superseed'>0.07% Superseed</option>
                                <option value='0.07% Zircseed'>0.07% Zircseed</option>
                                <option value='0.07% Ultraseed'>0.07% Ultraseed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='alloy'>Alloy</label></td>
                        <td><select id='alloy' name='alloy'>
                                <option value='<?php echo $alloy;?>'><?php echo $alloy;?></option>
                                <option value='Lamag'>Lamag</option>
                                <option value='Magkastla'>Magkastla</option>
                                <option value='1.2% RE Alloy'>1.2% RE Alloy</option>
                                <option value='0.4% RE Alloy'>0.4% RE Alloy</option>
                                <option value='Lamet'>Lamet</option>
                                <option value='0% RE Alloy'>0% RE Alloy</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='alloyp'>Alloy %</label></td>
                        <td><input name="alloyp" value='<?php echo $alloyp;?>'>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='coveringp'>Covering steel %</label></td>
                        <td><input name="coveringp" value='<?php echo $coveringp;?>'>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='metalweight'>Metal Weight</label></td>
                        <td><select id='metalweight' name='metalweight'>
                                <option value='<?php echo $mtwt;?>'><?php echo $mtwt;?></option>
                                <option value='1200'>1200 Kgs</option>
                                <option value='1300'>1300 Kgs</option>
                                <option value='1400'>1400 Kgs</option>
                                <option value='1500'>1500 Kgs</option>
                                <option value='1600'>1600 Kgs</option>
                                <option value='1700'>1700 Kgs</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='temperature'>Temperature</label></td>
                        <td><input name='temperature' value='<?php echo $temp;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='inoculant'>Inoculant</label></td>
                        <td><select id='inoculant' name='inoculant'>
                                <option value='<?php echo $ino;?>'><?php echo $ino;?></option>
                                <option value='Zircseed'>Zircseed</option>
                                <option value='Reseed'>Reseed</option>
                                <option value='Barinoc'>Barinoc</option>
                                <option value='Fesi'>Fesi</option>
                                <option value='Superseed'>Superseed</option>
                                <option value='Stron'>Stron</option>
                                <option value='Bacal'>Bacal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='flow_rate'>Flow Rate</label></td>
                        <td><input id='flow_rate' name='flow_rate' value='<?php echo $fr;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='taddition'>Tundish Addition</label></td>
                        <td><select id='taddition' name='taddition'>
                                <option value='<?php echo $ta;?>'><?php echo $ta;?></option>
                                <option value='None'>None</option>
                                <option value='0.05% Fesi'>0.05% Fesi</option>
                                <option value='0.05% Bacal'>0.05% Bacal</option>
                                <option value='0.05% Ultraseed'>0.05% Ultraseed</option>
                                <option value='0.05% Superseed'>0.05% Superseed</option>
                                <option value='0.05% Zircseed'>0.05% Zircseed</option>
                                <option value='0.07% Fesi'>0.07% Fesi</option>
                                <option value='0.07% Bacal'>0.07% Bacal</option>
                                <option value='0.07% Superseed'>0.07% Superseed</option>
                                <option value='0.07% Zircseed'>0.07% Zircseed</option>
                                <option value='0.07% Ultraseed'>0.07% Ultraseed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='pouring_time'>Pouring Time</label></td>
                        <td><input name='pouring_time' value='<?php echo $pt;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='treewt'>Tree weight</label></td>
                        <td><input name='treewt' value='<?php echo $treewt;?>'></td>
                    </tr>
                    <tr>
                        <td><label for='grade'>Grade</label></td>
                        <td><select id='grade' name='grade'>
                            <option value='<?php echo $grade;?>'><?php echo $grade;?></option>
                            <option value='FCD 500K SG Tin'>FCD 500K-SG Tin</option>
                            <option value='FCD 500K-SG Copper'>FCD 500K-SG Copper</option>
                            <option value='FCD 550K-SG Tin'>FCD 550K-SG Tin</option>
                            <option value='FCD 550K-SG Copper'>FCD 550K-SG Copper</option>
                            <option value='SG 400/15-Tin'>SG 400/15-Tin</option>
                            <option value='SG 450/10-Tin'>SG 450/10-Tin</option>
                            <option value='SG 500/7-Tin'>SG 500/7-Tin</option>
                            <option value='SG 550/6-Tin'>SG 550/6-Tin</option>
                            <option value='SG 400/15-Copper'>SG 400/15-Copper</option>
                            <option value='SG 450/10-Copper'>SG 450/10-Copper</option>
                            <option value='SG 500/7-Copper'>SG 500/7-Copper</option>
                            <option value='SG 550/6-Copper'>SG 550/6-Copper</option>
                            <option value='SG 400/15-Azterlan Tin'>SG 400/15-Azterlan Tin</option>
                            <option value='SG 450/10-Azterlan Tin'>SG 450/10-Azterlan Tin</option>
                            <option value='SG 500/7-Azterlan Tin'>SG 500/7-Azterlan Tin</option>
                            <option value='SG 550/6-Azterlan Tin'>SG 550/6-Azterlan Tin</option>
                            <option value='SG 400/15-Azterlan Copper'>SG 400/15-Azterlan Copper</option>
                            <option value='SG 450/10-Azterlan Copper'>SG 450/10-Azterlan Copper</option>
                            <option value='SG 500/7-Azterlan Copper'>SG 500/7-Azterlan Copper</option>
                            <option value='SG 550/6-Azterlan Copper'>SG 550/6-Azterlan Copper</option>
                            <option value='EN GJV 300 CG Tin'>EN GJV 300 CG Tin</option>
                            <option value='SG-SiMo'>SG-SiMo</option>
                            <option value='CG-SiMo'>CG-SiMo</option>
                            <option value='CG-SiMoNi'>CG-SiMoNi</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button name='submit' type='submit'>Update</button></div>
        </form>
    </div>
    <?php   
    include('footer.php');
    ?>
</body>
</html>