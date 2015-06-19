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
                <a class="navbar-brand" href="index.php">Balai Peng<i class="fa fa-spinner fa-spin"></i>batan</a>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><i class="fa fa-user-md"></i> Hi, Perawat <?php echo $nilaiTiket;?><b class="caret"></b></a>
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
					<li class="active">
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
                    <li>
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
                        <h1 class="page-header">
                            Halaman Kunjungan <small><small>Bagian data pengunjung</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Pengunjung</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Data Pengunjung
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman crud data pasien?</strong> Tapi masih belum fix.!
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
<!--isi-->

<?php
$ee = "no data";
if (isset($_GET['read'])){
			$n = $_GET['read'];
		$z=mysql_query("select * from pengunjung where id_pengunjung='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);

		echo '<h2 class="page-header alert alert-success" style="">
                           Lihat data <small><small> Data pengunjung dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '		<table class="table table-hover">
					<tr><td>ID Pengunjung</td><td><input type="hidden" name="id_pasien" value="'.$n.'"/></td></tr>
					<tr><td>Nama</td><td>'.$z1['nama'].'</td></tr>
					<tr><td>NIM/NIP</td><td>'.$z1['nim_nip'].'</td></tr>
					<tr><td>Jenis Kelamin</td><td>'.$z1['jenis_kelamin'].'</td></tr>
					<tr><td>Umur</td><td>'.$z1['umur'].'</td></tr>
					<tr><td>Alamat</td><td>'.$z1['alamat'].'</td></tr>
					<tr><td>Fakultas</td><td>'.$z1['fakultas'].'</td></tr>
					<tr><td>Tanggal</td><td>'.$z1['tanggal'].'</td></tr>
					<tr><td>Berat Badan</td><td>'.$z1['berat_badan_kg'].'</td></tr>
					<tr><td>Tensi</td><td>'.$z1['tensi'].'</td></tr>
					<tr><td>Terapi</td><td>'.$z1['terapi'].'</td></tr>
					<tr><td>Tinggi Badan</td><td>'.$z1['tinggi_badan'].'</td></tr>
					<tr><td>Perawat</td><td>'.$z1['id_perawat'].'</td></tr>
					</table>';
}else{
echo '
	<form action="" method="post">
	<div class="nav" style="background-color:green;border-radius:20px;">
		<div align="left" class="pull-left col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari NIM : </strong>
		<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
';
}
?>

<table class="table table-hover">  
<tr align="center">
	<td><strong>Tanggal Kunjungan</strong></td>
    <td><strong>Nama</strong></td>
    <td><strong>Berat Badan</strong></td>
    <td><strong>Tensi</strong></td>
    <td><strong>Terapi</strong></td>
    <td><strong>Aksi</strong></td>
</tr>
<?php //tampil data
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		if($cari=='')
			$a=mysql_query("select * from pengunjung");
		else{
			$a = mysql_query("SELECT * FROM pengunjung WHERE nama='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}else{	date_default_timezone_set("Asia/Jakarta");
	$kalender = CAL_GREGORIAN;
	$bulan = date('m');
	$tahun = date('Y');
	$hari  = cal_days_in_month($kalender,$bulan,$tahun);
	
	$awal=date("Y-m-01");
	$akhir=date("Y-m-$hari");
	
	$a=mysql_query("select * from pengunjung WHERE tanggal BETWEEN '$awal' AND '$akhir'");
}

while ($b=mysql_fetch_array($a)){
?>
<tr align="center">
	<td><?php echo $b['tanggal']; ?></td>
    <td><?php echo $b['nama']; ?></td>
    <td><?php echo $b['berat_badan_kg']; ?></td>
    <td><?php echo $b['tensi']; ?></td>
    <td><?php echo $b['terapi']; ?></td>
    <td><a href="?read=<?php echo $b['id_pengunjung']; ?>"><button class="btn btn-warning"><i style="font-size:18px" class="fa fa-search"></i><small><small><small> Detail</small></small></small></button></a>
	</tr>
<?php
}
?>
</table>
<?php echo $koko; ?>

<!--end./ isi-->
                    </div>
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
        <!-- End./ halaman -->

    </div>
    <!-- End./ -->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
