<?php
include '../config/koneksi.php';

$id = $_GET['id'];

// Hapus data berdasarkan ID
mysqli_query($conn, "DELETE FROM pengaduan WHERE id='$id'");

// Kembali ke dashboard
header("Location: dashboard.php");
?>