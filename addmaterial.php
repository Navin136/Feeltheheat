<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Add Material</title>
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
                    $searchavbl = "SELECT * from composition where material='$material'";
                    $searchresult = $conn->query($searchavbl);
                    if($searchresult->num_rows>0){
                        echo "<b>$material already exits please edit or add another</b>";
                    }
                    else{
                        $sqlq = "INSERT INTO composition(material,carbon,silicon,copper,tin,manganese,molybdenum,nickel,titanium) VALUES ('$material','$carbon','$silicon','$copper','$tin','$manganese','$molybdenum','$nickel','$titanium')";
                        $res = $conn->query($sqlq);
                        if(!$res){
                            echo "Something you entered in wrong";
                        }else{
                            echo "Great! Pushed Into Database";
                        }
                    }  
                }
            }
        }
    ?>
    <div id="cgdiv"><form action="addmaterial.php" method="post">
        <table>
            <tr><td  id="checomp" colspan=2><b><u>Chemical composition of Material</u></b></td></tr>
            <tr>
                <td><Label for="material">Material</Label></td>
                <td><select name="material" >
                    <option value=""></option>
                    <option value="steel">Steel Scrap</option>
                    <option value="borings">Borings</option>
                    <option value="pigiron">Pig Iron</option>
                    <option value="sgsnreturns">SG Tin Returns</option>
                    <option value="sgcureturns">SG CopperReturns</option>
                    <option value="cgreturns">CG Returns</option>
                    <option value="simoreturns">SiMo Returns</option>
                    <option value="simonireturns">SiMoNi Returns</option>
                </select></td>
            </tr>
            <tr>
                <td><Label for="carbon">Carbon</Label></td>
                <td><input name="carbon"></td>
            </tr>
            <tr>
                <td><Label for="silicon">Silicon</Label></td>
                <td><input name="silicon"></td>
            </tr>
            <tr>
                <td><Label for="copper">Copper</Label></td>
                <td><input name="copper"></td>
            </tr>
            <tr>
                <td><Label for="tin">Tin</Label></td>
                <td><input name="tin"></td>
            </tr>
            <tr>
                <td><Label for="manganese">Manganese</Label></td>
                <td><input name="manganese"></td>
            </tr>
            <tr>
                <td><Label for="molybdenum">Molybdenum</Label></td>
                <td><input name="molybdenum"></td>
            </tr>
            <tr>
                <td><Label for="nickel">Nickel</Label></td>
                <td><input name="nickel"></td>
            </tr>
            <tr>
                <td><Label for="titanium">titanium</Label></td>
                <td><input name="titanium"></td>
            </tr>
        </table>
        <button name="creatematerial" type="submit">Add Material</button>
    </form></div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>