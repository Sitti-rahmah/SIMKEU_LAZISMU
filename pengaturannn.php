<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    include "koneksi.php";

 ?>

 <?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(@$_SESSION['Mustahik']){
        $user_login = @$_SESSION['Mustahik'];
        include "koneksi.php";
        $sqllogin = $koneksi->query("SELECT 
        ta.id_akun,
        ta.level,
        ta.id,
        ta.username,
        ta.password,
        ta.level,
        tmu.nama_mustahik,
        tmu.alamat,
        tmu.pendapatan,
        tmu.pekerjaan,
        tmu.jml_keluarga FROM (tb_akun ta LEFT JOIN tb_mustahik tmu ON ta.id = tmu.id_mustahik) WHERE ta.id_akun ='$user_login' ;");
        while($datalogin=$sqllogin->fetch_assoc()){

            $akunlogin = $datalogin['nama_mustahik'];
            $levellogin = $datalogin['level'];
            $idlgn = $datalogin['id'];
            $idalgn = $datalogin['id_akun'];
            $uslgn = $datalogin['username'];
            $pslgn = $datalogin['password'];
            $algn = $datalogin['alamat'];
            $pdlgn = $datalogin['pendapatan'];
            $pklgn = $datalogin['pekerjaan'];
            $jmlgn = $datalogin['jml_keluarga'];
        }

    }

 ?>

<div class="row">
    <div class="col-md-6">
          <!--    Striped Rows Table  -->
        <div class="panel panel-primary"  style="margin-left: 5px; margin-top: 5px">
            <div class="panel-heading">
                Data Muzakki
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                            <tr>
                                <th width="200px">ID Mustahik</th>
                                <td><?php echo $idlgn; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Mustahik</th>
                                <td><?php echo $akunlogin; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $algn; ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?php echo $pklgn; ?></td>
                            </tr>
                            <tr>
                                <th>Pendapatan</th>
                                <td><?php echo $pdlgn; ?></td>
                            </tr>

                            <tr>
                                <th>Jumlah Keluarga</th>
                                <td><?php echo $jmlgn; ?></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--  End  Striped Rows Table  -->
    </div>

    <div class="col-md-6">
          <!--    Striped Rows Table  -->
        <div class="panel panel-primary"  style="margin-left: 5px; margin-top: 5px">
            <div class="panel-heading">
                PENGATURAN DATA
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                       <div>
                        <form role="form" method="POST">

                            <div class="form-group">
                                <label>Nama Akun</label>
                                <input class="form-control" name="nakun" value="<?php echo $akunlogin; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" value="<?php echo $uslgn; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" value="<?php echo $pslgn; ?>" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                    </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <!--  End  Striped Rows Table  -->
    </div>
</div>

                        <?php 

                            if (isset($_POST['ubah'])){

                                $password = $_POST['password'];
                                
                                $sql = $koneksi->query("update tb_akun set password = '$password' where id_akun = '$idalgn' ");

                                if ($sql){
                                    ?>

                                    <script type="text/javascript">
                                        alert("Ubah Data Berhasil");
                                        window.location.href="?page=pengaturannn";
                                    </script>

                                    <?php 
                                }
                            }

                         ?>