<?php
    session_start();

    include 'koneksi.php';

    $query = "SELECT * FROM login where id = '$_GET[id]'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Edit Data</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <div class="center">
        <h1>Edit Data</h1>
        <form action="editUser.php" method="POST">
            <div class="txt_field">
                <input type="text" name="username" value="<?php echo $data['username'];?>" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" value="<?php echo $data['password'];?>" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="txt_field">
                <input type="text" name="nama" value="<?php echo $data['nama'];?>" required>
                <span></span>
                <label>Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="level" value="<?php echo $data['level'];?>" required>
                <input type="text" name="id" value="<?php echo $data['id'];?>" hidden required>
                <span></span>
                <label>level</label>
            </div>

            <input type="submit" name="submit" value="Edit">
        </form>
        <form action="crudUser.php">
                <input type="submit" name="submit" value="Back">
        </form>
    </div>
    </body>
</html>