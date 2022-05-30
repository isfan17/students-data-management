<?php
/*
TUGAS MODUL 11 CRUD & SESSION
Nama : Isfan Adheltyo
NIM  : 205150407111044
*/
session_start();

if( isset($_SESSION["login"]) )
{
    header("Location: index.php");
    exit;
}

require 'functions.php';

if ( isset($_POST["login"]) )
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //CEK USERNAME ADA ATAU TIDAK DI DATABASE
    if( mysqli_num_rows($result) === 1 )
    {
        //CEK PASSWORD
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) )
        {
            //SET SESSION
            $_SESSION["login"] = true;

            //SET USER
            $_SESSION["user"] = $row["username"];

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style2.css">
</head>

<body>

<form action="" method="post">
    <div class="container">
        <h1 class="judul" id="judul-login">Login Admin Filkom</h1>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Masukkan Username" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Masukkan Password" name="password" id="password" required>

        <button type="submit" class="registerbtn" name="login">Login</button>
    </div>

    <?php if( isset($error) ) : ?>
        <p style="text-align: center; color: red; font-style: italic;">Username atau Password Salah!</p>
    <?php endif; ?>
  
    <div class="test">
        <p>Belum memiliki akun? <a href="register.php">Register</a>.</p>
    </div>
</form>

</body>

</html>