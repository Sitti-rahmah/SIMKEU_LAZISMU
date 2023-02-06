<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    include "koneksi.php";
?>

 <?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(@$_SESSION['Amil']){
        $user_login = @$_SESSION['Amil'];
        include "koneksi.php";
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
            $idlgn = $datalogin['id'];
            $idalgn = $datalogin['id_akun'];
            $uslgn = $datalogin['username'];
            $pslgn = $datalogin['password'];
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
                        <?php 

                        $sql = $koneksi->query("select * from tb_amil where id_amil =".$idlgn."");
                            while($data=$sql->fetch_assoc()){

                         ?>
                            <tr>
                                <th width="200px">ID Amil</th>
                                <td><?php echo $data['id_amil']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Amil</th>
                                <td><?php echo $data['nama_amil']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td><?php echo $data['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <img src="images/<?php echo $data['foto'] ?>" width="150" heigth="150" alt="">
                                </td>
                            </tr>
                        <?php } ?>
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
                                        window.location.href="?page=pengaturan";
                                    </script>

                                    <?php 
                                }
                            }

                         ?>