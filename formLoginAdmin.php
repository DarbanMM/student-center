<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logoSCShort.png" type="image/gif">
        <title>Student Center | Login Admin</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <div class="center">
        <h1>Login Admin</h1>
        <form action="loginAdmin.php" method="POST">
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

            <input type="submit" name="submit" value="Login">

            <div class="signup_link">
                
            <b><a href="index.php" class="btn">Kembali</a></b>
        </form>
    </div>
    </body>
</html>