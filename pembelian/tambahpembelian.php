
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
$query = "SELECT * FROM  laptop";
$result = mysqli_query($koneksi,$query);
if(isset($_POST['submit']))
{
    if(tambahpembelian($_POST))
    {
        echo "
        <script>alert('Data Berhasil Ditambahkan');window.location.href = '../pembelian/pembelian.php';</script>
        ";
    }
}
 ?>


       

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Pembelian</h1>
    <!-- Content Row -->
    <form  action="" method="post" enctype="multipart/form-data">
        <div class="row">
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Laptop</label>
                        <select name="jenis" class="form-control" id="exampleFormControlSelect1" required>
                            <option value="">Pilih Jenis Laptop</option>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <option value="<?= $row['id_laptop'] ; ?>"><?= $row['jenis_laptop'] ; ?>/ <?= $row['harga'] ; ?>
                            </option>
                            <?php endwhile ; ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="exampleInputEmail1">Total Harga</label>
                            <input required type="text" name="total" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Pembeli</label>
                        <input required type="email" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Beli</label>
                        <input required type="number" min="1" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                </div>
        </div>  
    </form>  
                 
                    

</div>
<!-- /.container-fluid -->
</div>

<script type="text/javascript">

    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

</script>      
<?php 

require '../asset/footeradmin.php';?>