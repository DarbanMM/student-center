<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Halaman Reservasi</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <div class="center">
        <h1>Reservasi</h1>
        <form action="login.php" method="POST">
            <div class="txt_field">
            <input type="text" class="form-control" id="nama" name="nama" required>
                <span></span>
                <label>Nama:</label>
            </div>

            <div class="txt_field">
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                <span></span>
            </div>

            <div class="txt_field">
                <input type="time" class="form-control" id="waktu" name="waktu" required>
                <span></span>
            </div>

            <div class="txt_field">
            <input type="text" class="form-control" id="ruang" name="ruang" required>
                <span></span>
                <label>Ruang:</label>
            </div>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
    </body>
</html>