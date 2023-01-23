<?php 
include "../koneksi.php";
include "../functions.php";
session_start();
if(!isset($_SESSION['login']) || $_SESSION['status'] != '1')
{
    header("Location:../404.html");
    exit;
}
$id = $_GET['id'];

$query = "DELETE FROM user WHERE id_user = '$id'";
$hapus = mysqli_query($koneksi,$query);
if($hapus)
{   
    echo "
        <script>alert('Data Berhasil Dihapus');window.location.href = '../petugas/petugas.php';</script>
        ";
}
; ?>
