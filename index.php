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

$mahasiswa = query("SELECT * FROM mahasiswa");
$rowcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mahasiswa"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="judul">
        <!-- JUDUL -->
        <h1>PENDATAAN MAHASISWA FILKOM</h1>
        <p>Selamat datang, admin <?= $_SESSION["user"]; ?>! <a  href="logout.php">Logout</a> </p>

        <!-- ADD MAHASISWA -->
        <a class="btn-add" href="addMhs.php">Tambah Mahasiswa</a>
    </div>

    <?php if($rowcount !== 0 ) : ?>
    <!-- TABEL DATA MAHASISWA -->
    <table class="tabel" border="1" cellpadding="15" cellspacing="0">   

        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>ID <br> Mahasiswa</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="img/<?= $row["foto"]; ?>" style="display: block;" width="60" height="100"></td>
            <td><?= $row["id_mhs"]; ?></td>
            <td><?= $row["NIM"]; ?></td>
            <td><?= $row["nama"]; ?> <?php $nama = $row["nama"]; ?></td> 
            <td><?= $row["departemen"]; ?></td>
            <td><?= $row["prodi"]; ?></td>
            <td>
                <button class="act-btn" id="btn-edit">
                    <a style="text-decoration: none; color: black;" href="editMhs.php?id=<?= $row["id_mhs"]; ?>">Edit</a>
                </button>

                <button class="act-btn" id="btn-delete">
                    <a style="text-decoration: none; color: black;" href="deleteMhs.php?id=<?= $row["id_mhs"]; ?>" onclick="return confirm('Yakin ingin menghapus <?= $nama ?> ?')">Hapus</a>
                </button>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    
</body>

</html>