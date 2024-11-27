<!DOCTYPE html>
<?php 
    include("mysql.php");
?>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- <meta http-equiv="refresh" content="10"> -->
	<title>Chargemix</title>
	<link rel="stylesheet" href="css/chargemixdisplay.css">
</head>
<body>
	<?php
		$runningpart = '';
		$grade = '';
		$getpart = "SELECT runningpart from chargemixdisplay where id=1";
		$part = $conn->query($getpart);
		if($part->num_rows>0){
			$row = $part->fetch_assoc();
			$runningpart = $row['runningpart'];
			$gg = "SELECT grade from part_details where part_number='$runningpart'";
			$gf = $conn->query($gg);
			if($gf->num_rows>0){
				$graderow = $gf->fetch_assoc();
				$grade = $graderow['grade'];
				$cm = "SELECT * from chargemix where grade='$grade'";
				$cmf = $conn->query($cm);
				if($cmf->num_rows>0){
					$cmfetched = $cmf->fetch_assoc();
				}else{
					echo "Chargemix for the $grade is not choosen. Please goto <a href='editgrade.php?part=$grade'>Chargemix Page</a> and choose the grade";
				}
			}
			else{
				echo "Grade for the $runningpart pattern is not choosen. Please goto <a href='edit.php?part=$runningpart'>Master Page</a> and choose the grade";
			}
		}
		else{
			echo "part not available in chargemixdisplay table";
		}
	?>
	<div id="firstheading">
		<h3 id="eline">E-LINE MELTSHOP</h3>
		<h1 id="cmd">CHARGEMIX DISPLAY</h1>
    	<h3 id="meltease">MELTEASE</h3>
	</div>
	<div id="maindate">
		<div id="secinddetail">
			<div id="first">
				<label>PART NUMBER</label>
				<input value=<?php echo "$runningpart";?>></input>
			</div>
			<div id="second">
				<label>GRADE</label>
				<input value="<?php echo "$grade";?>"></input>
			</div>
			<div id="third">
				<label>DATE</label>
				<input value="<?php echo date("d.m.Y");?>"></input>
			</div>
		</div>
	</div>
	<div id="bodybox">
	<table>
		<tr>
			<th rowspan=2>RAW MATERIAL</th>
			<th rowspan=2>%</th>
			<th rowspan=2>WEIGHT</th>
			<th colspan=2>TOLERANCE</th>
		</tr>
		<tr>
			<th class="tolerance">+5%</th>
			<th class="tolerance">-5%</th>
		</tr>
		<tr>
		<td>STEEL</td>
			<td><?php echo $cmfetched['steelp'];?></td>
			<td><?php echo $cmfetched['steelp']*60;?></td>
			<td class="tolerance"><?php echo $cmfetched['steelp']*60+60*5/100*$cmfetched['steelp'];?></td>
			<td class="tolerance"><?php echo $cmfetched['steelp']*60-60*5/100*$cmfetched['steelp'];?></td>
		</tr>
		<tr>
			<td>BORINGS</td>
			<td><?php echo $cmfetched['boringsp'];?></td>
			<td><?php echo $cmfetched['boringsp']*60;?></td>
			<td class="tolerance"><?php echo $cmfetched['boringsp']*60+60*5/100*$cmfetched['boringsp'];?></td>
			<td class="tolerance"><?php echo $cmfetched['boringsp']*60+60*5/100*$cmfetched['boringsp'];?></td>
		</tr>
		<tr>
			<td>PIG IRON</td>
			<td><?php echo $cmfetched['pigironp'];?></td>
			<td><?php echo $cmfetched['pigironp']*60;?></td>
			<td class="tolerance"><?php echo $cmfetched['pigironp']*60+60*5/100*$cmfetched['pigironp'];?></td>
			<td class="tolerance"><?php echo $cmfetched['pigironp']*60+60*5/100*$cmfetched['pigironp'];?></td>
		</tr>
		<tr>
			<td>F. RETURNS</td>
			<td><?php echo $cmfetched['returnsp'];?></td>
			<td><?php echo $cmfetched['returnsp']*60;?></td>
			<td class="tolerance"><?php echo $cmfetched['returnsp']*60+60*5/100*$cmfetched['returnsp'];?></td>
			<td class="tolerance"><?php echo $cmfetched['returnsp']*60+60*5/100*$cmfetched['returnsp'];?></td>
		</tr>
		<tr>
			<td>TOTAL</td>
			<td><?php echo $cmfetched['steelp']+$cmfetched['boringsp']+$cmfetched['pigironp']+$cmfetched['returnsp'];?></td>
			<td><?php echo $cmfetched['steelp']*60+$cmfetched['boringsp']*60+$cmfetched['pigironp']*60+$cmfetched['returnsp']*60;?></td>
			<td class="tolerance"><?php echo $cmfetched['steelp']*60+60*5/100*$cmfetched['steelp']+$cmfetched['boringsp']*60+60*5/100*$cmfetched['boringsp']+$cmfetched['pigironp']*60+60*5/100*$cmfetched['pigironp']+$cmfetched['returnsp']*60+60*5/100*$cmfetched['returnsp'];?></td>
			<td class="tolerance"><?php echo $cmfetched['steelp']*60-60*5/100*$cmfetched['steelp']+$cmfetched['boringsp']*60-60*5/100*$cmfetched['boringsp']+$cmfetched['pigironp']*60-60*5/100*$cmfetched['pigironp']+$cmfetched['returnsp']*60-60*5/100*$cmfetched['returnsp'];?></td>
		</tr>
	</table>
	</div>
</body>
</html>