<?php
    session_start(); // Memulai session di awal file

    // Mengambil nama pengguna dari session
    if (isset($_SESSION['nama'])) {
        $nama_pengguna = $_SESSION['nama'];
    } else {
        $nama_pengguna = ''; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Student Center | Form Reservasi</title>
    <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif"> <link rel="stylesheet" href="style.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> <style> /* */
        body {
            background-image: url('./assets/img/bgReservasi.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* Tambahkan style untuk alert agar lebih terlihat jika perlu */
        .alert {
            margin-top: 15px; /* Atur posisi alert */
        }
    </style>
</head>

<body>
    <div class="center"> <h1>Form Reservasi</h1> <?php
            // Tampilkan notifikasi error jika ada
            if (isset($_SESSION['reservasi_error'])) {
                echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['reservasi_error']) . '</div>';
                unset($_SESSION['reservasi_error']); // Hapus session setelah ditampilkan
            }

            // Tampilkan notifikasi sukses jika ada
            if (isset($_SESSION['reservasi_success'])) {
                echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_SESSION['reservasi_success']) . '</div>';
                unset($_SESSION['reservasi_success']); // Hapus session setelah ditampilkan
            }
        ?>

        <form action="reservasi.php" method="POST"> <div class="txt_field"> <input type="text" name="nama" value="<?php echo htmlspecialchars($nama_pengguna); ?>" required readonly>
                <span></span></div>

            <div class="txt_field"> <input type="text" name="asal" required> <span></span> <label>Asal Instansi / Organisasi</label> </div>

            <select class="form-select mt-4" aria-label="Default select example" name="fakultas"> <option selected disabled value="">Pilih Fakultas / Unit</option> <option value="Adab dan Ilmu Budaya">Adab dan Ilmu Budaya</option> <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option> <option value="Ekonomi dan Bisnis Islam">Ekonomi dan Bisnis Islam</option> <option value="Febi">Febi</option> <option value="Ilmu Sosial dan Humaniora">Ilmu Sosial dan Humaniora</option> <option value="Pascasarjana">Pascasarjana</option> <option value="Sains dan Teknologi">Sains dan Teknologi</option> <option value="Syari'ah dan Hukum">Syari'ah dan Hukum</option> <option value="Tarbiyah dan Ilmu Keguruan">Tarbiyah dan Ilmu Keguruan</option> <option value="Ushuluddin dan Pemikiran Islam">Ushuluddin dan Pemikiran Islam</option> <option value="Lainnya">Lainnya</option> </select>

            <div class="txt_field"> <input type="text" name="keperluan" required> <span></span> <label>Keperluan</label> </div>

            <select class="form-select mt-4" aria-label="Default select example" name="ruang"> <option selected disabled value="">Pilih Ruangan</option> <option value="Co-Working Space A">Co-Working Space A</option> <option value="Co-Working Space B">Co-Working Space B</option> <option value="Co-Working Space C">Co-Working Space C</option> <option value="Co-Working Space D">Co-Working Space D</option> <option value="Co-Working Space E">Co-Working Space E</option> <option value="Co-Working Space F">Co-Working Space F</option> <option value="Co-Working Space Timur">Co-Working Space Timur</option> </select>

            <div class="txt_field"> <input type="date" name="tanggal" required> <span></span> </div>

            <div class="txt_field"> <label>-- -- Mulai dari</label> <input type="time" name="waktu" required oninput="toggleLabel(this)"> <span></span> </div>
            
            <div class="txt_field"> <label>-- -- Sampai Dengan</label> <input type="time" name="waktu_selesai" required oninput="toggleLabel(this)"> <span></span> </div>

            <input type="submit" name="submit" value="Tambah"> </form>
        <form action="tampil.php"> <input type="submit" name="submit" value="Cetak Bukti"> </form>
        <form action="homeMahasiswa.php"> <input type="submit" name="submit" value="Kembali"> </form>

        <script> /* */
            // Fungsi showAlert() tidak lagi dipanggil dari onsubmit form, 
            // karena notifikasi ditangani dari server.
            // Anda bisa menghapus fungsi showAlert jika tidak digunakan di tempat lain.
            // function showAlert() {
            //     alert("Reservasi berhasil dilakukan!");
            // }

            function toggleLabel(input) { //
                const label = input.previousElementSibling; //
                if (input.value) { //
                    label.style.display = 'none'; //
                    } else { //
                        label.style.display = 'block'; //
                    } //
            }
        </script>
    </div>
</body>

</html>