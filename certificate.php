<?php 
include("include/db.php");

if(isset($_POST['submit']))
{
	$nokp = $_POST['nokp'];

	$kursuslist = $_POST['kursuslist'];
	foreach ($kursuslist as $kursuss) 
	{
		$sql = "SELECT id FROM tb_peserta WHERE nokp='$nokp' AND kursus='$kursuss'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result))
		{
			$row=$result->fetch_array();
			$id = $row['0'];
		?>
		<script language='javascript'>window.location.href='sijil/sijil.php?id=<?php echo ($id); ?>';</script>
		<?php
		}
		else
		{	
			echo "Tidak berjaya: " . mysqli_error($conn);
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Sijil</title>

	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="w3-display-container" style="background-color: #9fb2d4;">
		<div align="center">
			<img src="img/kkm2.png" alt="" width="109" height="83">
			<img src="img/kkm.png" alt="" width="115" height="100">
			<img src="img/logo.png" alt="" width="186" height="80"><p></p>
			KEMENTERIAN KESIHATAN MALAYSIA
			<p>HOSPITAL TAIPING</p>
			<div class="w3-bar w3-amber" style="background-color: #9fb2d4;">
			</div>
		</div>
	</div>

	<div class="w3-content w3-section" align="center">
		<span class="w3-large" style="font-weight: bold;">
			Borang Cetakan Sijil
		</span>
	</div>

	<table id="tbl_cari" align="center" border="0" cellpadding="7" cellspacing="7">
		<tbody>
			<tr>
				<td colspan="3">Sila masukkan Kod Kursus & No. Kad Pengenalan anda:</td>
			</tr>
			<form method="POST" action="">

			<tr>
				<td id="label">No. Kad Pengenalan (KP)</td>
				<td>:</td>
				<td>
					<input type="text"  name="nokp" size="20" maxlength="12" autocomplete="off" placeholder="Sila masukkan No. K/P" required/>
				</td>	
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td id="label" colspan="2">Contoh : 021578016364</td>
			</tr>
			<tr>
				<td id="data2" colspan="3" align="center">Sila Pastikan Nombor Kad Pengenalan Anda Betul</td>
			</tr>
			<tr>
				<td id="label">Kod Kursus</td>
				<td>:</td>
				<td>
					<?php 
					$sql = "SELECT * FROM tb_dtkursus order by tarikh_mula desc limit 1";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) 
					{
						foreach ($result as $kursus) {
					?>

					<div>
						<input type="checkbox" name="kursuslist[]" value=" <?= $kursus['nama_kursus'].' | '.$kursus['kod_kursus'].' | '.$kursus['tarikh_mula']; ?> " /> <?= $kursus['nama_kursus'].' | '.$kursus['kod_kursus'].' | '.$kursus['tarikh_mula']; ?>
					</div>
					<?php 
						}
					}
					else{
						echo "No Record Found";
					}
					?>
				</td>	
			</tr>
			<tr>
				<td colspan="3" align="center">
					<br>

					<button type="reset" class="btn btn-warning text-white" name="reset">Set Semula</button>
					<button type="submit" class="btn btn-success" name="submit">Hantar</button>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			</form>
		</tbody>
	</table>

	<div class="w3-display-container">
		<hr style="height: 0.5px; background-color: grey;">
		<p align="center"><strong>HOSPITAL TAIPING, PERAK</strong></p>
	</div>

</body>
</html>