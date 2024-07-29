<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
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
    echo "<div class='content'>
		<input type='hidden' id='mg' value=$row[magnesium]>
		<label for='pattern' id='lpattern'>Running pattern </label>
		<input type='text' id='pattern' value=$row[part_number]>
		<label for='alloy' id='lalloy'>FeSiMg Alloy type: </label>
		<input type='text' id='alloy' value=$row[alloy]>
		<label for='mtwt' id='lmtwt'>Metal Weight: </label>
		<input name='mtwt' id='mtwt' value=$row[metalweight]>
		<table id='alloy_steel'>
			<tr>
				<th>Alloying Element</th>
				<th>Percentage</th>
				<th>Weight in Kgs. </th>
			</tr>
			<tr>
				<td>FeSiMg Alloy</td>
				<td><input name='alloyp' id='alloyp'></td>
				<td><input name='alloyw' id='alloyw'></td>
			</tr>
			<tr>
				<td>Covering Steel</td>
				<td><input name='steelp' id='steelp'></td>
				<td><input name='steelw' id='steelw'></td>
			</tr>
		</table>
		<table id='other_alloys'>
			<tr>
				<th>Alloying Element</th>
				<th>Holder composition</th>
				<th>Final composition</th>
				<th>Weight in Kgs. </th>
			</tr>
			<tr>
				<td>FeSi</td>
				<td><input name='fesia' id='fesia'></td>
				<td><input name='fesir' id='fesir' value='$row[silicon]' ></td>
				<td><input name='fesiw' id='fesiw' readonly></td>
			</tr>
			<tr>
				<td>Copper</td>
				<td><input name='coppera' id='coppera'></td>
				<td><input name='copperr' id='copperr' value='$row[copper]' ></td>
				<td><input name='copperw' id='copperw' readonly></td>
			</tr>
			<tr>
				<td>Tin</td>
				<td><input name='tina' id='tina'></td>
				<td><input name='tinr' id='tinr' value='$row[tin]' ></td>
				<td><input name='tinw' id='tinw' readonly></td>
			</tr>
			<tr>
				<td>Manganese</td>
				<td><input name='manganesea' id='manganesea'></td>
				<td><input name='manganeser' id='manganeser' value='$row[manganese]' ></td>
				<td><input name='manganesew' id='manganesew' readonly></td>
			</tr>
			<tr>
				<td>Mischmetal</td>
				<td colspan='3'><input name='mischmetal' id='mischmetal' value='$row[mischmetal]' ></td>
			</tr>
			<tr>
				<td>Ladle Addition</td>
				<td colspan='3'><input name='laddition' id='laddition' value='$row[laddition]' ></td>
			</tr>
			<tr>
				<td>Pouring Temperature</td>
				<td colspan='3'><input name='temperature' id='temperature' value='$row[temperature]' ></td>
			</tr>
		</table>
	<input type='button' value='Calculate' id='calbtn' onclick='calculate()'>
	</div>";
	?>
    <?php   
    include("footer.php");
    ?>
</body>
</html>