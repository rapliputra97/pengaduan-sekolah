<?php
include '../config/koneksi.php';
$id = $_GET['id'];

if(isset($_POST['update'])){
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE pengaduan SET status='$status' WHERE id='$id'");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning">
            Edit Status
        </div>

        <div class="card-body">
            <form method="POST">
                <select name="status" class="form-control mb-3">
                    <option>Pending</option>
                    <option>Proses</option>
                    <option>Selesai</option>
                </select>

                <button name="update" class="btn btn-success">Update</button>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>