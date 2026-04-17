<?php
include '../config/koneksi.php';

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = "user"; // default user

    // cek username sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username','$password','$role')");
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #E3F2FD , #004AAD);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow-lg p-4" style="width: 380px;">
    <h3 class="text-center mb-3">Register</h3>

    <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>

        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
        </div>

        <button name="daftar" class="btn btn-success w-100">Daftar</button>
    </form>

    <div class="text-center mt-3">
        <small>Sudah punya akun? <a href="login.php">Login</a></small>
    </div>
</div>

<script>
function togglePassword() {
    var pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>