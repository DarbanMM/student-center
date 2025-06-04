<?php

    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];

    $sql = "INSERT INTO login(username, password, nama, level) VALUES('$username', '$password', '$nama', '$level')";

    if(mysqli_query($conn, $sql)){
        echo "Data berhasil ditambahkan <br>";
    }else{
        echo "Data gagal ditambahkan<br>";
    }

    header("Location: crudUser.php");
?>