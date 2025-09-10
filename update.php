<?php 
include ("include/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tb_dtkursus WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['submit']))
{
	$nama = htmlspecialchars($_POST['nama_kursus']);
	$tempat = htmlspecialchars($_POST['tempat_kursus']);
	$kod = htmlspecialchars($_POST['kod_kursus']);
	$tarikh_mula = htmlspecialchars($_POST['tarikh_mula']);
	$tarikh_akhir = htmlspecialchars($_POST['tarikh_akhir']);
	$masa_mula = htmlspecialchars($_POST['masa_mula']);
	$masa_tamat = htmlspecialchars($_POST['masa_tamat']);
	mysqli_query($conn, "UPDATE tb_dtkursus SET
			tempat_kursus = '$tempat',
			tarikh_mula = '$tarikh_mula',
			tarikh_akhir = '$tarikh_akhir',
			masa_mula = '$masa_mula',
			masa_tamat = '$masa_tamat' WHERE id = '$id'");
	header("location: senarai_kursus.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Kursus</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

    	body{
    		background-color: #9fb2d4;
    	}

    </style>
</head>
<body>

	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<a href="senarai_kursus.php" class="btn btn-dark" style="margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a> Daftar Kursus
					</div>
					<div class="card-body">
						<form method="POST">
							
							<div class="form-group">
								<label>Nama Kursus</label>
								<input type="text" name="nama_kursus" value="<?php echo $row['nama_kursus']?>" class="form-control" autocomplete="off" required/>
							</div>

							<div class="form-group">
								<label>Tempat Kursus</label>
								<input type="text" name="tempat_kursus" value="<?php echo $row['tempat_kursus']?>" class="form-control" autocomplete="off" required/>
							</div>

							<div class="form-group">
								<label>Kod Kursus</label>
								<input type="text" name="kod_kursus" value="<?php echo $row['kod_kursus']?>"  class="form-control" autocomplete="off" required/>
							</div>

							<div class="form-group">
								<label>Tarikh Mula Kursus</label>
								<input type="date" name="tarikh_mula" class="form-control" autocomplete="off" required/>
							</div>

							<div class="form-group">
								<label>Masa Mula Kursus</label>
								<input type="time" name="masa_mula" class="form-control" autocomplete="off" required/>
							</div>

							<div class="form-group">
								<label>Tarikh Akhir Kursus</label>
								<input type="date" name="tarikh_akhir" class="form-control" autocomplete="off">
							</div>

							<div class="form-group">
								<label>Masa Tamat Kursus</label>
								<input type="time" name="masa_tamat" class="form-control" autocomplete="off">
							</div>

							<button type="submit" name="submit" class="btn btn-dark">Simpan</button>
							<button type="reset" name="reset" class="btn btn-warning text-white">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>