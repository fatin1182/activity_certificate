<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Senarai Kehadiran</title>

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
		<p id="title"><strong>BAHAGIAN C (i) : SENARAI KEHADIRAN</strong></p>

		<a href="senarai_kursus.php" class="btn btn-dark mb-3">Senarai Kursus</a>

		<table id="example" class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th width="3%"><strong>Bil</strong></th>
					<th width="33%"><strong>Nama</strong></th>
					<th width="19%"><strong>Jawatan</strong></th>
					<th width="8%"><strong>Gred</strong></th>
					<th width="17%"><strong>Tempat Bertugas</strong></th>
					<th width="8%"><strong>Action</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				include("include/db.php");

					$sql = "SELECT * FROM tb_peserta group by nokp order by nama asc";
					$result = mysqli_query($conn, $sql);
					$bil = 1;
					while($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td><?php echo $bil; ?></td>
						<td align="left"><?php echo $row['nama']; ?></td>
						<td><?php echo $row['jawatan']; ?></td>
						<td><?php echo $row['gred']; ?></td>
						<td><?php echo $row['tbertugas']; ?></td>
						<td align="center">
							<a href="info-peserta.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
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