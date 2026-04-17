<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}

include 'models/pengaduan.php';
$data = getData();
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pengaduan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .card {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">Sistem Pengaduan</span>

    <div class="text-white">
        <?= $_SESSION['role']; ?> |
        <a href="auth/logout.php" class="btn btn-light btn-sm ms-2">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    <!-- INFO -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5>Total Pengaduan</h5>
                    <h3><?= $total ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD TABLE -->
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
    <h5>Data Pengaduan</h5>

    <?php if($_SESSION['role'] == 'user') { ?>
        <a href="views/tambah.php" class="btn btn-primary btn-sm">
            + Tambah Pengaduan
        </a>
    <?php } ?>

</div>

            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1; while($d=mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                      <td><?= $d['nama'] ?? '-' ?></td>
                    <td><?= $d['kelas'] ?? '-' ?></td>
                        <td><?= $d['judul'] ?? '-' ?></td>

                        <td>
                            <?php if ($d['status'] == 'diproses') { ?>
                                <span class="badge bg-warning text-dark">Diproses</span>
                            <?php } else { ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php } ?>
                        </td>

                        <td>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
                                <a href="views/edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="controllers/hapus.php?id=<?= $d['id'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin?')">Hapus</a>
                            <?php } else { ?>
                                <span class="text-muted">-</span>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>