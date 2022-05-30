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

$id = $_GET["id"];

require 'functions.php';

if( deleteMhs($id) > 0 )
{
    echo 
    "
    <script>
        alert('Data Mahasiswa berhasil Dihapus');
        document.location.href = 'index.php';
    </script>
    ";
}
else
{
    echo 
    "
    <script>
        alert('Data Mahasiswa Gagal Dihapus');
        document.location.href = 'index.php';
    </script>
    ";
}