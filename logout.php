<?php
/*
TUGAS MODUL 11 CRUD & SESSION
Nama : Isfan Adheltyo
NIM  : 205150407111044
*/

session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>