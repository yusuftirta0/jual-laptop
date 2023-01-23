<?php 
include "../koneksi.php";
include "../functions.php";
session_start();
if(!isset($_SESSION['login']) ||  $_SESSION['status'] != '2')
{
    header("Location:../404.html");
    exit;
}
$id = $_GET['id'];

$query = "DELETE FROM pembelian WHERE id = '$id'";
$hapus = mysqli_query($koneksi,$query);
if($hapus)
{   
    echo "
        <script>alert('Data Berhasil Dihapus');window.location.href = '../pembelian/pembelian.php';</script>
        ";
}
; ?>
