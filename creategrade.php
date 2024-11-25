<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Create Grade</title>
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
                $boringsp = $_POST['boringsp'];
                $pigironp = $_POST['pigironp'];
                $returnsp = $_POST['returnsp'];
                if($grade == '' || $steelp == '' || $boringsp == '' || $pigironp == '' || $returnsp == ''){
                    echo "Please fill all the fields";
                }else{
                    $searchavbl = "SELECT * from chargemix where grade='$grade'";
                    $searchresult = $conn->query($searchavbl);
                    if($searchresult->num_rows>0){
                        echo "<b>$grade already exits please edit or add another</b>";
                    }
                    else{
                        $sqlq = "INSERT INTO chargemix(grade,steelp,boringsp,pigironp,returnsp) VALUES ('$grade','$steelp','$boringsp','$pigironp','$returnsp')";
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
        }
    ?>
    <div id="cgdiv"><form action="creategrade.php" method="post">
        <table>
            <tr>
                <th class="thead"><u>Parameter</u></th>
                <th class="thead"><u>Value</u></th>
            </tr>
            <tr>
                <td><Label for="grade">Grade</Label></td>
                <td><input type="text" name="grade"></td>
            </tr>
            <tr>
                <td><Label for="steelp">Steel Scrap %</Label></td>
                <td><input name="steelp"></td>
            </tr>
            <tr>
                <td><Label for="boringsp">Borings %</Label></td>
                <td><input name="boringsp"></td>
            </tr>
            <tr>
                <td><Label for="pigironp">Pig Iron %</Label></td>
                <td><input name="pigironp"></td>
            </tr>
            <tr>
                <td><Label for="returnsp">Foundry returns %</Label></td>
                <td><input name="returnsp"></td>
            </tr>
        </table>
        <button name="creategrade" type="submit">Create Grade</button>
    </form></div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>