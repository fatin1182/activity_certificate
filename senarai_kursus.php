<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Senarai Kursus</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
	<script defer src="script.js"></script>

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

		<p id="title"><strong>BAHAGIAN C (ii) : SENARAI KURSUS</strong></p>
		<a href="create_kursus.php" class="btn btn-dark mb-3">Tambah Kursus</a>
		<a href="senarai_kehadiran.php" class="btn btn-dark mb-3">Senarai Kehadiran</a>


		<table id="example" class="table table-striped table-bordered">
			<thead class="table-dark">
				<tr>
					<th scope="col"><strong>No.</strong></th>
					<th scope="col"><strong>Nama Kursus</strong></th>
					<th scope="col"><strong>Tempat Kursus</strong></th>
					<th scope="col"><strong>Kod Kursus</strong></th>
					<th scope="col"><strong>Tarikh Mula</strong></th>
					<th scope="col"><strong>Tarikh Akhir</strong></th>
					<th scope="col"><strong>Tindakan</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include("include/db.php");

				$sql = "SELECT * FROM tb_dtkursus group by kod_kursus order by nama_kursus asc";

				$result = mysqli_query($conn, $sql);
				$bil = 1;
				while ($row = mysqli_fetch_assoc($result)) {
				?>

				<tr>
					<td><?php echo $bil; ?>
					</td>
					<td><?php echo $row['nama_kursus']; ?>
					</td>
					<td><?php echo $row['tempat_kursus']; ?>
					</td>
					<td><?php echo $row['kod_kursus']; ?>
					</td>
					<td><?php echo $row['tarikh_mula'].' '. $row['masa_mula']; ?>
					</td>
					<td><?php echo $row['tarikh_akhir'].' '. $row['masa_tamat']; ?>
					</td>
					<td align="center">
						<a href="update.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php
				$bil++;
			}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>