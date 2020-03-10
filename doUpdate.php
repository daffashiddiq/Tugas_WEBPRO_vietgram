<?php
include 'koneksi.php';

$name = $_POST['nama'];
$username = $_SESSION['username'];
$website = $_POST['website'];
$bio = $_POST['bio'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

$query = "UPDATE profile SET name = '$name', website = '$website', bio = '$bio', email = '$email', phone_number = '$phone', gender = $gender WHERE username = '$username'";
$result = mysqli_query($koneksi,$query) or die(mysql_error());
header("Location: profile.php");
?>