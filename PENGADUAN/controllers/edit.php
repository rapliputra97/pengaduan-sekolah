<?php
include '../models/pengaduan.php';

updateData($_POST);

header("Location: ../index.php");
?>