<?php
include '../models/pengaduan.php';
$d = getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-4">✏️ Edit Pengaduan</h3>

            <form action="../controllers/edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= $d['kelas'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?= $d['judul'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= $d['deskripsi'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="diproses" <?= $d['status']=='diproses'?'selected':'' ?>>Diproses</option>
                        <option value="selesai" <?= $d['status']=='selesai'?'selected':'' ?>>Selesai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="../index.php" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>