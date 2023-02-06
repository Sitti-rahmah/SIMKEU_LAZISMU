<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include "koneksi.php";
if ($_SESSION['Muzakki']) {

 ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LAZISMU PAREPARE</title>
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexx.php">KEUANGAN</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">

<?php 

    if(@$_SESSION['Muzakki']){
        $user_loginB = @$_SESSION['Muzakki'];
        $sqlloginb = $koneksi->query("SELECT 
        ta.id_akun,
        ta.level,
        ta.id,
        ta.username,
        ta.password,
        ta.level,
        tm.nama_muzakki FROM (tb_akun ta LEFT JOIN tb_muzakki tm ON ta.id = tm.id_muzakki) WHERE ta.id_akun ='$user_loginB' ;");
        while($dataloginb=$sqlloginb->fetch_assoc()){
            $akunlogin = $dataloginb['nama_muzakki'];
            $levellogin = $dataloginb['level'];
        }        
    }

    ?>

Selamat Datang <?php echo $levellogin; ?>, &nbsp;  
<div class="btn-group">
<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style="margin-right: 50px">
<B><?php echo $akunlogin; ?></B> <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li><a href="?page=data_donasi">Data Donasi</a></li>
        <li><a href="?page=pengaturann">Pengaturan Akun</a></li>
        <hr>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/logo.jpg" class="user-image img-responsive"/>
                </li>
                    <li>
                        <a  href="indexx.php"><i class="fa fa-bold fa-3x"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="?page=transaksi_penerimaan"><i class="fa fa-book fa-3x"></i>  Transaksi Penerimaan</a>
                    </li>
                    <li>
                        <a href="?page=transaksi_pengeluaran"><i class="fa fa-book fa-3x"></i> Transaksi Pengeluaran</a>
                    </li>   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"> 

                       <?php

                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];
                        
                        if ($page == "transaksi_penerimaan"){
                            if ($aksi == "" ) {
                                include "page/transaksi_penerimaan/detailtp.php";
                            }
                        }elseif ($page == "transaksi_pengeluaran"){
                            if ($aksi == "" ) {
                                include "page/transaksi_pengeluaran/detailtpe.php";
                            }
                        }elseif ($page == "pengaturann"){
                            if ($aksi == "" ) {
                                include "pengaturann.php";
                            }
                        }elseif ($page == "data_donasi"){
                            if ($aksi == "" ) {
                                include "page/muzakki/datadonasi.php";
                            }
                        }elseif ($page == ""){
                            include "home.php";
                            
                        }

                        ?>

                                                                   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script type="text/javascript" src="assets/kwitansi/lib/function.js"></script>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->

    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


  </body>
</html>

<?php

  } else {
      header("location:login.php");
  }

?>