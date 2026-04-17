<?php
include '../config/koneksi.php';

if(isset($_POST['kirim'])){

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal_pengaduan'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $dampak = $_POST['dampak'];

    $nama_file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if($nama_file != ""){
        move_uploaded_file($tmp, "../uploads/" . $nama_file);
    }

    mysqli_query($conn, "INSERT INTO pengaduan 
    (nama, kelas, judul, tanggal_pengaduan, lokasi, deskripsi, dampak, foto) 
    VALUES 
    ('$nama','$kelas','$judul','$tanggal','$lokasi','$deskripsi','$dampak','$nama_file')");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kirim Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Form Pengaduan
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Tanggal Pengaduan</label>
                    <input type="date" name="tanggal_pengaduan" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Lokasi Sarpras</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Jenis SarPras</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>

                <div class="mb-2">
                    <label>Dampak</label>
                    <textarea name="dampak" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button name="kirim" class="btn btn-success">Kirim</button>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

</div>

</body>
</html>