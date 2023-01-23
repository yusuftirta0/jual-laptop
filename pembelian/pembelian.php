
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
$query = "SELECT *,laptop.jenis_laptop FROM pembelian
JOIN laptop ON pembelian.id_laptop = laptop.id_laptop
WHERE status='1'";
$result = mysqli_query($koneksi,$query);
 ?>


       

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pembelian</h1>
    <!-- Content Row -->
    <div class="row">

                         <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-md-12">
                        <div class="card-header py-3">
                            <a class="btn btn-primary mt-3" href="../pembelian/tambahpembelian.php" role="button">Tambah Pembelian</a>
                        </div>
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
                                                     <a class="btn btn-success" href="../pembelian/editpembelian.php?id=<?= $row['id'] ; ?>" role="button">Edit</a>

                                                     <a class="btn btn-danger" href="../pembelian/deletepembelian.php?id=<?= $row['id'] ; ?>" role="button">Hapus</a>
                                                     <div class="load"></div>
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