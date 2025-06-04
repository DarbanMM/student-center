<?php
    include 'koneksi.php';

    session_start();

    $name = $_POST['nama'];
    $asal = $_POST['asal'];
    $fakultas = $_POST['fakultas'];
    $keperluan = $_POST['keperluan'];
    $ruang = $_POST['ruang'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $waktu_selesai = $_POST['waktu_selesai'];
    
    
    
    

    $sql = "INSERT INTO reservasi(nama, asal, fakultas, keperluan, ruang, tanggal, waktu, waktu_selesai) VALUES('$name', '$asal', '$fakultas', '$keperluan', '$ruang', '$tanggal', '$waktu', '$waktu_selesai')";

    if(mysqli_query($conn, $sql)){
        echo "Data berhasil ditambahkan <br>";
    }else{
        echo "Data gagal ditambahkan<br>";
    }

    header("Location: halamanReservasi.php");
