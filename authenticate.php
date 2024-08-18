<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login to Home</title>
    <link rel="stylesheet" href="css/authenticate.css">
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include('header.php');
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET["info"])){
                $info = $_GET["info"];
                if($info = 'incorrect'){
                    echo "Username or Password is incorrect";
                }
            }
        }
    ?>
    <div>
        <form action="./index.php" method="POST">
            <label for="username">Username:</label>
            <input id="auser" type="text" name="username"></br>
            <label for="password">Password:</label>
            <input type="password" name="password"><br>
            <button type="submit">Submit</button>
            <button id="re" type="reset">Reset</button>
        </form>
    </div>
    <?php   
    include('footer.php');
    ?>
</body>
</html>
