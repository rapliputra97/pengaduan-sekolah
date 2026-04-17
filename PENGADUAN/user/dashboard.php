<?php
session_start();
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fafafa;
        }
        .card {
            border-radius: 15px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar bg-white border-bottom">
    <div class="container">
        <span class="fw-bold">Pengaduan App</span>
        <a href="../auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <a href="kirim_pengaduan.php" class="btn btn-primary mb-3">+ Buat Pengaduan</a>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM pengaduan");
    while($d = mysqli_fetch_array($data)){
    ?>
    
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5><?= $d['judul']; ?></h5>
            <p class="text-muted"><?= $d['deskripsi']; ?></p>

            <span class="badge bg-<?=
                $d['status']=='Pending'?'secondary':
                ($d['status']=='Proses'?'warning':'success');
            ?>">
                <?= $d['status']; ?>
            </span>
        </div>
    </div>

    <?php } ?>

</div>

</body>
</html>