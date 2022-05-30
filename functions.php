<?php
/*
TUGAS MODUL 11 CRUD & SESSION
Nama : Isfan Adheltyo
NIM  : 205150407111044
*/

//KONEKSI KE DATABASE
$conn = mysqli_connect("localhost", "root", "", "pw_modul11");

//REGISTER
function register($data) {
    global $conn;

    $username =  $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];

    //CEK APAKAH USERNAME SUDAH ADA
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) )
    {
        echo
        "
        <script>
            alert('Username Sudah Terpakai!');
        </script>
        ";
        return false;
    }

    //CEK KONFIRMASI PASSWORD
    if($password !== $password2)
    {
        echo
        "
            <script>
                alert('Password Konfirmasi Tidak Sesuai!');
            </script>
        ";
        return false;
    }

    //ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    //TAMBAHKAN DATA KE DATABASE
    mysqli_query($conn, "INSERT INTO admin VALUES ('', '$username', '$password')");
    
    return mysqli_affected_rows($conn);
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    
    while( $row = mysqli_fetch_assoc($result) )
    {
        $rows[] = $row;
    }

    return $rows;
}

//FUNCTION UNTUK MENGUPLOAD FOTO MAHASISWA
function upload(){
    if ( $_FILES['foto']['name'] == '')
    {
        return 'default.JPEG';
    }
    else
    {
        $namaFile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];

        //cek apakah file yang diupload adalah file gambar
        $tipeFileValid = ['jpg', 'jpeg', 'png'];
        $tipeFile = explode('.', $namaFile);
        $tipeFile = strtolower( end($tipeFile) );
        
        if(!in_array($tipeFile, $tipeFileValid))
        {
            echo
            "
                <script>
                    alert('Tipe File Foto Tidak Sesuai!');
                </script>
            ";
            return false;
        }

        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $tipeFile;

        //lolos pengecekkan, gambar siap diupload
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }
}

//FUNCTION UNTUK MENAMBAHKAN DATA MAHASISWA BARU
function addMhs($data) {
    global $conn;
    
    $NIM = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["nama"]);
    $departemen = htmlspecialchars($data["departemen"]);
    $prodi = htmlspecialchars($data["prodi"]);

    //UPLOAD FOTO
    $foto = upload();

    $query = "INSERT INTO mahasiswa VALUES ('', '$NIM', '$nama', '$departemen', '$prodi', '$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//FUNCTION UNTUK MENGHAPUS DATA MAHASISWA TERTENTU
function deleteMhs($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs = $id");

    return mysqli_affected_rows($conn);
}

function editMhs($data) {
    global $conn;
    
    $id_mhs = $data["id_mhs"];
    $NIM = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["nama"]);
    $departemen = htmlspecialchars($data["departemen"]);
    $prodi = htmlspecialchars($data["prodi"]);

    //UPLOAD FOTO
    $foto = upload();

    $query = "UPDATE mahasiswa SET 
                NIM = '$NIM',
                nama = '$nama',
                departemen = '$departemen',
                prodi = '$prodi'
                WHERE id_mhs = $id_mhs
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}