<?php
    include 'koneksi.php'; //

    session_start(); //

    $username = $_POST['username']; //
    $password = $_POST['password']; //

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'"; //

    $result = mysqli_query($conn, $sql); //

    $cek = mysqli_num_rows($result); //

    if($cek > 0){ //
        $data = mysqli_fetch_assoc($result); //

        if($data['level']=="mahasiswa"){ //
            $_SESSION['username'] = $username; //
            $_SESSION['nama'] = $data['nama']; // Tambahkan baris ini untuk menyimpan nama
            $_SESSION['level'] = "mahasiswa"; //

            header("location:homeMahasiswa.php"); //
        }else{
            // Jika level bukan mahasiswa, mungkin admin atau lainnya.
            // Pertimbangkan untuk menangani login admin secara terpisah jika ada $_SESSION['nama'] untuk admin juga.
            // Atau jika admin tidak memerlukan $_SESSION['nama'] dengan cara yang sama, biarkan seperti ini.
            header("location:formLogin.php?pesan=gagal"); //
        }
    }else{
        header("location:formLogin.php?pesan=gagal"); //
    }

    // Bagian ini tampaknya redundan atau mungkin sisa dari kode sebelumnya,
    // karena logika header sudah ada di dalam blok if($cek > 0).
    // if ($login_valid) { // Misalnya $login_valid mengecek keberhasilan login //
    //     $_SESSION['username'] = $username; // Simpan username ke sesi //
    //     header("Location: homeMahasiswa.php"); // Arahkan ke halaman home //
    //     exit(); //
    // }
?>