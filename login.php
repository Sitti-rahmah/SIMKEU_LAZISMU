<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

  ob_start();
  session_start();  
  include "koneksi.php";

  if ($_SESSION['Amil'] || $_SESSION['Muzakki'] || $_SESSION['Mustahik']) {
    header("location:index.php");
  }else{

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Halaman Login</h2>
                 <br />
            </div>
        </div>
         <div class="row ">
               
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                <strong>Masukan Username dan Password</strong>  
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                        <br />
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input name="username" class="form-control" placeholder="Masukkan Username " />
                          </div>
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="password" class="form-control"  placeholder="Masukkan Password" />
                          </div>
                          <input type="submit" name="login" value="Login" class="btn btn-primary">
                          </form>
                    </div>
                </div>
            </div>     
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>

<?php 

  if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $koneksi->query("select * from tb_akun where username='$username' and password='$password'" );
    $data = $sql->fetch_assoc();
    $ketemu = $sql->num_rows;

    if ($ketemu >=1){
      session_start();

      if ($data['level'] == "Amil"){
        $_SESSION['Amil'] = $data['id_akun'];
        header("Location:index.php");
      } elseif ($data['level'] == "Muzakki"){
        $_SESSION['Muzakki'] = $data['id_akun'];
        header("Location:indexx.php");
      } elseif ($data['level'] == "Mustahik"){
        $_SESSION['Mustahik'] = $data['id_akun'];
        header("Location:indexxx.php");
      }
    } else {
      ?>
        <script type="text/javascript">
          alert("Login Gagal.. Username dan Password Salah");  
        </script>
      <?php
    }
  }
}

 ?>