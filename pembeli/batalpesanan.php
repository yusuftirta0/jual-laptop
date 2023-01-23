<?php 
include "../koneksi.php";
include "../functions.php";
session_start();
if(!isset($_SESSION['login']) ||  $_SESSION['status'] != '3')
{
    header("Location:../404.html");
    exit;
}
$id = $_GET['id'];

$query = "DELETE FROM pembelian WHERE id = '$id' AND status = '0'";
$hapus = mysqli_query($koneksi,$query);
if($hapus)
{   
    echo "
        <script>alert('Pesanan Dibatalkan');window.location.href = '../pembeli/laptop.php';</script>
        ";
}
echo "
<script>alert('Gagal Menghapus Pesanan');window.location.href = '../pembeli/laptop.php';</script>
";
; ?>
