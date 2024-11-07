<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="dummy.php" method="post">
        <label for="tdate">Date</label>
        <input type="date" name="tdate"><br>
        <button type="submit" name="nk">Submit</button>
    </form>
    <?php
        if(isset($_POST['nk'])){
            $tdate = $_POST['tdate'];
            echo $tdate;
        }
    ?>
</body>
</html>