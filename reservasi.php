<?php
    include 'koneksi.php'; //
    session_start(); //

    // Ambil data dari POST dan lakukan sanitasi dasar
    $name = mysqli_real_escape_string($conn, $_POST['nama']); //
    $asal = mysqli_real_escape_string($conn, $_POST['asal']); //
    $fakultas = mysqli_real_escape_string($conn, $_POST['fakultas']); //
    $keperluan = mysqli_real_escape_string($conn, $_POST['keperluan']); //
    $ruang = mysqli_real_escape_string($conn, $_POST['ruang']); //
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']); //
    $waktu_mulai = mysqli_real_escape_string($conn, $_POST['waktu']); //
    $waktu_selesai = mysqli_real_escape_string($conn, $_POST['waktu_selesai']); //

    // Validasi dasar: pastikan waktu selesai setelah waktu mulai
    if ($waktu_selesai <= $waktu_mulai) {
        $_SESSION['reservasi_error'] = "Waktu selesai reservasi harus setelah waktu mulai.";
        header("Location: halamanReservasi.php");
        exit();
    }

    // Query untuk mengecek tabrakan jadwal
    $check_sql = "SELECT * FROM reservasi 
                  WHERE ruang = '$ruang' 
                  AND tanggal = '$tanggal' 
                  AND (
                      ('$waktu_mulai' < waktu_selesai AND '$waktu_selesai' > waktu)
                  )";
    
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Ada tabrakan jadwal
        $_SESSION['reservasi_error'] = "Pada jam tersebut di ruang yang dipilih sudah ada yang melakukan reservasi.";
        header("Location: halamanReservasi.php");
        exit();
    } else {
        // Tidak ada tabrakan, lanjutkan proses insert
        $insert_sql = "INSERT INTO reservasi(nama, asal, fakultas, keperluan, ruang, tanggal, waktu, waktu_selesai) 
                       VALUES('$name', '$asal', '$fakultas', '$keperluan', '$ruang', '$tanggal', '$waktu_mulai', '$waktu_selesai')"; //

        if(mysqli_query($conn, $insert_sql)){ //
            $_SESSION['reservasi_success'] = "Reservasi berhasil dilakukan!";
        }else{
            // $_SESSION['reservasi_error'] = "Data gagal ditambahkan: " . mysqli_error($conn); // Detail error untuk debug
            $_SESSION['reservasi_error'] = "Terjadi kesalahan. Data gagal ditambahkan.";
        }
        header("Location: halamanReservasi.php"); //
        exit();
    }
?>