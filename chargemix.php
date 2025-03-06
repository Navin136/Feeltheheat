<?php 
    include("mysql.php");
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Charge Mix Viewer</title>
    <link rel='stylesheet' href='css/chargemix.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
    <div>
        <div id='btndiv'><a href="./creategrade.php" id="creategradebtn">Create New Grade</a></div>
        
        <table>
            <tr>
                <th>Grade</th>
                <th>Material</th>
                <th>Proportion</th>
                <th>Material Weight</th>
                <th>Action</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM chargemix";
            $fetched = $conn->query($sql);
            if($fetched->num_rows>0){
                while($row=$fetched->fetch_assoc()){
            ?>
            <tr>
                <td rowspan=6><?php echo $row['grade'];?></td>
                <td>Steel</td>
                <td><?php echo $row['steelp'];?></td>
                <td><?php echo $row['steelp']*60;?></td>
                <td rowspan=6><a id="creategradebtn" href="./editgrade.php?grade=<?php echo $row['grade'];?>">Edit</a><span id="separate"></span><a id="delbtn" href="./deletechargemix.php?grade=<?php echo $row['grade'];?>">Delete</a></td>
            </tr><tr>
                <td>Grey Steel</td>
                <td><?php echo $row['greysteelp'];?></td>
                <td><?php echo $row['greysteelp']*60;?></td>
            </tr><tr>
                <td>Tin Steel</td>
                <td><?php echo $row['tinsteelp'];?></td>
                <td><?php echo $row['tinsteelp']*60;?></td>
            </tr><tr>
                <td>Borings</td>
                <td><?php echo $row['boringsp'];?></td>
                <td><?php echo $row['boringsp']*60;?></td>
            </tr><tr>
                <td>Pigiron</td>
                <td><?php echo $row['pigironp'];?></td>
                <td><?php echo $row['pigironp']*60;?></td>
            </tr><tr id="lastrow">
                <td>Foundry Returns</td>
                <td><?php echo $row['returnsp'];?></td>
                <td><?php echo $row['returnsp']*60;?></td>
            </tr>
            <?php
                }}
            ?>
        </table>
    </div><div>
    <div id='btndiv'><a href="./addmaterial.php" id="creategradebtn">Add Material</a></div>
        <table id='compdiv'>
            <tr>
                <th>Material</th>
                <th>C</th>
                <th>Si</th>
                <th>Cu</th>
                <th>Sn</th>
                <th>Mn</th>
                <th>Mo</th>
                <th>Ni</th>
                <th>Ti</th>
                <th>Action</th>
            </tr>
            <tr>
            <?php 
            $sql = "SELECT * FROM composition";
            $fetched = $conn->query($sql);
            if($fetched->num_rows>0){
                while($row=$fetched->fetch_assoc()){
            ?>
                <td><?php echo $row['material'];?></td>
                <td><?php echo $row['carbon'];?></td>
                <td><?php echo $row['silicon'];?></td>
                <td><?php echo $row['copper'];?></td>
                <td><?php echo $row['tin'];?></td>
                <td><?php echo $row['manganese'];?></td>
                <td><?php echo $row['molybdenum'];?></td>
                <td><?php echo $row['nickel'];?></td>
                <td><?php echo $row['titanium'];?></td>
                <td><a id="creategradebtn" href="./editmaterial.php?material=<?php echo $row['material'];?>">Edit</a><span id="separate"></span><a name="delmaterial" href="./deletematerial.php?material=<?php echo $row['material'];?>" id="delbtn">Delete</a></td>
            </tr>
            <?php }}?>
        </table>
    </div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>