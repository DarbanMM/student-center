<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tambah User</title>
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <link rel="stylesheet" href="style.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="center"> <h1>Tambah User</h1> <form action="tambahUser.php" method="POST"> <div class="txt_field"> <input type="text" name="username" id="username" required> <span></span> <label for="username">Username</label> </div>

            <div class="txt_field"> <input type="password" name="password" id="password" required> <span></span> <label for="password">Password</label> </div>

            <div class="txt_field"> <input type="text" name="nama" id="nama" required> <span></span> <label for="nama">Name</label> </div>

            <div class="txt_field"> <select name="level" id="level" class="form-select" aria-label="Pilih Level" required> <option value="" disabled selected>Pilih Level</option> <option value="admin">Admin</option> <option value="mahasiswa">Mahasiswa</option> </select>
                <span></span> </div>

            <input type="submit" name="submit" value="Tambah"> </form>
        <form action="crudUser.php"> <input type="submit" name="submit" value="Back"> </form>
    </div>
    </body>
</html>