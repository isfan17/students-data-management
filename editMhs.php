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

$id = $_GET["id"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id_mhs = $id")[0];

if( isset($_POST["submit"]) )
{
    //CEK APAKAH DATA BERHASIL DIUBAH ATAU TIDAK
    if(editMhs($_POST) > 0)
    {
        echo 
        "
        <script>
            alert('Data Mahasiswa Berhasil Diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else
    {
        echo 
        "
        <script>
            alert('Data Mahasiswa Tidak ada yang Diedit!');
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
    <title>Edit Data Mahasiswa</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">
    <!--JUDUL FORM-->
    <h1 class="judul-form">Form Edit Data Mahasiswa</h1>

    <!--FORM EDIT DATA MAHASISWA-->
    <form action="" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="id_mhs" id="id_mhs" value="<?= $mahasiswa["id_mhs"]; ?>"/>

        <!--NIM-->
        <div class="form-group">
            <label id="NIM-label" for="NIM">NIM</label>
            <input class="form-control" type="text" name="NIM" id="NIM" placeholder="Masukkan NIM Mahasiswa" required value="<?= $mahasiswa["NIM"]; ?>"/>
        </div>

        <!--NAMA-->
        <div class="form-group">
            <label id="nama-label" for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama Mahasiswa" required value="<?= $mahasiswa["nama"]; ?>"/>
        </div>

        <!--DEPARTEMEN-->
        <div class="form-group">
            <label for="departemen">Departemen</label>
            <input class="form-control" type="text" name="departemen" id="departemen" placeholder="Masukkan Departemen Mahasiswa" required value="<?= $mahasiswa["departemen"]; ?>"/>
        </div>

        <!--PRODI-->
        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input class="form-control" type="text" name="prodi" id="prodi" placeholder="Masukkan Program Studi Mahasiswa" required value="<?= $mahasiswa["prodi"]; ?>"/>
        </div>

        <!--FOTO-->
        <div class="form-group">
            <label id="foto-label" for="foto">Foto Mahasiswa</label>
            <img src="img/<?= $mahasiswa["foto"]; ?>" style="display: block;" width="60" height="100">
            <input class="form-control" type="file" name="foto" id="foto"/>
        </div>

        <!--SUBMIT BUTTON-->
        <div class="form-group">
            <button type="submit" name="submit" id="submit" class="submit-button" style="background-color: rgb(90, 190, 230);"> Ubah Data Mahasiswa </button>
        </div>
    </form>
</div>

</body>

</html>