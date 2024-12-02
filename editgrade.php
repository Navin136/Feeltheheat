<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Chargemix</title>
    <link rel='stylesheet' href='css/creategrade.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['creategrade'])){
                $grade = $_POST['grade'];
                $steelp = $_POST['steelp'];
                $tinsteelp = $_POST['tinsteelp'];
                $greysteelp = $_POST['greysteelp'];
                $boringsp = $_POST['boringsp'];
                $pigironp = $_POST['pigironp'];
                $returnsp = $_POST['returnsp'];
                if($grade == '' || $steelp == '' || $boringsp == '' || $pigironp == '' || $returnsp == ''){
                    echo "Please fill all the fields";
                }elseif(($steelp+$tinsteelp+$greysteelp+$boringsp+$pigironp+$returnsp)>100 ||($steelp+$tinsteelp+$greysteelp+$boringsp+$pigironp+$returnsp)<100){
                    echo "Chargemix is not 100%. please check and enter correctly";
                }else{
                        $sqlq = "UPDATE chargemix SET steelp='$steelp',tinsteelp='$tinsteelp',greysteelp='$greysteelp',boringsp='$boringsp',pigironp='$pigironp',returnsp='$returnsp' WHERE grade='$grade'";
                        $res = $conn->query($sqlq);
                        if(!$res){
                            echo "Something you entered in wrong";
                        }
                        else{
                            echo "Great Pushed into database!";
                        }
                    }
                }
            }
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(!isset($_GET['grade'])){
                header("location: ./chargemix.php");
                exit;
            }
            else{
            $grade = $_GET['grade'];
            $sql="SELECT * FROM chargemix WHERE grade='$grade'";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
    ?>
    <div id="cgdiv"><form action="editgrade.php" method="post">
        <table>
            <tr>
                <th class="thead"><u>Parameter</u></th>
                <th class="thead"><u>Value</u></th>
            </tr>
            <tr>
                    <td><label for='grade'>Grade</label></td>
                    <td><select id='grade' name='grade'>
                            <option value='<?php echo $grade?>'><?php echo $grade?></option>
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
            <tr>
                <td><Label for="steelp">Steel Scrap %</Label></td>
                <td><input name="steelp" value="<?php echo $row['steelp'];?>"></td>
            </tr>
            <tr>
                <td><Label for="tinsteelp">Tin Steel Scrap %</Label></td>
                <td><input name="tinsteelp" value="<?php echo $row['tinsteelp'];?>"></td>
            </tr>
            <tr>
                <td><Label for="greysteelp">Grey Steel Scrap %</Label></td>
                <td><input name="greysteelp" value="<?php echo $row['greysteelp'];?>"></td>
            </tr>
            <tr>
                <td><Label for="boringsp">Borings %</Label></td>
                <td><input name="boringsp" value="<?php echo $row['boringsp'];?>"></td>
            </tr>
            <tr>
                <td><Label for="pigironp">Pig Iron %</Label></td>
                <td><input name="pigironp" value="<?php echo $row['pigironp'];?>"></td>
            </tr>
            <tr>
                <td><Label for="returnsp">Foundry returns %</Label></td>
                <td><input name="returnsp" value="<?php echo $row['returnsp'];?>"></td>
            </tr>

        </table>
        <button name="creategrade" type="submit">Edit Grade</button>
    </form></div>            <?php } } } }?>
    <?php   
    include("footer.php");
    ?>
</body>
</html>