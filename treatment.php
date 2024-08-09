<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv="refresh" content="15">
    <title>Treatment Area</title>
    <link rel='stylesheet' href='css/treatment.css'>
    <script src='js/treatment.js'></script>
	<link rel='icon' href='icon.png'>
</head>
<body>
	<?php   
    include("header.php");
    ?>
	<?php
		$part = 'SELECT current_part,id from live where id=1';
		$respart = $conn->query($part);
		$partrow = $respart->fetch_assoc();
		$nk = "$partrow[current_part]";
		$sql = "SELECT * FROM part_details where part_number=".$nk;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$holder = 'SELECT * from holder where id=1';
        $reshold = $conn->query($holder);
        $rowholder =$reshold->fetch_assoc();
    echo "<div class='content'>
		<input type='hidden' id='mg' value=$row[magnesium]>
		<label for='pattern' id='lpattern'>Running pattern:</label>
		<input type='text' id='pattern' value=$row[part_number]><br>
		<label for='alloy' id='lalloy'>FeSiMg Alloy type:</label>
		<input type='text' id='alloy' value=$row[alloy]><br>
		<label for='mtwt' id='lmtwt'>Metal Weight:</label>
		<input name='mtwt' id='mtwt' value=$row[metalweight]><br>
		<label for='tt' id='ltt'>Tapping Temp:</label>
		<input name='tt' id='tt' value='1460-1490'><br><br><br>
		<table id='alloy_steel'>
			<tr>
				<th><label>Alloying Element</label></th>
				<th><label>Percentage</label></th>
				<th><label>Weight in Kgs. </label></th>
			</tr>
			<tr>
				<td><label>FeSiMg Alloy</label></td>
				<td><input name='alloyp' id='alloyp'></td>
				<td><input name='alloyw' id='alloyw' class='weight'></td>
			</tr>
			<tr>
				<td><label>Covering Steel</label></td>
				<td><input name='steelp' id='steelp'></td>
				<td><input name='steelw' id='steelw' class='weight'></td>
			</tr>
		</table>
		<table id='other_alloys'>
			<tr>
				<th><label>Alloying Element</label></th>
				<th><label>Holder</label></th>
				<th><label>Final</label></th>
				<th><label>Weight in Kgs. </label></th>
			</tr>
			<tr>
				<td><label>FeSi</label></td>
				<td><input name='fesia' id='fesia' class='base' value='$rowholder[silicon]'></td>
				<td><input name='fesir' id='fesir' class='req' value='$row[silicon]' ></td>
				<td><input name='fesiw' id='fesiw' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Copper</label></td>
				<td><input name='coppera' id='coppera' class='base' value='$rowholder[copper]'></td>
				<td><input name='copperr' id='copperr' class='req' value='$row[copper]' ></td>
				<td><input name='copperw' id='copperw' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Tin</label></td>
				<td><input name='tina' id='tina' class='base' value='$rowholder[tin]'></td>
				<td><input name='tinr' id='tinr' class='req' value='$row[tin]' ></td>
				<td><input name='tinw' id='tinw' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Manganese</label></td>
				<td><input name='manganesea' id='manganesea' class='base' value='$rowholder[manganese]'></td>
				<td><input name='manganeser' id='manganeser' class='req' value='$row[manganese]' ></td>
				<td><input name='manganesew' id='manganesew' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Mischmetal</label></td>
				<td colspan='3'><input name='mischmetal' id='mischmetal' class='weight' value='$row[mischmetal]' ></td>
			</tr>
			<tr>
				<td><label>Ladle Addition</label></td>
				<td colspan='3'><input name='laddition' id='laddition' class='weight' value='$row[laddition]' ></td>
			</tr>
			<tr>
				<td><label>Pouring Temperature</label></td>
				<td colspan='3'><input name='temperature' id='temperature' class='weight' value='$row[temperature]' ></td>
			</tr>
		</table>
	<!--<input type='button' value='Calculate' id='calbtn' onclick='calculate()'>-->
	</div>";
	?>
    <?php   
    include("footer.php");
    ?>
</body>
</html>