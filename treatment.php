<?php
    include('mysql.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv="refresh" content="10">
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
		$cp="SELECT current_part from live where id=1";
		$cpr = $conn->query($cp);
		$cpp = $cpr->fetch_assoc();
		$cppid=$cpp['current_part'];
		$curr_patt = "SELECT * from todayplan where id='$cppid'";
		$cresult = $conn->query($curr_patt);
		$currresult = $cresult->fetch_assoc();
		$dateselected=$currresult['todaydate'];
		$yeargot = substr($dateselected,0,4);
		$lastdigit = substr($dateselected,3,1);
		$firstdate=$yeargot."-01-00";
		$datecode = (strtotime($dateselected)-strtotime($firstdate))/(60*60*24).$lastdigit;
		$nk = "$currresult[part]";
		$sql = "SELECT * FROM part_details where part_number=".$nk;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$holder = 'SELECT * from holder where id=1';
        $reshold = $conn->query($holder);
        $rowholder =$reshold->fetch_assoc();
    echo "<div class='content'>
        <label id='datelabel'>Date: </label>
        <input class='datearea' type='text' readonly value=$currresult[todaydate]><br>
        <label id='dclabel'>Datecode:</label>
        <input class='datearea' id='dcinput' type='text' readonly value=$datecode><br>
		<input type='hidden' readonly id='mg' value=$row[magnesium]>
		<label for='pattern' id='lpattern'>Running pattern:</label>
		<input type='text' readonly id='pattern' value=$row[part_number]><br>
		<label for='alloy' id='lalloy'>FeSiMg Alloy type:</label>
		<input type='text' readonly id='alloy' value=$row[alloy]><br>
		<label for='mtwt' id='lmtwt'>Metal Weight:</label>
		<input name='mtwt' readonly id='mtwt' value=$row[metalweight]><br>
		<label for='tt' id='ltt'>Tapping Temp:</label>
		<input name='tt' id='tt' readonly value='1460-1490'><br><br><br>
		<table id='alloy_steel'>
			<tr>
				<th><label>Alloying Element</label></th>
				<th><label>Percentage</label></th>
				<th><label>Weight in Kgs. </label></th>
			</tr>
			<tr>
				<td><label>FeSiMg Alloy</label></td>
				<td><input name='alloyp' readonly id='alloyp'></td>
				<td><input name='alloyw' readonly id='alloyw' class='weight'></td>
			</tr>
			<tr>
				<td><label>Covering Steel</label></td>
				<td><input name='steelp' readonly id='steelp'></td>
				<td><input name='steelw' readonly id='steelw' class='weight'></td>
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
				<td><input name='fesia' id='fesia' readonly class='base' value='$rowholder[silicon]'></td>
				<td><input name='fesir' id='fesir' readonly class='req' value='$row[silicon]' ></td>
				<td><input name='fesiw' id='fesiw' readonly class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Copper</label></td>
				<td><input name='coppera' id='coppera' readonly class='base' value='$rowholder[copper]'></td>
				<td><input name='copperr' id='copperr' readonly class='req' value='$row[copper]' ></td>
				<td><input name='copperw' id='copperw' readonly class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Tin</label></td>
				<td><input name='tina' readonly id='tina' class='base' value='$rowholder[tin]'></td>
				<td><input name='tinr' readonly id='tinr' class='req' value='$row[tin]' ></td>
				<td><input name='tinw' readonly id='tinw' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Manganese</label></td>
				<td><input name='manganesea' readonly id='manganesea' class='base' value='$rowholder[manganese]'></td>
				<td><input name='manganeser' readonly id='manganeser' class='req' value='$row[manganese]' ></td>
				<td><input name='manganesew' readonly id='manganesew' class='weight' readonly></td>
			</tr>
			<tr>
				<td><label>Mischmetal</label></td>
				<td colspan='3'><input name='mischmetal' readonly id='mischmetal' class='weight' value='$row[mischmetal]' ></td>
			</tr>
			<tr>
				<td><label>Ladle Addition</label></td>
				<td colspan='3'><input name='laddition' readonly id='laddition' class='weight' value='$row[laddition]' ></td>
			</tr>
			<tr>
				<td><label>Pouring Temperature</label></td>
				<td colspan='3'><input name='temperature' readonly id='temperature' class='weight' value='$row[temperature]' ></td>
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