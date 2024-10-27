<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Raw Material Requirements</title>
    <link rel='stylesheet' href='css/melting.css'>
    <script defer src='js/melting.js'></script>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <?php
        if(isset($_POST['get_material'])){
            $part_no = $_POST['part_no'];
            $moulds = $_POST['moulds'];
            $treewt_query = "select tree_weight from part_details where part_number='$part_no'";
            $treewt_result = $conn->query($treewt_query);
        }
    ?>
    <form action="rawmaterial.php" method="post">
        <label for="part_no">Part Number: </label>
        <select name="part_no">
            <option value=""></option>
                <?php
                $sql="select part_number from part_details";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo"<option value=\"$row[part_number]\">$row[part_number]</option>";
                    }
                }
                ?>
        </select>
        <label for="moulds">No. of Moulds</label>
        <input type="text" name="moulds">
        <button type="submit" name="get_material">Get Required material</button>
    </form>
    <?php   
    include("footer.php");
    ?>
</body>
</html>
