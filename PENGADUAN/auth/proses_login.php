<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = mysqli_fetch_array($data);

if ($user) {
    $_SESSION['login'] = true;
    $_SESSION['role'] = $user['role'];
    
    header("Location: ../index.php");
} else {
    echo "Login gagal!";
}
?>