<?php 

require('fpdf/fpdf.php');
require('../include/db.php');

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$sql = "SELECT nama, nokp FROM tb_peserta WHERE id='$id'";
	
	$result = mysqli_query($conn, $sql);
	$row=$result->fetch_array();
	$nama=stripslashes($row['nama']);
	$nokp=$row['nokp'];
	
	$pdf = new FPDF('L', 'mm', 'A4'); //define certificate size

	//Add page
	$pdf->AddPage();

	//Load certificate as background image
	$pdf->Image('ecertificate.png', 0, 0, 297, 210);

	//Add Organizer
	$pdf->SetFont('Helvetica', '', 14);
	$pdf->SetXY(12, 71); //Adjust the coordinate to position the text
	$pdf->Cell(0, 0, 'Dengan Setulus Ikhlas Merakamkan Setinggi', 0, 1, 'C');

	//Add Organizer
	$pdf->SetFont('Helvetica', '', 14);

	$pdf->SetXY(12, 80); //Adjust the coordinate to position the text
	$pdf->Cell(0, 0, 'Penghargaan Kepada', 0, 1, 'C');

	//certificate content
	$pdf->SetFont('Times', 'B', 33);
	$pdf->SetTextColor(7, 9, 28); //set text color (RGB)

	//Add recipient's name
	$pdf->SetXY(3, 95); //Adjust coordinate
	$pdf->Cell(0, 0, $nama, 0, 1, 'C');

	//certificate content
	$pdf->SetFont('Times', 'B', 29);
	$pdf->SetTextColor(7, 9, 28); //set text color (RGB)

	//Add recipient's nokp
	$pdf->SetXY(3, 112); //Adjust coordinate
	$pdf->Cell(0, 0, $nokp, 0, 1, 'C');

	//Add course name
	$pdf->SetFont('Helvetica', '', 15);
	$pdf->SetXY(10, 126);
	$pdf->Cell(0, 0, 'Telah Memberi Sumbangan dan Khidmat', 0, 1, 'C');

	$pdf->SetFont('Helvetica', '', 15);
	$pdf->SetXY(10, 135);
	$pdf->Cell(0, 0, 'Di atas Penglibatan Menjayakan Program', 0, 1, 'C');

	//Add Date
	$pdf->SetFont('Times', 'B', 24);
	$pdf->SetXY(12, 146); //Adjust the coordinate to position the text
	$pdf->Cell(0, 0, 'Majlis Persaraan Pengarah Hospital Taiping 2023', 0, 1, 'C');

	//Add Place
	$pdf->SetFont('Helvetica', '', 15);
	$pdf->SetXY(12, 157); //Adjust the coordinate to position the text
	$pdf->Cell(0, 0, 'Pada', 0, 1, 'C');

	//Add Organizer
	$pdf->SetFont('Times', 'B', 21);
	$pdf->SetXY(12, 165); //Adjust the coordinate to position the text
	$pdf->Cell(0, 0, '18 Ogos 2023', 0, 1, 'C');

	//$filename = 'certificate_'.str_replace('', '_', $nama).'.pdf';
	$pdf->Output();

}
	 	
?>