<?php
/*
TUGAS MODUL 11 CRUD & SESSION
Nama : Isfan Adheltyo
NIM  : 205150407111044
*/

require 'functions.php';

if( isset($_POST["register"]) )
{
    if( register($_POST) > 0 )
    {
        echo
        "
            <script>
                alert('Akun Berhasil Dibuat!');
                document.location.href = 'login.php';
            </script>
        ";
    }
    else
    {
        echo mysqli_error($conn);
    }    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style2.css">
</head>

<body>

<form action="" method="post">
    <div class="container">
        <h1 class="judul">Registrasi Admin Filkom</h1>
        <p class="judul" id="subjudul">Isi form dibawah ini untuk membuat akun admin</p>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Masukkan Username" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Masukkan Password" name="password" id="password" required>

        <label for="password2"><b>Konfirmasi Password</b></label>
        <input type="password" placeholder="Masukkan Password Ulang" name="password2" id="password2" required>

        <button type="submit" name="register" class="registerbtn">Register</button>

        <div class="test">
            <p>Sudah memiliki akun? <a href="login.php">Login</a>.</p>
        </div>
    </div>
</form>

</body>

</html>