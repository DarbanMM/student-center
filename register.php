<?php
    include 'koneksi.php';

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['rePassword'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $rePassword = Validate($_POST['rePassword']);
        $name = Validate($_POST['name']);

        $user_data = 'username=' .$username. '&name=' .$name;

        if(empty($username)){
            header("Location: formRegister.php? error = Username is required&$user_data");
            exit();
        }else if(empty($password)){
            header("Location: formRegister.php? error = Password is required&$user_data");
            exit();
        }else if(empty($rePassword)){
            header("Location: formRegister.php? error = rePassword is required&$user_data");
            exit();
        }else if(empty($name)){
            header("Location: formRegister.php? error = Name is required&$user_data");
            exit();
        }else if($password != $rePassword){
            header("Location: formRegister.php? error = Password not match&$user_data");
            exit();
        }
        else{

            $sql = "SELECT * FROM login WHERE username = '$username'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                exit();
            }else{
                $sql2 = "INSERT INTO login(username, password, nama) VALUES('$username','$password','$name')";
                $result2 = mysqli_query($conn, $sql2);

                if($result2){
                    header("Location: formRegister.php? success = Your account is being validate");
                    exit();
                }else{
                    header("Location: formRegister.php? error = Unknow error occurred&$user_data");
                    exit();
                }
            }
        }
    }else{
        header("Location: formRegister.php");
        exit();
    }
?>