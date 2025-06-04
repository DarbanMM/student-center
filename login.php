<?php
    include 'koneksi.php';

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    $cek = mysqli_num_rows($result);

    if($cek > 0){
        $data = mysqli_fetch_assoc($result);

        if($data['level']=="mahasiswa"){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "mahasiswa";

            header("location:homeMahasiswa.php");
        }else{
            header("location:formLogin.php?pesan=gagal");
        }
    }else{
        header("location:formLogin.php?pesan=gagal");
    }

    if ($login_valid) { // Misalnya $login_valid mengecek keberhasilan login
        $_SESSION['username'] = $username; // Simpan username ke sesi
        header("Location: homeMahasiswa.php"); // Arahkan ke halaman home
        exit();
    }
?>