<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from user where username='$username' and password='$password' ";
$result = mysqli_query($koneksi,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);

if($rows == 1){
    // login berhasil
    session_start();
    $_SESSION['username'] = $username;
    header("Location: feed.php");
} else {
    // login gagal
    header("Location: index.php");
}

?>