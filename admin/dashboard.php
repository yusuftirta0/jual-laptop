
<?php 
session_start();
if(!isset($_SESSION['login']) ||  $_SESSION['status'] != '2')
{
    header("Location:../404.html");
    exit;
}
include '../koneksi.php';
$query = "SELECT * FROM laptop ";
$result = mysqli_query($koneksi,$query);
$laptop = mysqli_num_rows($result);
$query2 = "SELECT * FROM pembelian ";
$result2 = mysqli_query($koneksi,$query2);
$pembelian = mysqli_num_rows($result2);
require '../asset/headeradmin.php';
require '../asset/sidebaradmin.php';
require '../asset/topbar.php';

; ?>


       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="../laptop/laptop.php"> Data Laptop</a>  
                                               
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laptop ; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-laptop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a href="../pembelian/pembelian.php"> Data Pembelian</a>
                                        </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembelian ; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>

                 
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
<?php 

require '../asset/footeradmin.php';
; ?>