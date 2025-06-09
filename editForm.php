<?php
    session_start();

    include 'koneksi.php';

    // (Disarankan) Menambahkan pengecekan dan sanitasi input
    if (!isset($_GET['username']) || empty($_GET['username'])) {
        die("Error: Username tidak valid atau tidak ditemukan.");
    }
    $username_to_edit = mysqli_real_escape_string($conn, $_GET['username']);
    $query = "SELECT * FROM login WHERE username = '$username_to_edit'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);
    if (!$data) {
        die("Error: Pengguna dengan username '" . htmlspecialchars($username_to_edit) . "' tidak ditemukan di database.");
    }
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Edit Data</title>
        <link rel="stylesheet" href="style.css"> </head>

    <body>
    <div class="center">
        <h1>Edit Data</h1>
        <form action="editUser.php" method="POST">
            <div class="txt_field">
                <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']);?>" required readonly>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" value="<?php echo htmlspecialchars($data['password']);?>" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="txt_field">
                <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']);?>" required>
                <span></span>
                <label>Name</label>
            </div>

            <div class="txt_field">
                <select name="level" id="level" required style="width: 100%; height: 40px; padding: 0 5px; font-size: 16px; border: none; background: none; outline: none;">
                    <option value="admin" <?php if(isset($data['level']) && $data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="mahasiswa" <?php if(isset($data['level']) && $data['level'] == 'mahasiswa') echo 'selected'; ?>>Mahasiswa</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Edit">
        </form>
        <form action="crudUser.php">
                <input type="submit" name="submit" value="Back">
        </form>
    </div>
    </body>
</html>