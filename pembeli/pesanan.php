
<?php 
session_start();
if(!isset($_SESSION['login']) ||  $_SESSION['status'] != '3')
{
    header("Location:../404.html");
    exit;
}
require '../asset/headeradmin.php';
require '../asset/sidebaradmin.php';
require '../asset/topbar.php';
require '../koneksi.php';
$email = $_SESSION['email'];
$query = "SELECT * FROM pembelian
JOIN laptop ON pembelian.id_laptop = laptop.id_laptop 
WHERE pembelian.nama_pembeli = '$email'";
$result = mysqli_query($koneksi,$query);
 ?>


       

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pesanan</h1>
    <!-- Content Row -->
    <div class="row">

                         <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-md-12">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Laptop</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pembeli</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Jenis Laptop</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pembeli</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <td><?= $row['jenis_laptop'] ; ?></td>
                                                <td><?= $row['jumlah'] ; ?></td>
                                                <td><?= $row['total_harga'] ; ?></td>
                                                <td><?= $row['tanggal'] ; ?></td>
                                                <td><?= $row['nama_pembeli'] ; ?></td>
                                                <td width='180'>
                                                 <?php if($row['status'] == '0') { ?>
                                                    <a class="btn btn-danger" href="../pembeli/batalpesanan.php?id=<?= $row['id'] ; ?>" role="button">Hapus</a>
                                                     <div class="load"></div>
                                                 <?php } else{  ?>
                                                    <a class="btn btn-success" href="#" role="button">Lunas</a>
                                                     <div class="load"></div>
                                                 <?php } ; ?>
                                                 
                                                 

                            
                                                </td>
                                            </tr>
                                        <?php endwhile ; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                       
                    </div>

                 
                    

</div>
<!-- /.container-fluid -->
</div>

            
<?php 

require '../asset/footeradmin.php';?>