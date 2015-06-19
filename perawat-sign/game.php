<?php include ('../sign/session.php');
 include ('../sign/db.php');
 $nilaiTiket = '';
 $usernam = $login_session;
 $cekNilaiTiket = mysql_query("select * from user_n_pass where nama_pass='$usernam' ");	
 $cekTiket = mysql_fetch_array($cekNilaiTiket);
			$cekTiket2 = $cekTiket['label_pass'];
			if ($cekTiket2 == 1){
				$nilaiTiket = $login_session;  // Redirecting To Other Page
			}
			elseif($cekTiket2 == 2)
				header("location: ../dokter-sign/");
			else	
				header("location: ../index.php");
//------------------------------------------------------------------------------------------------
	
function pasien($a,$b){
	$data_awal = $a;
	$data_akhir = $b;
	$input = mysql_query("SELECT * FROM ks_transaksi WHERE tanggal BETWEEN '$data_awal' AND '$data_akhir'");
	return $input;
}	
function pengunjung($cc,$dd){
	$data_awall = $cc;
	$data_akhirr = $dd;
	$input2 = mysql_query("SELECT * FROM pengunjung WHERE tanggal BETWEEN '$data_awall' AND '$data_akhirr'");
	return $input2;	
}
function chart($ee,$ff){
	$da1 = $ee;
	$da2 = $ff;
	$input3 = mysql_query("SELECT * FROM ks_transaksi WHERE tanggal BETWEEN '$da1' AND '$da2'");
	return $input3;
}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Balai Pengobatan UA</title>
	<!-- icon poliklinik -->
	<link rel="icon" href="../images/icon.png" type="image/x-icon"/>
	<!-- end./ icon poliklinik -->
    <link href="../css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/edit-menu.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- Start./ -->
    <div id="wrapper">

        <!-- Start./ menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:green; box-shadow: inset -5px -5px 20px #030;">
            <!-- Start./ header -->
            <div class="navbar-header">
				<!--Start./ Tombol Responsive(hide and see sidebar menu) -->
                <button type="button" style="border-radius:20px;color:white;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only" style="color:white;">Toggle navigation</span>
					<span style="color:DimGray;" class="glyphicon glyphicon-list"></span>
					<span class="icon-bar"></span>
                </button>
				<!--End./ Tombol Responsive(hide and see sidebar menu) -->
                <a class="navbar-brand" style="color:white;" href="index.php"> Balai Peng<i class="fa fa-spinner fa-spin"></i>batan</a>

			</div>
			
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;">
						<i class="fa fa-warning"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Tidak ada peringatan</a>
                        </li>
                        <li class="divider" style="color:red;"></li>
                        <li>
                            <a href="#" style="color:red; font:bold;">Lihat Semua</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><i class="fa fa-user-md"></i> Hi, <?php echo $nilaiTiket;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-cog fa-spin"></i> Setting</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../sign/logout.php" style="color:red;"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul><l
			<!--end./ header -->
			
            <!-- Start./ menu sidebar (udah pake responsive lho, ngebukanya ada di button ) -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color:#060; box-shadow: inset -5px -5px 20px #030;">
				<div style="speak-header:always; height:50px;"></div>
                <ul class="nav navbar-nav side-nav" style="background-color: #F1FFF0 ; box-shadow: 5px 5px 6px -7px rgba(0, 0, 0, 0.702); box-shadow: inset -6px 4px 5px #CCC;">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Depan</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#patience"><i class="fa fa-fw fa-users"></i> Pasien <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="patience" class="collapse">
                            <li>
                                <a href="reg-pasien.php"><i class="fa fa-ellipsis-v"></i> Registrasi Pasien</a>
                            </li>
                            <li class="active">
                                <a href="data-pasien.php"><i class="fa fa-ellipsis-v"></i> Data Pasien</a>
                            </li>
                            <li>
                                <a href="trans-pasien.php"><i class="fa fa-ellipsis-v"></i> Transaksi Pengobatan</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#kunjung"><i class="fa fa-fw fa-yelp"></i> Pengunjung <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="kunjung" class="collapse">
                            <li>
                                <a href="kunjungan.php"><i class="fa fa-ellipsis-v"></i> Input Kunjungan</a>
                            </li>
                            <li>
                                <a href="data-kunjungan.php"><i class="fa fa-ellipsis-v"></i> Data Pengunjung</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#doct"><i class="fa fa-fw fa-medkit"></i> Dokter <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="doct" class="collapse">
                            <li>
                                <a href="tambah-dokter.php"><i class="fa fa-ellipsis-v"></i> Input Data Dokter</a>
                            </li>
                            <li>
                                <a href="data-dokter.php"><i class="fa fa-ellipsis-v"></i> Data Dokter</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#obatan"><i class="fa fa-fw fa-tint"></i> Obat <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="obatan" class="collapse">
                            <li>
                                <a href="tambah-obat.php"><i class="fa fa-ellipsis-v"></i> Tambah Obat</a>
                            </li>
                            <li>
                                <a href="data-obat.php"><i class="fa fa-ellipsis-v"></i> Data Obat</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="game.php"><i class="fa fa-fw fa-book pull-left"></i> Laporan </a>
                    </li>
                </ul>
            </div>
            <!-- end./ sidebar menu -->
			<!--end./ menu -->
        </nav>
		<!--Start./ halaman -->
        <div id="page-wrapper">
			<!-- Start./ Container -->
            <div class="container-fluid">
                <!-- Start./ Halaman Atas (Head) -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="col-lg-12">
						
						<button type="button" class="btn btn-success pull-right" style="border-radius:0px 0px 20px 20px;" onclick="printDiv('hahayoyo')" value="print a div!" ><h4><i class="fa fa-print"></i></h4></button>
                        
						<h1 class="page-header">
                            Halaman Laporan <small><i class="fa fa-book"></i></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> Depan
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Laporan
                            </li>
                        </ol>
						</div>
						<div class="col-lg-1 pull-right"></div>
					</div>
                </div>
                <!-- End./ Halaman Atas (Head) -->
				
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Belum ada </strong> belum ada -->
                        </div>
                    </div>
                </div>
				<div class="row">
				
                    <div class="col-lg-12" id="hahayoyo">
<!-- start ./ isi -->

<?php 
if (isset($_POST['pasienlap'])){
	
	$dat = $_POST['dari'];
	$data = $_POST['sampai'];
	$get_this = pasien($dat,$data);
	
	echo '
	<form action="" method="post">
	<div style="height:30px"></div>
<div class="col-md-12" align="center" style="height:50px">
	<div class="col-md-3"></div>
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green;">
				<div class="col-md-12">
					<div class="col-md-3 pull-left" align="left"><strong>Dari : </strong></div>
					<div class="col-md-4" style="color:black;"><input type="text" name="dari" class="span2" data-date-format="yyyy-mm-dd" id="dp2" ></div>
				</div>
	</div>	
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green">
				<div class="col-md-12">
					<div class="pull-left"><strong>Sampai : </strong></div>
					<div class="input-append date" style="color:black;" id="dpp" data-date="2016-01-01" data-date-format="yyyy-mm-dd">
							<input class="span2" name="sampai" size="16" type="text" readonly>
							<div class="add-on"><i class="icon-calendar"></i></div>
					</div>
				</div>	
	</div>
	<div class="col-md-1 btn btn-success" style=" width:80px; border-radius:80px 150px 40px 130px;">
	<button type="submit" class="btn btn-success" style="border-radius:50px" name="pasienlap">CeK</button></div></form>
</div>
<div class="col-md-12" >
';
	$data_left = '<div class="col-md-12" align="center"><h3>Laporan Pasien</h3>
			<h3 style="color:gray;"><small>-----------------</small>-------------------------------<small>-----------------</small></h3></div>
<div class="col-md-12" align="center" style="height:30px"></div>';
	$data_left .= '<table class="table table-hover" ><tr align="center"><td><strong>No.</strong></td>
					<td><strong>Nama</strong></td>
					<td><strong>Anemnesa</strong></td>
					<td><strong>Pemeriksaan</strong></td>
					<td><strong>Terapi</strong></td>
					<td><strong>Tanggal</strong></td></tr>';
	$nomor = 0;				
	while($the_data = mysql_fetch_array($get_this)){$nomor = $nomor + 1;
		$door = $the_data['id_pasien'];
		$get_nama = mysql_query("SELECT * FROM data_pasien WHERE id_pasien='".$door."'");
		$data_nama = mysql_fetch_array($get_nama);
		$data_left .= "
			<tr align='center'><td>".$nomor."</td><td>".$data_nama['nama']."</td><td>".$the_data['anemnesa']."</td>
				<td>".$the_data['pemeriksaan']."</td><td>".$the_data['terapi']."</td>
				<td>".$the_data['tanggal']."</td></tr>
		";
		
	}
	$data_left .='</table></div>';
	echo $data_left;
}
elseif (isset($_POST['pasienlape'])){
	
	$dat = $_POST['dari'];
	$data = $_POST['sampai'];
	$get_this = pengunjung($dat,$data);
	
	echo '
	<form action="" method="post">
	<div style="height:30px"></div>
<div class="col-md-12" align="center" style="height:50px">
	<div class="col-md-3"></div>
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green;">
				<div class="col-md-12">
					<div class="col-md-3 pull-left" align="left"><strong>Dari : </strong></div>
					<div class="col-md-4" style="color:black;"><input type="text" name="dari" class="span2" data-date-format="yyyy-mm-dd" id="dp2" ></div>
				</div>
	</div>	
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green">
				<div class="col-md-12">
					<div class="pull-left"><strong>Sampai : </strong></div>
					<div class="input-append date" style="color:black;" id="dpp" data-date="2016-01-01" data-date-format="yyyy-mm-dd">
							<input class="span2" name="sampai" size="16" type="text" readonly>
							<div class="add-on"><i class="icon-calendar"></i></div>
					</div>
				</div>	
	</div>
	<div class="col-md-1 btn btn-success" style=" width:80px; border-radius:80px 150px 40px 130px;">
	<button type="submit" class="btn btn-success" style="border-radius:50px" name="pasienlape">CeK</button></div></form>
</div>
<div class="col-md-12" >
';
	$data_left = '<div class="col-md-12" align="center"><h3>Laporan Pengunjung</h3>
			<h3 style="color:gray;"><small>-----------------</small>-------------------------------<small>-----------------</small></h3></div>
<div class="col-md-12" align="center" style="height:30px"></div>';
	$data_left .= '<table class="table table-hover" ><tr align="center"><td><strong>No.</strong></td>
					<td><strong>Nama</strong></td>
					<td><strong>Nim/Nip</strong></td>
					<td><strong>Tensi</strong></td>
					<td><strong>Tinggi Badan</strong></td>
					<td><strong>Berat Badan</strong></td>
					<td><strong>Tanggal</strong></td></tr>';
	$nomor = 0;				
	while($the_data = mysql_fetch_array($get_this)){$nomor = $nomor + 1;
		$data_left .= "
			<tr align='center'><td>".$nomor."</td><td>".$the_data['nama']."</td>
				<td>".$the_data['nim_nip']."</td>
				<td>".$the_data['tensi']."</td><td>".$the_data['tinggi_badan']."</td>
				<td>".$the_data['berat_badan_kg']."</td>
				<td>".$the_data['tanggal']."</td></tr>
		";
		
	}
	$data_left .='</table></form>';
	echo $data_left;
}elseif (isset($_POST['charts'])){
	$dat = $_POST['dari'];
	$data = $_POST['sampai'];
	$coco = chart($dat,$data);
	
		echo '
	<form action="" method="post">
	<div style="height:50px"></div>
<div class="col-md-12" align="center" style="height:50px">
	<div class="col-md-3"></div>
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green;">
				<div class="col-md-12">
					<div class="col-md-3 pull-left" align="left"><strong>Dari : </strong></div>
					<div class="col-md-4" style="color:black;"><input type="text" name="dari" class="span2" data-date-format="yyyy-mm-dd" id="dp2" ></div>
				</div>
	</div>	
	<div class="col-md-3 panel panel-green btn btn-success" style="background-color:green">
				<div class="col-md-12">
					<div class="pull-left"><strong>Sampai : </strong></div>
					<div class="input-append date" style="color:black;" id="dpp" data-date="2016-01-01" data-date-format="yyyy-mm-dd">
							<input class="span2" name="sampai" size="16" type="text" readonly>
							<div class="add-on"><i class="icon-calendar"></i></div>
					</div>
				</div>	
	</div>
	<div class="col-md-1 btn btn-success" style=" width:80px; border-radius:80px 150px 40px 130px;">
	<button type="submit" class="btn btn-success" style="border-radius:50px" name="charts">CeK</button></div></form>
</div>
<div class="col-md-12" >
';
		$coco0 = mysql_query("SELECT * FROM ks_transaksi");
		
		if(!$coco)
			echo "gagal";
		$datanya = '';
		while($cocob = mysql_fetch_array($coco)){
		$cocobi = $cocob['anemnesa'];	
		$datanya = $datanya.$cocobi.', ';
		}
		// echo $datanya.'</br></br>';

		$qwerty_data = "aku, kamu, dia, mereka, kamu, aku, aku";
		$data = explode(", ",$datanya);
		$data_a = count($data);
		if($data_a == 1){$data_a = 0;}
		echo '<div class="col-md-12" style="height:10px;"></div><div class="col-md-2"><strong>Total Penyakit</strong> <h5><i style="color=green;"> '.$data_a.'</i></h5></div>
				<div class="col-md-4"></div><div class="col-md-4">-</div>
				<div class="col-md-12"></div>"';
		$hitung = 0; 
		$hutt = '<table align="center" class="table table-hover">';
		$hutt .='<tr><thead><td>nama penyakit</td><td>jumlah</td><td>rating</td></thead><tbody>';
		while($hitung < $data_a){$hitung_a=0;
			$data_b = $data[$hitung];
			$hitung_b = 0;
			if($hitung==0){
				while($hitung_a < $data_a){
					$data_c = $data[$hitung_a];
					if($data_b == $data_c){
						$hitung_b = $hitung_b + 1;
					}
				$hitung_a = $hitung_a + 1;	
				}
			}
			else{
				$hitung_c = 0; $hitung_d=0;
				while($hitung_c < $hitung){
					if($data[$hitung_c]==$data[$hitung]){
						$hitung_d = $hitung_d + 1;
					}
					if($hitung_d==0){
						while($hitung_a < $data_a){
							$data_c = $data[$hitung_a];
							if($data_b == $data_c){
								$hitung_b = $hitung_b + 1;
							}
							$hitung_a = $hitung_a + 1;
						}
					}
					$hitung_c = $hitung_c + 1;
				}
			}
			if ($hitung_b > 0){ 
				$hitung_e = 0; $hitung_f = 0;
				while ( $hitung_e < $hitung ){
					if ($data[$hitung]==$data[$hitung_e]){
						$hitung_f = $hitung_f + 1;
					}$hitung_e = $hitung_e + 1;
				}
				if ($hitung_f == 0){
					if ($data_b != ''){
						$total_rating = $hitung_b / $data_a * 100;
						$hutt .= "<tr><td>$data_b</td><td>$hitung_b</td><td>".number_format($total_rating,2)." %</td></tr>";}
				}
			}
			$hitung=$hitung + 1;
		}
		$hutt .= '</tbody></table>';
		echo $hutt;
	
}else
	echo'
	<form action="" method="post"> 
<div class="col-md-12" align="center">
	<h3>
	Laporan Balai Pengobatan Universitas Andalas
	</h3>
</div>
<div class="col-md-12" style="height:25px;"></div>
<div class="col-md-12">
	<div class="col-md-6">
		<div class="col-md-12" style="height:55px;">
			<button type="submit" style="height:55px;" class="btn btn-warning col-md-12" name="pasienlap">Laporan Pasien</button>
		</div>
		<div class="col-md-12" style="height:10px;">
		<input type="hidden" name="dari" value="" />
		<input type="hidden" name="sampai" value="" />
		</div>
		<div class="col-md-12" style="height:55px;">
			<button type="submit" style="height:55px;" class="btn btn-info col-md-12" name="pasienlape">Laporan Pengunjung</button>
		</div>
	</div>
	<div class="col-md-6">
		<button type="submit" name="charts">
		<div class="col-md-6">
		<i style="font-size:114px" class="fa fa-pie-chart" ></i>
		</div>
		<div class="col-md-6" align="left">
		<strong>Pendataan penyakit pasien</strong><br><br>
		<small>Menampilkan daftar penyakit pasien-pasien yang pernah berobat di Balai Pengobatan Universitas Andalas</small>
		</div>
		</button>
	</div>
</div></form>
	';
?>
<!--------------------------------------------------->

<!-- end ./ isi -->
                        </div>
                    </div>
                </div>

            </div>
			<!-- End./ container -->
        </div>
        <!-- End./ halaman -->
    </div>
    <!-- End./ -->
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpp').datepicker();
			$('#dpp').datepicker();
			
			
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
		
		//---------------------------------------------------------------------------------
		
		function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
	</script>

</body>

</html>
