<?php 
	
	$sqlmasuk = $koneksi->query("select * from tb_transaksi where id_kategori = '1' ");
	while ($data=$sqlmasuk->fetch_assoc()){
		$jml = $data['kas'];
		$total_masuk = $total_masuk+$jml;
	}
	$sqlkeluar = $koneksi->query("select * from tb_transaksi where id_kategori = '2'");
	while ($data=$sqlkeluar->fetch_assoc()){
		$jml = $data['kas'];
		$total_keluar = $total_keluar+$jml;
	}
		$total = $total_masuk-$total_keluar;

//TAMPILKAN DATA BERDASARKAN TAHUN SEKARANG
	$tahun = date('Y');
	$sqlmasukt = $koneksi->query("select * from tb_transaksi where id_kategori = '1' AND date_format(tanggal, '%Y') = '$tahun'");
	while ($data=$sqlmasukt->fetch_assoc()){
		$jmlmt = $data['kas'];
		$totalmt = $totalmt+$jmlmt;
	}
	$sqlkeluart = $koneksi->query("select * from tb_transaksi where id_kategori = '2' AND date_format(tanggal, '%Y') = '$tahun'");
	while ($data=$sqlkeluart->fetch_assoc()){
		$jmlkt = $data['kas'];
		$totalkt = $totalkt+$jmlkt;
	}
		$total2 = $totalmt-$totalkt;

 ?>

<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12" align="CENTER">
         <h2>SISTEM INFORMASI KEUANGAN LAZISMU PAREPARE</h2>   
            <h5><i>LAZISMU Memberi untuk Negeri </i></h5>
        </div>
    </div>   
    <hr>
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Informasi Kas Keseluruhan
    </button>        
     <!--  Modals-->
        <div class="panel-body">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Infomasi Pemasukan dan Pengeluaran Selama ini</h4>
                        </div>
                        <div class="modal-body">
                            
							<div class="row">
							    <div class="col-md-12 col-sm-6 col-xs-6">           
									<div class="panel panel-back noti-box">
									    <span class="icon-box bg-color-blue set-icon">
									        <i class="glyphicon glyphicon-floppy-save"></i>
									    </span>
										    <div class="text-box" >
										        <p class="main-text"><?php echo "Rp. " .number_format($total_masuk);?>,-</p>
										        <p class="text-muted">Total Kas Masuk</p>
										    </div>
									</div>
							 	</div>
							 	<br>
							    <div class="col-md-12 col-sm-6 col-xs-6">           
									<div class="panel panel-back noti-box">
									    <span class="icon-box bg-color-red set-icon">
									        <i class="glyphicon glyphicon-floppy-open"></i>
									    </span>
										    <div class="text-box" >
										        <p class="main-text"><?php echo "Rp. " .number_format($total_keluar);?>,-</p>
										        <p class="text-muted">Total Kas Keluar</p>
										    </div>
									</div>
							 	</div>
							 	<div class="col-md-12 col-sm-6 col-xs-6">           
									<div class="panel panel-back noti-box">
									    <span class="icon-box bg-color-green set-icon">
									        <i class="glyphicon glyphicon-floppy-disk"></i>
									    </span>
										    <div class="text-box" >
										        <p class="main-text"><?php echo "Rp. " .number_format($total);?>,-</p>
										        <p class="text-muted">Saldo Akhir</p>
										    </div>
									</div>
							 	</div>                        	

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- End Modals-->
     <!-- /. ROW  -->
    <div class="row" >
    <div class="col-md-4 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
		    <span class="icon-box bg-color-blue set-icon">
		        <i class="glyphicon glyphicon-floppy-save"></i>
		    </span>
			    <div class="text-box" >
			        <p class="main-text"><?php echo "Rp. " .number_format($totalmt);?>,-</p>
			        <p class="text-muted">Total Kas Masuk</p>
			    </div>
		</div>
 	</div>
    <div class="col-md-4 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
		    <span class="icon-box bg-color-red set-icon">
		        <i class="glyphicon glyphicon-floppy-open"></i>
		    </span>
			    <div class="text-box" >
			        <p class="main-text"><?php echo "Rp. " .number_format($totalkt);?>,-</p>
			        <p class="text-muted">Total Kas Keluar</p>
			    </div>
		</div>
 	</div>
 	<div class="col-md-4 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
		    <span class="icon-box bg-color-green set-icon">
		        <i class="glyphicon glyphicon-floppy-disk"></i>
		    </span>
			    <div class="text-box" >
			        <p class="main-text"><?php echo "Rp. " .number_format($total2);?>,-</p>
			        <p class="text-muted">Saldo Akhir</p>
			    </div>
		</div>
	</div>
</div>
<hr>
<div class="row">   
	<div class="col-lg-6">
		<div class="panel panel-primary" >
		    <div class="panel-heading"> GRAFIK PENERIMAAN </div>
		    <div class="panel-body" >
		  		<?php include "page/grafik.php"; ?>
			</div>   
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-primary" >
		    <div class="panel-heading"> GRAFIK PENGELUARAN </div>
		    <div class="panel-body" >
		  		<?php include "page/grafik2.php"; ?>
			</div>   
		</div>
	</div>
</div>

