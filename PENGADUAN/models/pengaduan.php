<?php
include __DIR__ . '/../config/koneksi.php';

function getData() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM pengaduan");
}

function tambahData($data) {
    global $conn;
    return mysqli_query($conn, "INSERT INTO pengaduan 
    (nama, kelas, judul, deskripsi, status) 
    VALUES ('$data[nama]','$data[kelas]','$data[judul]','$data[deskripsi]','diproses')");
}

function getById($id) {
    global $conn;
    return mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengaduan WHERE id='$id'"));
}

function updateData($data) {
    global $conn;
    return mysqli_query($conn, "UPDATE pengaduan SET 
    nama='$data[nama]',
    kelas='$data[kelas]',
    judul='$data[judul]',
    deskripsi='$data[deskripsi]',
    status='$data[status]'
    WHERE id='$data[id]'");
}

function hapusData($id) {
    global $conn;
    return mysqli_query($conn, "DELETE FROM pengaduan WHERE id='$id'");
}
?>