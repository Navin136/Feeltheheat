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
                $boringsp = $_POST['boringsp'];
                $pigironp = $_POST['pigironp'];
                $returnsp = $_POST['returnsp'];
                if($grade == '' || $steelp == '' || $boringsp == '' || $pigironp == '' || $returnsp == ''){
                    echo "Please fill all the fields";
                }else{
                        $sqlq = "UPDATE chargemix SET steelp='$steelp',boringsp='$boringsp',pigironp='$pigironp',returnsp='$returnsp' WHERE grade='$grade'";
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
                <td><Label for="grade">Grade</Label></td>
                <td><input type="text" name="grade" value="<?php echo $row['grade'];?>"></td>
            </tr>
            <tr>
                <td><Label for="steelp">Steel Scrap %</Label></td>
                <td><input name="steelp" value="<?php echo $row['steelp'];?>"></td>
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