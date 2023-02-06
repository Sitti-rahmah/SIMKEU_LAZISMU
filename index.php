<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    include "koneksi.php";
if ($_SESSION['Amil']) {

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
                <a class="navbar-brand" href="index.php">KEUANGAN</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">

<?php 

    if(@$_SESSION['Amil']){
        $user_login = @$_SESSION['Amil'];

        $sqllogin = $koneksi->query("SELECT 
        ta.id_akun,
        ta.level,
        ta.id,
        ta.username,
        ta.password,
        ta.level,
        tam.nama_amil FROM (tb_akun ta LEFT JOIN tb_amil tam ON ta.id = tam.id_amil) WHERE ta.id_akun ='$user_login' ;");
        while($datalogin=$sqllogin->fetch_assoc()){

            $akunlogin = $datalogin['nama_amil'];
            $levellogin = $datalogin['level'];
        }

    }elseif(@$_SESSION['Muzakki']){
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
    }elseif(@$_SESSION['Mustahik']){
        $user_loginC = @$_SESSION['Mustahik'];
        $sqlloginc = $koneksi->query("SELECT 
        ta.id_akun,
        ta.level,
        ta.id,
        ta.username,
        ta.password,
        ta.level,
        tmu.nama_mustahik FROM (tb_akun ta LEFT JOIN tb_mustahik tmu ON ta.id = tmu.id_mustahik) WHERE ta.id_akun ='$user_loginC' ;");
        while($dataloginc=$sqlloginc->fetch_assoc()){
            $akunlogin = $dataloginc['nama_mustahik'];
            $levellogin = $dataloginc['level'];
        }    
    }

    ?>

Selamat Datang <?php echo $levellogin; ?>, &nbsp;  
<div class="btn-group">
<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style="margin-right: 50px">
<B><?php echo $akunlogin; ?></B> <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li><a href="?page=pengaturan">Pengaturan Akun</a></li>
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
                        <a  href="index.php"><i class="fa fa-bold fa-3x"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="?page=amil"><i class="fa fa-user fa-3x"></i> Amil</a>
                    </li>                                     
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Kelola Donasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=jenis_donasi"> Jenis Donasi</a>
                            </li>
                            <li>
                                <a href="?page=muzakki"> Muzakki</a>
                            </li>
                            <li>
                                <a href="?page=mustahik"> Mustahik</a>
                            </li>
                            <li>
                                <a href="#">Transaksi<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="?page=transaksi_penerimaan"> Transaksi Penerimaan</a>
                                    </li>
                                    <li>
                                        <a href="?page=transaksi_pengeluaran"> Transaksi Pengeluaran</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=buku_besar"><i class="fa fa-book fa-3x"></i>  Buku Besar</a>
                    </li>
                    <li>
                        <a href="?page=laporan"><i class="fa fa-file fa-3x"></i> Laporan</a>
                    </li> 
                    <li>
                        <a href="?page=akun"><i class="fa fa-th-list fa-3x"></i> Manajemen Akun</a>
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
                        
                        if ($page == "jenis_donasi"){
                            if ($aksi == "" ) {
                                include "page/jenis_donasi/jenis_donasi.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/jenis_donasi/hapus.php";
                            }
                        }elseif ($page == "kategori"){
                            if ($aksi == "" ) {
                                include "page/kategori/kategori.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/kategori/hapus.php";
                            }
                        }elseif ($page == "nkategori"){
                            if ($aksi == "" ) {
                                include "page/nkategori/nkategori.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/nkategori/hapus.php";
                            }
                        }elseif ($page == "nkategori"){
                            if ($aksi == "" ) {
                                include "page/nkategori/kategori.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/nkategori/hapus.php";
                            }
                        }elseif ($page == "amil"){
                            if ($aksi == "" ) {
                                include "page/amil/amil.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/amil/hapus.php";
                            }
                        }elseif ($page == "muzakki"){
                            if ($aksi == "" ) {
                                include "page/muzakki/muzakki.php";
                            }elseif ($aksi == "hapus" ) {
                                include "page/muzakki/hapus.php";
                            }elseif ($aksi == "detail" ) {
                                include "page/muzakki/detail.php";
                            }
                        }elseif ($page == "mustahik"){
                            if ($aksi == "" ) {
                                include "page/mustahik/mustahik.php";
                            } elseif ($aksi == "hapus" ) {
                                include "page/mustahik/hapus.php";
                            }
                        }elseif ($page == "transaksi_penerimaan"){
                            if ($aksi == "" ) {
                                include "page/transaksi_penerimaan/transaksi_penerimaan.php";
                            } elseif ($aksi == "hapus" ) {
                                include "page/transaksi_penerimaan/hapus.php";
                            } 
                        }elseif ($page == "transaksi_pengeluaran"){
                            if ($aksi == "" ) {
                                include "page/transaksi_pengeluaran/transaksi_pengeluaran.php";
                            } elseif ($aksi == "hapus" ) {
                                include "page/transaksi_pengeluaran/hapus.php";
                            }
                        }elseif ($page == "buku_besar"){
                            if ($aksi == "" ) {
                                include "page/buku_besar/buku_besar.php";
                            } elseif ($aksi == "hapus" ) {
                                include "page/buku_besar/hapus.php";
                            }
                        }elseif ($page == "laporan"){
                            if ($aksi == "" ) {
                                include "laporan/laporan.php";
                            }
                        }elseif ($page == "akun"){
                            if ($aksi == "" ) {
                                include "page/akun/akun.php";
                            } elseif ($aksi == "hapus" ) {
                                include "page/akun/hapus.php";
                            }
                        }elseif ($page == "pengaturan"){
                            if ($aksi == "" ) {
                                include "pengaturan.php";
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