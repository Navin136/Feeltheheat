<!DOCTYPE html>
<?php 
    include("mysql.php");
?>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    	<meta http-equiv="refresh" content="5">
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
		<div id="seconddetail">
			<div id="first">
				<label>PART NUMBER:</label>
				<b><?php echo "$runningpart";?></b>
			</div>
			<div id="second">
				<label>GRADE:</label>
				<b><?php echo strtoupper($grade);?></b>
			</div>
			<div id="third">
				<label>DATE:</label>
				<b><?php echo date("d.m.Y");?></b>
			</div>
		</div>
	</div>
	<div id="bodybox">
	<table>
		<tr>
			<th class="materials" rowspan=2>RAW MATERIALS</th>
			<th class="cpercent" rowspan=2>%</th>
			<th class="cweight" rowspan=2>WEIGHT 	(Kgs.)</th>
			<th colspan=2>TOLERANCE</th>
		</tr>
		<tr>
			<th class="tolerance">+5%</th>
			<th class="tolerance">-5%</th>
		</tr>
		<tr>
			<td class="materials">STEEL</td>
			<td class="cpercent"><?php echo $cmfetched['steelp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['steelp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['steelp']*60+60*5/100*$cmfetched['steelp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['steelp']*60-60*5/100*$cmfetched['steelp'];?></td>
		</tr>
		<tr>
			<td class="materials">TIN STEEL</td>
			<td class="cpercent"><?php echo $cmfetched['tinsteelp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['tinsteelp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['tinsteelp']*60+60*5/100*$cmfetched['tinsteelp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['tinsteelp']*60-60*5/100*$cmfetched['tinsteelp'];?></td>
		</tr>
		<tr>
			<td class="materials">GREY STEEL</td>
			<td class="cpercent"><?php echo $cmfetched['greysteelp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['greysteelp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['greysteelp']*60+60*5/100*$cmfetched['greysteelp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['greysteelp']*60-60*5/100*$cmfetched['greysteelp'];?></td>
		</tr>
		<tr>
			<td class="materials">BORINGS</td>
			<td class="cpercent"><?php echo $cmfetched['boringsp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['boringsp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['boringsp']*60+60*5/100*$cmfetched['boringsp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['boringsp']*60-60*5/100*$cmfetched['boringsp'];?></td>
		</tr>
		<tr>
			<td class="materials">PIG IRON</td>
			<td class="cpercent"><?php echo $cmfetched['pigironp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['pigironp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['pigironp']*60+60*5/100*$cmfetched['pigironp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['pigironp']*60-60*5/100*$cmfetched['pigironp'];?></td>
		</tr>
		<tr>
			<td class="materials">FDY RETURNS</td>
			<td class="cpercent greentext"><?php echo $cmfetched['returnsp'];?></td>
			<td class="cweight"><?php echo $cmfetched['returnsp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['returnsp']*60+60*5/100*$cmfetched['returnsp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['returnsp']*60-60*5/100*$cmfetched['returnsp'];?></td>
		</tr>
		<tr>
			<td class="materials">TOTAL</td>
			<td class="cpercent"><?php echo $cmfetched['steelp']+$cmfetched['tinsteelp']+$cmfetched['greysteelp']+$cmfetched['boringsp']+$cmfetched['pigironp']+$cmfetched['returnsp'];?></td>
			<td class="cweight greentext"><?php echo $cmfetched['steelp']*60+$cmfetched['tinsteelp']*60+$cmfetched['greysteelp']*60+$cmfetched['boringsp']*60+$cmfetched['pigironp']*60+$cmfetched['returnsp']*60;?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['steelp']*60+60*5/100*$cmfetched['steelp']+$cmfetched['tinsteelp']*60+60*5/100*$cmfetched['tinsteelp']+$cmfetched['greysteelp']*60+60*5/100*$cmfetched['greysteelp']+$cmfetched['boringsp']*60+60*5/100*$cmfetched['boringsp']+$cmfetched['pigironp']*60+60*5/100*$cmfetched['pigironp']+$cmfetched['returnsp']*60+60*5/100*$cmfetched['returnsp'];?></td>
			<td class="tolerance greentext"><?php echo $cmfetched['steelp']*60-60*5/100*$cmfetched['steelp']+$cmfetched['tinsteelp']*60-60*5/100*$cmfetched['tinsteelp']+$cmfetched['greysteelp']*60-60*5/100*$cmfetched['greysteelp']+$cmfetched['boringsp']*60-60*5/100*$cmfetched['boringsp']+$cmfetched['pigironp']*60-60*5/100*$cmfetched['pigironp']+$cmfetched['returnsp']*60-60*5/100*$cmfetched['returnsp'];?></td>
		</tr>
	</table>
	</div>
</body>
</html>
