<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $user = mysqli_fetch_assoc($data);
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin'){
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #004AAD, #E3F2FD);
            height: 100vh;
        }
        .login-card {
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card login-card shadow-lg p-4" style="width: 380px;">
    
    <div class="text-center mb-3">
        <h3 class="fw-bold">Login</h3>
        <small class="text-muted">Aplikasi Pengaduan Sekolah</small>
    </div>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            
        </div>

        <button name="login" class="btn btn-primary w-100 fw-semibold">
            Login
        </button>
                <div class="text-center mt-3">
            <small>Belum punya akun? <a href="register.php">Daftar</a></small>
        </div>
    </form>

    <div class="text-center mt-3">
        <small class="text-muted">© 2026 - Project Ujikom RPL</small>
    </div>

</div>

</body>
</html>