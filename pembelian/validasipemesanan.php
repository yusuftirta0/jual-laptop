
<?php 
session_start();
if(!isset($_SESSION['login']) ||  $_SESSION['status'] != '2')
{
    header("Location:../404.html");
    exit;
}
require '../asset/headeradmin.php';
require '../asset/sidebaradmin.php';
require '../asset/topbar.php';
require '../koneksi.php';
require '../functions.php';

$id = $_GET['id'];
$query = "SELECT *,laptop.jenis_laptop FROM pembelian 
          INNER JOIN laptop ON pembelian.id_laptop = laptop.id_laptop WHERE id = '$id'";
$result = mysqli_query($koneksi,$query);

if(isset($_POST['submit']))
{
    if(validasipemesanan($_POST))
    {
        echo "
        <script>alert('Data Berhasil Diedit');window.location.href = '../pembelian/pembelian.php';</script>
        ";
    }
}


 ?>


       

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Validasi Pemesanan</h1>
    <!-- Content Row -->
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <form  action="" method="post" enctype="multipart/form-data">
        <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $row['id'] ; ?>">
                <input type="hidden" name="idlap" value="<?= $row['id_laptop'] ; ?>">
                <input type="hidden" name="tanggal" value="<?= $row['tanggal'] ; ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis laptop</label>
                    <input readonly  required type="text" name="total" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['jenis_laptop'] ; ?>/ <?= $row['harga'] ; ?>">
                 </div>
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Total Harga</label>
                    <input   required type="text" name="total" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['total_harga'] ; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Email Pembeli</label>
                <input readonly  required type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?= $row['nama_pembeli'] ; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Beli</label>
                <input readonly required type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['jumlah'] ; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </div>
</div>   
        </form>  

    <?php endwhile ; ?>
                 
                    

</div>
<!-- /.container-fluid -->
</div>

      
<?php 

require '../asset/footeradmin.php';?>