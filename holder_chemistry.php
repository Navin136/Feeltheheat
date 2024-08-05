<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Holder chemistry</title>
    <link rel='stylesheet' href='css/holder_chemistry.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include('header.php');
		$heat = '';
            $c = '';
            $si = '';
            $cu = '';
            $sn = '';
            $mn = '';
            $mo = '';
            $ni = '';
            $ti = '';
    ?>
    <?php
        if(isset($_POST['submit'])){
            $heat = $_POST['heat'];
            $c = $_POST["carbon"];
            $si = $_POST["silicon"];
            $cu = $_POST["copper"];
            $sn = $_POST["tin"];
            $mn = $_POST["manganese"];
            $mo = $_POST["molybdenum"];
            $ni = $_POST["nickel"];
            $ti = $_POST["titanium"];
            $push = "INSERT INTO holder(heat,carbon,silicon,copper,tin,manganese,molybdenum,nickel,titanium) VALUES ('$heat','$c','$si','$cu','$sn','$mn','$mo','$ni','$ti')";
            $pushed=$conn->query($push);
            $update = "UPDATE holder set heat='$heat', carbon='$c', silicon='$si', copper='$cu', tin='$sn', manganese='$mn', molybdenum='$mo', nickel='$ni', titanium='$ti' where id=1";
            $updated=$conn->query($update);
            if(!$pushed | !$updated){
                echo "Error". $conn->error();
            }
        }
?> 
    <div>
        <?php
        if(isset($_POST['current'])){
            $sql="SELECT * FROM holder where id=1";
            $res=$conn->query($sql);
            $row=$res->fetch_assoc();
            $heat = $row['heat'];
            $c = $row["carbon"];
            $si = $row["silicon"];
            $cu = $row["copper"];
            $sn = $row["tin"];
            $mn = $row["manganese"];
            $mo = $row["molybdenum"];
            $ni = $row["nickel"];
            $ti = $row["titanium"];
        }
        ?>
        <form action='./holder_chemistry.php' method='post'>
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
                        <td><label for='heat'>Datecode-Heat: </label></td>
                        <td><input value='<?php echo $heat;?>' name='heat'></td>
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
                        <td><label for='titanium'>Titanium</label></td>
                        <td><input name='titanium' value='<?php echo $ti;?>'></td>
                    </tr>
                </tbody>
            </table>
            <button name='submit' type='submit'>Create</button>
            <button name='current'>Get Current Chemistry</button>
            </div>
            
        </form>
    </div>
    <?php   
    include('footer.php');
    ?>
</body>
</html>