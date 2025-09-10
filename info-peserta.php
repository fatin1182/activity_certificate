<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maklumat Peserta</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

	<style>
		
		#box-title{
			border-radius: 10px;
			border: 1px solid #999999;
			background: #CCCCCC;
			padding: 10px;
			width: 100%;
			height: 100%;
			text-align: left;
		}

	</style>

</head>
<body>

	<div class="w3-display-container" style="background-color: #9fb2d4;">
		<div align="center">
			<img src="img/kkm2.png" alt="" width="109" height="83">
			<img src="img/kkm.png" alt="" width="115" height="100">
			<img src="img/logo.png" alt="" width="186" height="80"><p></p>
			KEMENTERIAN KESIHATAN MALAYSIA
			<p>HOSPITAL TAIPING</p>
			<div class="w3-bar w3-left-align w3-amber" style="background-color: #9fb2d4;"></div>
		</div>
	</div>

	<div class="w3-content w3-section">
		<p id="box-title"><strong>BAHAGIAN B : MAKLUMAT PESERTA</strong></p>
	</div>

	<table id="tbl_home" align="center" border="0" cellpadding="7" cellspacing="7">
		<tbody>
			<form name="frmHome" method="POST" action=""></form>

			<?php
				include("include/db.php");

				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$sql = "SELECT * FROM tb_peserta WHERE id='$id'";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result)) {
			?>

			<tr>
				<td id="label">Nama</td>
				<td>:</td>
				<td><strong><?php echo stripslashes($row['nama']); ?></strong></td>
			</tr>
			<tr>
				<td id="label">No. K/P</td>
				<td>:</td>
				<td><strong><?php echo $row['nokp']; ?></strong></td>
			</tr>
			<tr>
				<td id="label">Skim/Gred</td>
				<td>:</td>
				<td><strong><?php echo $row['gred']; ?></strong></td>
			</tr>
			<tr>
				<td id="label">Jawatan</td>
				<td>:</td>
				<td><strong><?php echo $row['jawatan']; ?></strong></td>
			</tr>
			<tr>
				<td id="label">Tempat Bertugas</td>
				<td>:</td>
				<td><strong><?php echo $row['tbertugas']; ?></strong></td>
			</tr>
			<tr>
				<td id="label">Staf</td>
				<td>:</td>
				<td><strong><?php ($row['staf'] == 'Y') ? printf('Ya') : printf('Tidak'); ?></strong></td>
			</tr>
			<tr>
				<td id="label">Maklumat Kursus</td>
				<td>:</td>
				<td><strong><?php echo $row['kursus']; ?></strong></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td id="data2" colspan="3" align="center">Maklumat Kehadiran Tuan/Puan telah direkodkan. Terima Kasih di atas kerjasama yang diberikan.</td>
			</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>

	<div class="w3-display-container">
		<hr style="height: 1px;  background-color: darkgray;">
		<p align="center"><strong>HOSPITAL TAIPING, PERAK</strong></p>
	</div>

</body>
</html>