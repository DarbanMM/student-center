<?php
    session_start(); // Mulai session untuk mengambil pesan error
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tambah User</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    <div class="center">
        <h1>Tambah User</h1>

        <?php
            // Tampilkan notifikasi error jika ada
            if (isset($_SESSION['tambah_user_error'])) {
                echo '<div class="alert alert-danger" role="alert" style="margin: 0 40px;">' . htmlspecialchars($_SESSION['tambah_user_error']) . '</div>';
                unset($_SESSION['tambah_user_error']); // Hapus session setelah ditampilkan
            }
        ?>

        <form action="tambahUser.php" method="POST">
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label for="username">Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <div class="txt_field">
                <input type="text" name="nama" id="nama" required>
                <span></span>
                <label for="nama">Name</label>
            </div>

            <div class="txt_field">
                <select name="level" id="level" class="form-select" aria-label="Pilih Level" required style="padding-top: 10px; padding-bottom: 10px; height: auto;">
                    <option value="" disabled selected>Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
                </div>

            <input type="submit" name="submit" value="Tambah">
        </form>
        <form action="crudUser.php">
                <input type="submit" name="submit" value="Back">
        </form>
    </div>
    </body>
</html>