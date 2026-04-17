<?php
include '../models/pengaduan.php';

tambahData($_POST);

header("Location: ../index.php");
?>