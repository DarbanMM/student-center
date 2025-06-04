<?php
    include "koneksi.php";

    session_start();

    $id = $_GET['id'];
    $query = "DELETE FROM login WHERE id = $id";
    $sql = mysqli_query($conn, $query);
    
    header("Location: crudUser.php");
?>