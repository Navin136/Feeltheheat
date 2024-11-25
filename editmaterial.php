<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Material</title>
    <link rel='stylesheet' href='css/creategrade.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['creatematerial'])){
                $material = $_POST['material'];
                $carbon =$_POST['carbon'];
                $silicon =$_POST['silicon'];
                $copper =$_POST['copper'];
                $tin =$_POST['tin'];
                $manganese =$_POST['manganese'];
                $molybdenum =$_POST['molybdenum'];
                $nickel =$_POST['nickel'];
                $titanium =$_POST['titanium'];
                if($material == '' || $carbon == '' || $silicon == '' || $copper == '' || $tin == '' || $manganese == '' || $molybdenum == '' || $nickel == '' || $titanium == ''){
                    echo "Please fill all the fields";
                }else{
                        $sqlq = "UPDATE composition SET carbon='$carbon',silicon='$silicon',copper='$copper',tin='$tin',manganese='$manganese',molybdenum='$molybdenum',nickel='$nickel',titanium='$titanium'";
                        $res = $conn->query($sqlq);
                        if(!$res){
                            echo "Something you entered in wrong";
                        }else{
                            echo "Great! Updated Into Database";
                        }
                    }  
                }
            }
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $material=$_GET['material'];
            $sql="SELECT * FROM composition WHERE material='$material'";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
    ?>
    <div id="cgdiv"><form action="editmaterial.php" method="post">
        <table>
            <tr><td  id="checomp" colspan=2><b><u>Chemical composition of Material</u></b></td></tr>
            <tr>
                <td><Label for="material">Material</Label></td>
                <td><select name="material" >
                    <option value="<?php echo $row['material'];?>"><?php echo $row['material'];?></option>
                </select></td>
            </tr>
            <tr>
                <td><Label for="carbon">Carbon</Label></td>
                <td><input name="carbon" value="<?php echo $row['carbon'];?>"></td>
            </tr>
            <tr>
                <td><Label for="silicon">Silicon</Label></td>
                <td><input name="silicon" value="<?php echo $row['silicon'];?>"></td>
            </tr>
            <tr>
                <td><Label for="copper">Copper</Label></td>
                <td><input name="copper" value="<?php echo $row['copper'];?>"></td>
            </tr>
            <tr>
                <td><Label for="tin">Tin</Label></td>
                <td><input name="tin" value="<?php echo $row['tin'];?>"></td>
            </tr>
            <tr>
                <td><Label for="manganese">Manganese</Label></td>
                <td><input name="manganese" value="<?php echo $row['manganese'];?>"></td>
            </tr>
            <tr>
                <td><Label for="molybdenum">Molybdenum</Label></td>
                <td><input name="molybdenum" value="<?php echo $row['molybdenum'];?>"></td>
            </tr>
            <tr>
                <td><Label for="nickel">Nickel</Label></td>
                <td><input name="nickel" value="<?php echo $row['nickel'];?>"></td>
            </tr>
            <tr>
                <td><Label for="titanium">titanium</Label></td>
                <td><input name="titanium" value="<?php echo $row['titanium'];?>"></td>
            </tr>
        </table>
        <button name="creatematerial" type="submit">Edit Material</button>
    </form></div>
    <?php
                }
            }
        }
    ?>
    <?php   
    include("footer.php");
    ?>
</body>
</html>