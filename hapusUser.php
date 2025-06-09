<?php
    include "koneksi.php";

    session_start();

    $id = $_GET['username'];
    $query = "DELETE FROM login WHERE username = $username";
    $sql = mysqli_query($conn, $query);
    
    header("Location: crudUser.php");
?>