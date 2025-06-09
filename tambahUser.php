<?php
    session_start();
    include 'koneksi.php';

    // Ambil data dari POST dan lakukan sanitasi
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);

    // 1. Cek apakah username sudah ada
    $check_sql = "SELECT username FROM login WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // 2. Jika sudah ada, jangan insert dan kirim pesan error kembali
        $_SESSION['tambah_user_error'] = "Gagal menambahkan: Username '$username' sudah terdaftar.";
        header("Location: tambahForm.php");
        exit();
    }

    // 3. Jika belum ada, lakukan INSERT
    $sql = "INSERT INTO login(username, password, nama, level) VALUES('$username', '$password', '$nama', '$level')";

    if(mysqli_query($conn, $sql)){
        // Set pesan sukses untuk ditampilkan di crudUser.php
        $_SESSION['csv_import_message'] = "Pengguna '$username' berhasil ditambahkan.";
        $_SESSION['csv_import_message_type'] = 'success';
    }else{
        // Set pesan error untuk ditampilkan di crudUser.php
        $_SESSION['csv_import_message'] = "Terjadi kesalahan. Data gagal ditambahkan.";
        $_SESSION['csv_import_message_type'] = 'error';
    }

    header("Location: crudUser.php");
    exit();
?>