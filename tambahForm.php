<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tambah User</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <link rel="shortcut icon" href="assets/img/logoRRR.png" type="image/gif">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <div class="center">
        <h1>Tambah User</h1>
        <form action="tambahUser.php" method="POST">
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="txt_field">
                <input type="text" name="nama" required>
                <span></span>
                <label>Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="level" required>
                <span></span>
                <label>level</label>
            </div>

            <input type="submit" name="submit" value="Tambah">
        </form>
        <form action="crudUser.php">
                <input type="submit" name="submit" value="Back">
        </form>
    </div>
    </body>
</html>