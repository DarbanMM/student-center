<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test";

    // Buat koneksi
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // Select database
    if (!mysqli_select_db($conn, $database)) {
        die("Seleksi database gagal: " . mysqli_error($conn));
    }
?>