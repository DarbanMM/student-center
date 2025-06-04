<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> Student Center | Form Reservasi</title>
     <!-- Favicons -->
     <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('./assets/img/bgReservasi.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>Reservasi</h1>
        <form action="reservasi.php" method="post" onsubmit="showAlert()">
            <div class="txt_field">
                <input type="text" name="nama" required>
                <span></span>
                <label>Nama Lengkap</label>
            </div>

            <div class="txt_field">
                <input type="text" name="asal" required>
                <span></span>
                <label>Asal: Umum, SCIT, HMPS Informatika, dsb</label>
            </div>

            <select name="fakultas" id="fakultas" class="form-select" aria-label="Default select example">
                <option value="Adab dan Ilmu Budaya">Adab dan Ilmu Budaya</option>
                <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                <option value="Ilmu Tarbiyah dan Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                <option value="Ushuluddin dan Pemikiran Islam">Ushuluddin dan Pemikiran Islam</option>
                <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                <option value="Ilmu Sosial dan Humaniora">Ilmu Sosial dan Humaniora</option>
                <option value="Ekonomi dan Bisnis Islam">Ekonomi dan Bisnis Islam</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <div class="txt_field">
                <input type="text" name="keperluan" required>
                <span></span>
                <label>Keperluan</label>
            </div>

            <select name="ruang" id="ruang" class="form-select" aria-label="Default select example">
                <option value="Co-Working Space A">Co-Working Space A</option>
                <option value="Co-Working Space B">Co-Working Space B</option>
                <option value="Co-Working Space C">Co-Working Space C</option>
                <option value="Co-Working Space D">Co-Working Space D</option>
                <option value="Co-Working Space E">Co-Working Space E</option>
                <option value="Co-Working Space F">Co-Working Space F</option>
                <option value="Co-Working Space Timur">Co-Working Space Timur</option>
            </select>

            <div class="txt_field">
                <input type="date" name="tanggal" required>
                <span></span>
            </div>

            <div class="txt_field">
                <label>-- -- Mulai dari</label>
                <input type="time" name="waktu" required oninput="toggleLabel(this)">
                <span></span>
            </div>
            
            <div class="txt_field">
                <label>-- -- Sampai Dengan</label>
                <input type="time" name="waktu_selesai" required oninput="toggleLabel(this)">
                <span></span>
            </div>

            <input type="submit" name="submit" value="Tambah">
        </form>
        <form action="tampil.php">
            <input type="submit" name="submit" value="Cetak Bukti">
        </form>
        <form action="homeMahasiswa.php">
            <input type="submit" name="submit" value="Kembali">
        </form>

        <script>
            function showAlert() {
                alert("Reservasi berhasil dilakukan!");
            }

            function toggleLabel(input) {
                const label = input.previousElementSibling; // Get the label before the input
                if (input.value) {
                    label.style.display = 'none';
                    } else {
                        label.style.display = 'block';
                    }
            }
        </script>
    </div>
</body>

</html>