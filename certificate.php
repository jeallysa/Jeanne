<?php  
session_start();

    if (!$_SESSION['user']) {
        header('Location: ../login.php');
            # code...
    }
  include('functions/DisplayProfile.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>Certificate</title>

	<style>
	body{
		margin: 10mm 25mm 25mm 25mm;
	}
		.center{
			text-align: center;
		}

		.text{
			font-family: Arial;
			font-size: 12;
		}

		.underline{
			text-decoration: underline;
		}

		.justify{
			text-align: justify;
		}

		table{
			border-collapse: collapse;
		}
		table, th, td {
			border: 1px solid black;
		}

		pre{
			font-family: Arial;
			font-size: 12;
		}
	</style>

	</head>

	<body>

	<br><br><br>

	<?php 
      if (isset($_GET["id"]) AND isset($_GET["purpose"])) {
      	$id = $_GET["id"];
      	$purpose = $_GET["purpose"];
      }
    ?>
    <input type="hidden" name="id" value="<?php echo $serial_no ?>"> 

	<div class="center">
		<img src="../assets/img/logo.png">
		<div class="text">
			<p><strong>COMMAND SPECIAL SERVICE OFFICE</strong><br>
			PHILIPPINE MILITARY ACADEMY<br>
			Fort General Gregorio H del Pilar, Baguio City</p>
			<br>
			<div style="float:left;">CSSO</div>

			<div style="float:right;"><?php
	          $currently_selected = date('j F, Y');
	          echo "$currently_selected";
	          ?>
	        </div>
			<br>
			<p><strong><u>C</u> <u>E</u> <u>R</u> <u>T</u> <u>I</u> <u>F</u> <u>I</u> <u>C</u> <u>A</u> <u>T</u> <u>I</u> <u>O</u> <u>N</u></strong></p>
			<br>
			<div style="float:left;">TO WHOM IT MAY CONCERN:</div>
			<br><br>
			<div class="justify">
				&emsp;&emsp;&emsp;THIS IS TO CERTIFY that <strong><u><?php echo $value1['rank'];?> <?php echo $value1['lname'];?> <?php echo $serial_no;?> <?php echo $value1['svcBranch'];?></u></strong> presently assigned at MP, HSG passed the <u>Regular Physical Fitness Test (PFT) for the 1st Semester CY 2016</u> conducted by SPS, AFP on <u>28 April 2016</u> at PMA, Fort General Gregorio H del Pilar, Baguio City.	
			<br><br>
			Subject: <u><?php echo $value1['afpType']; ?></u> registered the following rating:
			</div>
			<br>

			<?php 
				$serial_no = $_GET['id'];
				$conn = mysqli_connect('localhost', 'root', '', 'pft');
				$ps = "SELECT * FROM pft_info WHERE serial_no = '$serial_no' and quarter = $quarter and year = $year";

				$result = mysqli_query($conn, $ps);
				$value = mysqli_fetch_array($result);
			 ?>

			<table align="center">
				<tr>
					<strong>
					<th>EVENT</th>
					<th>RAW SCORE/TIME</th>
					<th>RATING (%)</th>
					</strong>
				</tr>
				<tr>
					<td><strong>Push-up</strong></td>
					<td><?php echo $value['pushupScoreTime']?></td>
					<td><?php echo $value['pushupRate']?> %</td>
				</tr>
				<tr>
					<td><strong>Sit-up</strong></td>
					<td><?php echo $value['situpScoreTime']?></td>
					<td><?php echo $value['situpRate']?> %</td>
				</tr>
				<tr>
					<td><strong>3.2 Kms Distance run</strong></td>
					<td><?php echo $value['runScoreTime']?></td>
					<td><?php echo $value['runRate']?> %</td>
				</tr>
			</table>
			<br>
			
			<pre><strong>						Average Rating: <u><?php echo $value['aveRate']?> %</u></strong></pre>

			<div class="justify">
				&emsp;&emsp;&emsp;This certification is being issued upon request of subject <u><?php echo $value1['afpType']; ?></u> for <?php if ($value1['sex'] === 'm') {
					echo "his";
				} else {
					echo "her";
				}
				 ?> application for <strong><u><?php echo $purpose ?></u></strong>.
			</div>
			<br>
		</div>
	</div>
</body>

</html>