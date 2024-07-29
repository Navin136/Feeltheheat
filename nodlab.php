<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Nodularity Lab</title>
    <link rel='stylesheet' href='css/nodlab.css'>
    <link rel='icon' href='icon.png'>
</head>
<body>
    <?php   
    include("header.php");
    ?>
        <div class='labcontent'>
            <table>
                
                <?php
                    $sql= 'SELECT current_part,id from live where id=1';
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while ($row=$result->fetch_assoc()){
                            echo "<tr>
                                    <td><label for='pattern'>Running Part Number</label></td>
                                    <td><input type='text' id='pattern' value='$row[current_part]'></td>
                                </tr>";
                        }
                    }
                ?>
                <?php
                    $nk='';
                    $part = 'SELECT current_part,id from live where id=1';
                    $respart = $conn->query($part);
                    $row = $respart->fetch_assoc();
                    $nk = "$row[current_part]";
                    $sql= 'SELECT * from part_details where part_number='.$nk;
                    $result = $conn->query($sql);
                    if($result->num_rows>0)
                        while ($row=$result->fetch_assoc())
                        echo "<tr>
                                <td><label for='inoculant'>Inoculant</label></td>
                                <td><input type='text' name='inoculant' id='pattern' value=$row[inoculant] readonly></td>
                            </tr>
                            <tr>
                                <td><label for='flowrate'>Flow Rate in Gms/Sec</label></td>
                                <td><input name='flowrate' id='flowrate' value=$row[flow_rate] readonly></td>
                            </tr>
                            <tr>
                                <td><label for='temperature'>Pouring temperature</label></td>
                                <td><input type='text' name='temperature' id='temperature' value=$row[temperature] readonly></td>
                            </tr>
                            <tr>
                                <td><label for='ptime'>Pouring time</label></td>
                                <td><input type='text' name='ptime' id='ptime' value=$row[pouring_time] readonly></td>
                            </tr>
                            <tr>
                                <td><label for='taddition'>Tundish Addition</label></td>
                                <td><input type='text' name='taddition' id='taddition' value=$row[taddition] readonly></td>
                            </tr>
                            ";
                ?>
            </table>
            <!-- <button id='gather' onclick=''>Get Data</button> -->
        </div>
    <?php   
    include("footer.php");
    ?>
</body>
</html>