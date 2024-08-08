
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melt Ease</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $un=$_POST["username"];
                $pw=$_POST["password"];
                if($un=="melting" && $pw == "9865"){
    ?>
    <div class="heading"><h1><a href="./index.php">Melt Ease</a>    <span class="author">-Cast By Navin Kumar</span></h1></div>
    
    <div id="box">
    <div class="alldep">
        <div class="dept">
            <a href="melting.php">Melting</a>
        </div>
        <div class="dept">
            <a href="spectrolab.php">Holding</a>
        </div>
        <div class="dept">
            <a href="treatment.php">Treatment Area</a>
        </div>
        <div class="dept">
            <a href="nodlab.php">Nodularity Lab & Pouring</a>
        </div>
    </div>
    <div id="box2">
    <div class="dept">
            <a href="master.php">Part Master</a>
        </div>
        <div class="dept">
            <a href="holder_chemistry.php">Update Holder chemistry</a>
        </div>
        <div class="dept">
            <a href="moulding.php">Moulding</a>
        </div>
    </div>
    </div>
    
    <div id="credits">
        <b>Credits: </b></br>
        <ul><li>R. Poovaraghavan Sir, My wellwisher and Guru who carries the most credits. If you guys POST benefits by means of this website, then show your gratitude to him.</li>
        <li>R. Srinivasan Sir, My mentor for giving spark at right time</li></ul>
    </div>
    <?php
                }
                else{
                    header("location: ./authenticate.php?info='incorrect'");
                }
            }
            else{
                header("location: ./authenticate.php?info='enter'");
                exit;
            }
        }
        else{
            header("location: ./authenticate.php");
            exit;
        }
    ?>
    
</body>
</html>
