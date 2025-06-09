<?php
        include 'koneksi.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];

        var_dump($_POST);
        $query = "UPDATE login SET username = '$username', password = '$password', nama = '$nama', level = '$level' where username = $_POST[username]";
        echo $query;
        $sql = mysqli_query($conn, $query);

        header("Location: crudUser.php");
?>