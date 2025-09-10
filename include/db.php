<?php 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'itecert';

$conn = mysqli_connect("localhost", "root", "", "itecert");

if (!$conn) {
	die("Connection Failed " . mysqli_connect_error());
}
?>