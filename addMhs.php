<?php
/*
TUGAS MODUL 11 CRUD & SESSION
Nama : Isfan Adheltyo
NIM  : 205150407111044
*/
session_start();

if( !isset($_SESSION["login"]) )
{
    header("Location: login.php");
    exit;
}

require 'functions.php';

if( isset($_POST["submit"]) )
{
    //CEK APAKAH DATA BERHASIL DITAMBAHKAN ATAU TIDAK
    if(addMhs($_POST) > 0)
    {
        echo 
        "
        <script>
            alert('Data Mahasiswa Baru Berhasil Ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else
    {
        echo 
        "
        <script>
            alert('Data Mahasiswa Baru Gagal Ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">
    <!--JUDUL FORM-->
    <h1 class="judul-form">Form Tambah Mahasiswa</h1>

    <!--FORM TAMBAH MAHASISWA-->
    <form action="" method="post" enctype="multipart/form-data">
        
        <!--NIM-->
        <div class="form-group">
            <label id="NIM-label" for="NIM">NIM</label>
            <input class="form-control" type="text" name="NIM" id="NIM" placeholder="Masukkan NIM Mahasiswa" required/>
        </div>

        <!--NAMA-->
        <div class="form-group">
            <label id="nama-label" for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama Mahasiswa" required/>
        </div>

        <!--DEPARTEMEN-->
        <div class="form-group">
            <label for="departemen">Departemen</label>
            <input class="form-control" type="text" name="departemen" id="departemen" placeholder="Masukkan Departemen Mahasiswa" required/>
        </div>

        <!--PRODI-->
        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input class="form-control" type="text" name="prodi" id="prodi" placeholder="Masukkan Program Studi Mahasiswa" required/>
        </div>

        <!--FOTO-->
        <div class="form-group">
            <label id="foto-label" for="foto">Foto Mahasiswa</label>
            <input class="form-control" type="file" name="foto" id="foto"/>
        </div>

        <!--SUBMIT BUTTON-->
        <div class="form-group">
            <button type="submit" name="submit" id="submit" class="submit-button"> Tambah Mahasiswa </button>
        </div>
    </form>
</div>

</body>

</html>