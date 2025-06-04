<?php
        include 'koneksi.php';

        $name = $_POST['nama'];
        $asal = $_POST['asal'];
        $fakultas = $_POST['fakultas'];
        $keperluan = $_POST['keperluan'];
        $ruang = $_POST['ruang'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $waktu_selesai = $_POST['waktu_selesai'];

        var_dump($_POST);
        $query = "UPDATE reservasi SET nama = '$name', asal = '$asal', fakultas = '$fakultas', keperluan = '$keperluan', ruang = '$ruang', tanggal = '$tanggal', waktu = '$waktu', waktu_selesai = '$waktu_selesai' where id = $_POST[id]";
        echo $query;
        $sql = mysqli_query($conn, $query);

        header("Location: crudReservasi.php");
?>