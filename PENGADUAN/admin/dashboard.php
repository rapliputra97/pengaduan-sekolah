<?php
session_start();
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #E3F2FD;
        }
        .card {
            border-radius: 15px;
        }
        .foto {
            max-width: 120px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar bg-dark">
    <div class="container" >
        <span class="text-white fw-bold">Admin Panel</span>
        <a href="../auth/logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <h4 class="mb-3">Data Pengaduan</h4>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id DESC");
    while($d = mysqli_fetch_array($data)){
    ?>

    <div class="card mb-3 shadow-sm">
        <div class="card-body">

          
            <h5 class="fw-bold"><?= $d['judul']; ?></h5>

            
            <p class="mb-1"><b>Nama:</b> <?= $d['nama']; ?></p>
            <p class="mb-1"><b>Kelas:</b> <?= $d['kelas']; ?></p>
            <p class="mb-1"><b>Tanggal:</b> <?= $d['tanggal_pengaduan']; ?></p>
            <p class="mb-1"><b>Lokasi:</b> <?= $d['lokasi']; ?></p>

            
            <p class="mt-2"><b>Deskripsi:</b><br><?= $d['deskripsi']; ?></p>

            
            <p><b>Dampak:</b><br><?= $d['dampak']; ?></p>

            
            <?php if($d['foto'] != ""){ ?>
                <img src="../uploads/<?= $d['foto']; ?>" class="foto mb-2">
            <?php } ?>

            
            <br>
            <span class="badge bg-info"><?= $d['status']; ?></span>

            
            <div class="mt-3">
                <a href="edit_status.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </div>

        </div>
    </div>

    <?php } ?>

</div>

</body>
</html>