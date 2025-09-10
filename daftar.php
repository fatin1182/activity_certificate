<?php 

include("include/db.php");

if (isset($_POST['submit'])) {
	
	$id = ($_POST['id']);
	$nama = ucwords($_POST['nama']);
	$nokp = $_POST['nokp'];
	$gred = ucwords($_POST['gred']);
	$jawatan = ucwords($_POST['jawatan']);
	$tbertugas = ucwords($_POST['tbertugas']);
	$staf = $_POST['staf'];

	$kursuslist = $_POST['kursuslist'];

	foreach ($kursuslist as $kursuss) 
	{
		$sql = "SELECT id FROM tb_peserta WHERE nama = '$nama' AND kursus = '$kursuss'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 0)
		{
			$sql = "INSERT INTO tb_peserta(nama, nokp, staf, jawatan, gred, tbertugas, kursus) VALUES('$nama', '$nokp', '$staf', '$jawatan', '$gred', '$tbertugas', '$kursuss')";

			$result = mysqli_query($conn, $sql);

			header('location: notis.php');
		}else{
			echo "Data telah wujud";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendaftaran Peserta</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<style>
		body{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		}

		#title {
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

	<div class="container pt-3">
		<div class="row">
			<p id="title"><strong>BAHAGIAN A : DAFTAR KEHADIRAN PESERTA</strong></p>
		</div>
	</div>

	<div class="container d-flex justify-content-center">

		<form method="POST" style="width: 70vw; min-width: 300px;">
			<div class="row mb-3">
				<div class="mb-3">
					<label class="form-label"><strong>Nama</strong></label>
					<input type="text" class="form-control" name="nama" maxlength="90" autocomplete="off"  placeholder="Sila masukkan Nama" required/><span class="text-muted">(Nama yang diberikan akan dicetak di atas sijil)</span>
				</div>

				<div class="col mb-3">
					<label class="form-label"><strong>No. K/P</strong></label>&nbsp;&nbsp;&nbsp;
					<input type="text" class="form-control" name="nokp" maxlength="12" autocomplete="off" placeholder="Sila masukkan No. K/P" required/>
				</div>

				<div class="col mb-3">
					<label class="form-label"><strong>Skim / Gred</strong></label>
					<input type="text" class="form-control" name="gred" maxlength="20" placeholder="Sila masukkan Gred" autocomplete="off"required/>
				</div>

				<div class="mb-3">
					<label class="form-label"><strong>Jawatan</strong></label>
					<input type="text" class="form-control" name="jawatan" maxlength="50" autocomplete="off" placeholder="Sila masukkan Jawatan" required/>
				</div>

				<div class="mb-3">
					<label class="form-label"><strong>Tempat Bertugas</strong></label>
					<input type="text" class="form-control" name="tbertugas" maxlength="100" autocomplete="off" placeholder="Sila masukkan Tempat Bertugas" required/>
				</div>

				<div class="form-group mb-3">
					<label><strong>Staf / Kakitangan HTPG :</strong></label>&nbsp;
					<label class="radio-inline"><input type="radio" name="staf" value="Y" onchange="">Ya</label>
					<label class="radio-inline"><input type="radio" name="staf" value="T" onchange="">Tidak</label>
				</div>

				<div class="form-group">
					<div class="hr-line-dashed"></div>
					<label><strong>Senarai Kursus</strong></label><br>
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
				</div>

				<div align="right">
					<button type="reset" class="btn btn-warning text-white" name="reset">Set Semula</button>
					<button type="submit" class="btn btn-success" name="submit">Daftar</button>
				</div>
			</div>
		</form>
	</div>

</body>
</html>