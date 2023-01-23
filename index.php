
<?php 

session_start();
if(isset($_SESSION['login']))
{
    header("Location:404.html");
    exit;
}
 $_SESSION['judul'] = "Halaman Login";
  include 'asset/headerakses.php';
  include 'functions.php';
  include 'koneksi.php';
// pengecekan Login
  if(isset($_POST['submit']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result  = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
    
    if(mysqli_num_rows($result) === 1 )
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password']))
        {
            $status = $row['status'];
            $email = $row['email'];
            $_SESSION['login'] = true;
            $_SESSION['status'] = $status;
            $_SESSION['email'] = $email;

            if( $status == '1')
            {
                header("Location:petugas/petugas.php");
            }
            else if( $status == '2')
            {
                header("Location:admin/dashboard.php");
            }
            else if( $status == '3')
            {
                header("Location:pembeli/laptop.php");
            }
           
            exit;
        }
        else
        {
            echo "
            <script>alert('Maaf Password Salah');;</script>
            ";
        }
    }
    else
    {
        echo "
        <script>alert('Maaf Username Salah');;</script>
        ";
    }

  }

  
; ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                   
                                       
                                    
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" required aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" required placeholder="Password">
                                        </div>
                                      
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        
                                       
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php 
  include 'asset/footerakses.php';
; ?>



