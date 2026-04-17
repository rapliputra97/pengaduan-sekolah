<?php
include '../models/pengaduan.php';

$id = $_GET['id'];
hapusData($id);

header("Location: ../index.php");
?>