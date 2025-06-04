<?php
    session_start();

    include 'koneksi.php';

    $query = "SELECT * FROM reservasi where id = '$_GET[id]'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Edit Reservasi</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <link rel="stylesheet" href="style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="center">
        <h1>Edit Reservasi</h1>
        <form action="editReservasi.php" method="POST">
            <div class="txt_field">
                <input type="text" name="nama" value="<?php echo $data['nama'];?>" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="text" name="asal" value="<?php echo $data['asal'];?>" required>
                <span></span>
                <label>Asal</label>
            </div>

            <div class="txt_field">
                <select name="fakultas" id="fakultas" class="form-select" aria-label="Default select example" required>
                    <option value="Adab dan Ilmu Budaya" <?php if($data['fakultas'] == 'Adab dan Ilmu Budaya') echo 'selected'; ?>>Adab dan Ilmu Budaya</option>
                    <option value="Dakwah dan Komunikasi" <?php if($data['fakultas'] == 'Dakwah dan Komunikasi') echo 'selected'; ?>>Dakwah dan Komunikasi</option>
                    <option value="Ilmu Tarbiyah dan Keguruan" <?php if($data['fakultas'] == 'Ilmu Tarbiyah dan Keguruan') echo 'selected'; ?>>Ilmu Tarbiyah dan Keguruan</option>
                    <option value="Syariah dan Hukum" <?php if($data['fakultas'] == 'Syariah dan Hukum') echo 'selected'; ?>>Syariah dan Hukum</option>
                    <option value="Ushuluddin dan Pemikiran Islam" <?php if($data['fakultas'] == 'Ushuluddin dan Pemikiran Islam') echo 'selected'; ?>>Ushuluddin dan Pemikiran Islam</option>
                    <option value="Sains dan Teknologi" <?php if($data['fakultas'] == 'Sains dan Teknologi') echo 'selected'; ?>>Sains dan Teknologi</option>
                    <option value="Ilmu Sosial dan Humaniora" <?php if($data['fakultas'] == 'Ilmu Sosial dan Humaniora') echo 'selected'; ?>>Ilmu Sosial dan Humaniora</option>
                    <option value="Ekonomi dan Bisnis Islam" <?php if($data['fakultas'] == 'Ekonomi dan Bisnis Islam') echo 'selected'; ?>>Ekonomi dan Bisnis Islam</option>
                    <option value="Lainnya" <?php if($data['fakultas'] == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                </select>
                <span></span>
            </div>

            <div class="txt_field">
                <input type="text" name="keperluan" value="<?php echo $data['keperluan'];?>" required>
                <span></span>
                <label>Keperluan</label>
            </div>

            <div class="txt_field">
                <select name="ruang" id="ruang" class="form-select" aria-label="Default select example" required>
                    <option value="Co-Working Space A" <?php if($data['ruang'] == 'Co-Working Space A') echo 'selected'; ?>>Co-Working Space A</option>
                    <option value="Co-Working Space B" <?php if($data['ruang'] == 'Co-Working Space B') echo 'selected'; ?>>Co-Working Space B</option>
                    <option value="Co-Working Space C" <?php if($data['ruang'] == 'Co-Working Space C') echo 'selected'; ?>>Co-Working Space C</option>
                    <option value="Co-Working Space D" <?php if($data['ruang'] == 'Co-Working Space D') echo 'selected'; ?>>Co-Working Space D</option>
                    <option value="Co-Working Space E" <?php if($data['ruang'] == 'Co-Working Space E') echo 'selected'; ?>>Co-Working Space E</option>
                    <option value="Co-Working Space F" <?php if($data['ruang'] == 'Co-Working Space F') echo 'selected'; ?>>Co-Working Space F</option>
                    <option value="Co-Working Space Timur" <?php if($data['ruang'] == 'Co-Working Space Timur') echo 'selected'; ?>>Co-Working Space Timur</option>
                </select>
                <input type="text" name="id" value="<?php echo $data['id'];?>" hidden required>
                <span></span>
            </div>

            <div class="txt_field">
                <input type="date" name="tanggal" value="<?php echo $data['tanggal'];?>" required>
                <span></span>
                <label>Tanggal</label>
            </div>

            <div class="txt_field">
                <input type="time" name="waktu" value="<?php echo $data['waktu'];?>" required>
                <span></span>
                <label>-- -- Waktu Mulai</label>
            </div>

            <div class="txt_field">
                <input type="time" name="waktu_selesai" value="<?php echo $data['waktu_selesai'];?>" required>
                <span></span>
                <label>-- -- Waktu Selesai</label>
            </div>

            <input type="submit" name="submit" value="Edit">
        </form>
        <form action="crudReservasi.php">
                <input type="submit" name="submit" value="Back">
        </form>
    </div>
    </body>
</html>
