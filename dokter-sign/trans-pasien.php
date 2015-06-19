<?php include ('../sign/session.php');
 include ('../sign/db.php');
 $nilaiTiket = '';
 $usernam = $login_session;
 $cekNilaiTiket = mysql_query("select * from user_n_pass where nama_pass='$usernam' ");	
 $cekTiket = mysql_fetch_array($cekNilaiTiket);
			$cekTiket2 = $cekTiket['label_pass'];
			if ($cekTiket2 == 2){
				$nilaiTiket = $login_session;  // Redirecting To Other Page
			}
			elseif($cekTiket2 == 1)
				header("location: ../perawat-sign/");
			else	
				header("location: ../index.php");

//------------------------------------------------------------------------------------------------------------------------
function readd(){ // untuk melihat data
	date_default_timezone_set("Asia/Jakarta");
	$times=date("Y-m-d H:i:s");
	$bagian_id1=date("Ymds");
	
	$nama=$_POST['nama'];//--> ini bukan nama pasien melainkan id pasien
	$anemnesa=$_POST['anemnesa'];
	$pemeriksaan=$_POST['pemeriksaan'];
	$terapi=$_POST['terapi'];
	$id_d2=$_POST['dokter'];
	
	// $id_p3 = mysql_query("SELECT * FROM perawat WHERE nama='".$id_p2."'");
	// $id_p4 = mysql_fetch_array($id_p3);
	// $id_p = $id_p4['id_perawat'];
	
	// $id_d3 = mysql_query("SELECT * FROM dokter WHERE nama='".$id_d2."'");
	// $id_d4 = mysql_fetch_array($id_d3);
	// $id_d = $id_d4['nip'];
	
	$in_put = mysql_query("UPDATE `ks_transaksi` SET `anemnesa`='$anemnesa',`pemeriksaan`='$pemeriksaan',
							`terapi`='$terapi',`id_dokter`='$id_d2' WHERE id_pasien='$nama'");
	
	$in_putt=mysql_query("UPDATE `day_status_transaction` SET `anemnesa`='$anemnesa',`pemeriksaan`='$pemeriksaan',
							`terapi`='$terapi',`id_dokter`='$id_d2' WHERE id_pasien='$nama'");
}
if (isset($_POST['readd'])){ //mengambil data dari read
		echo readd();
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
	<link rel="icon" href=".../images/icon.png" type="image/x-icon"/>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><i class="fa fa-user-md"></i> Hi, <?php echo $login_session ?><b class="caret"></b></a>
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
                        <a href="index.php"><h4><i class="fa fa-fw fa-home"></i> Depan</h4></a>
                    </li>
                    <li>
                        <a href="data-pasien.php"><i class="fa fa-fw fa-users"></i> Data Pasien</a>
                     </li>
                    <li class="active">
                        <a href="trans-pasien.php"><i class="fa fa-fw fa-yelp"></i> Pengobatan Pasien</a>
                    </li>
                </ul>
            </div>
            <!-- end./ sidebar menu -->
			<!--end./ menu -->
        </nav>
<!-------------------------------------------------------------------------------------------------------------------->		
		<!--Start./ halaman -->
        <div id="page-wrapper">
			<!-- Start./ Container -->
            <div class="container-fluid">
                <!-- Start./ Halaman Atas (Head) -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style=";">
                            Halaman Pasien <small><small>Bagian pengobatan pasien</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Pasien</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Pasien Berobat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->
				<!-- Isi Utama -->
                <div class="row">
                    <div class="col-lg-12">
						<div class=""></div>
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman untuk pasien berobat bagi admin - perawat </strong>
                        </div>
                    </div>
                </div>

                <div class="row">
				<!-- isi -->
<?php
$ee = "no data";
if (isset($_GET['read']))
{
		$n = $_GET['read'];
		$z=mysql_query("select * from data_pasien where id_pasien='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);
		$z1id = $z1['id_pasien'];
		$z1n = $z1['nomor_registrasi'];
		$sel = mysql_query("SELECT * FROM day_status_transaction WHERE id_pasien='$n'");
		$sel2 = mysql_fetch_array($sel);
		echo '<h2 class="page-header alert alert-success" style="">
                           <strong>Kartu Status </strong><small> Data pasien dengan ID : '.$n.'</small>
                        </h2>';
		echo '<form action="trans-pasien.php" method="post" class="form form-static">
					<table class="table table-hover"><input class="col-md-10" disabled type="hidden" name="nomor_registrasi" value="'.$z1n.'"/>
					<tr><td style="width:30%;"></td><td><input class="form-control col-md-10" type="hidden" name="nama" value="'.$z1['id_pasien'].'"/></td></tr>
					<tr><td align="right">Nama</td><td><input class="form-control col-md-10" disabled type="text" name="nama1" value="'.$z1['nama'].'"/></td></tr>
					<tr><td align="right">Nomor Registrasi</td><td><input class="form-control col-md-10" disabled type="text" name="iiiiiiiiiii" value="'.$z1n.'"/></td></tr>
					<tr><td align="right">Anemnesa</td><td><input class="form-control col-md-10" type="text" name="anemnesa" value="'.$sel2['anemnesa'].'" placeholder="jika lebih dari satu, penyakit ditulis dengan diakhiri tanda koma dan spasi" /></td></tr>
					<tr><td align="right">Pemeriksaan</td><td><input class="form-control col-md-10" type="text" name="pemeriksaan" value="'.$sel2['pemeriksaan'].'"  placeholder="" /></td></tr>
					<tr><td align="right">Terapi</td><td><input class="form-control col-md-10" type="text" name="terapi" value="'.$sel2['terapi'].'" /></td></tr>
					<tr><td align="right">Nama Dokter</td><td><input class="form-control col-md-10" type="text" name="dokter" value="'.$sel2['id_dokter'].'" /></td></tr>
					</table>
					<button type="submit" name="readd" value="selesai" class="col-md-12 btn btn-warning" >selesai</button>
					</form></br>';	
			echo "<h3 class='page-header alert alert-success'>
                           <strong>Data Pengobatan Pasien</strong> bernama ".$z1['nama']."<small> dengan ID : ".$n."</small>
                        </h3>";		
		$pengobatan = mysql_query("select * from ks_transaksi where id_pasien='$z1id'");	
			echo '<table class="table table-hover">
					<tr><td><strong>Tanggal</strong></td>
					<td><strong>Anemnesa</strong></td>
					<td><strong>Pemeriksaan</strong></td>
					<td><strong>Terapi</strong></td></tr>';		
		while ($dab=mysql_fetch_array($pengobatan)){
			echo "	<tr><td><strong>".$dab['tanggal']."</strong></td>
					<td><strong>".$dab['anemnesa']."</strong></td>
					<td><strong>".$dab['pemeriksaan']."</strong></td>
					<td><strong>".$dab['terapi']."</strong></td></tr>";
		}	echo "</table></br>";
}else{ echo '<form action="" method="post">
<div class="panel panel-green" style="border-radius:20px;height:38px" align="center">
	<div class=" pull-left panel panel-green" style="border-radius:20px;">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nomor Registrasi: </strong>
		<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
	</div>
	<i>atau</i>
	<div class=" panel panel-green pull-right" style="border-radius:20px;">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nama: </strong>
		<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search2" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
	</div>
</div>
</form>';}
?>
<div align="center" class="col-md-12 alert alert-success"><h3><strong>Daftar pasien berobat hari ini !</strong></h3></div>
<table class='col-md-12 table table-hover'><tr><td style="width:25%">Nomor Registrasi</td><td style="width:25%">Nama</td><td style="width:25%">Alamat</td><td style="width:25%">Cek</td></tr>

<?php 
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien order by nomor_registrasi desc");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nomor_registrasi='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
elseif (isset($_POST['search2'])){ //cari
		$cari = $_POST['carii2'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien order by nomor_registrasi desc");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nama='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}else
	$a=mysql_query("select * from data_pasien order by nomor_registrasi desc;");
?>
	
<?php
while ($b=mysql_fetch_array($a)){
		$selec_id = $b['id_pasien'];
		$selec2 = mysql_query("SELECT * FROM day_status_transaction");
		$selec4 = 0;
		$celec = ''; $celec_ala=''; $celec_nama='';
		$celec1=$b['nomor_registrasi']; 
		$celec_nama1=$b['nama'];
		$celec_ala1=$b['alamat'];
		$celec_d1 = $b['id_pasien'];
		while ($selec=mysql_fetch_array($selec2)){
			$selec3=$selec['id_pasien'];
			if ($selec_id == $selec3){
				$selec4 = $selec4 + 1;
			}
		}
		if ($selec4 > 0){
			$celec=$celec1; $celec_nama=$celec_nama1;$celec_ala=$celec_ala1;$celec_d = $celec_d1;
		}
		else
			continue;
?>
		<tr>
			<td><?php echo $celec ?></td>
			<td><?php echo $celec_nama ?></td>
			<td><?php echo $celec_ala ?></td>
			<td>
			<a href="?read=<?php echo $celec_d ?>"><button type='button' class='btn btn-success' style='border-radius:0px 0px 0px 10px'><i style='font-size:18px' class='fa fa-check'></i><small> Isi KS (Kartu Status)</small></button></a> 
		</td></tr>
<?php 
}
?>		
</table>
<!-- Habis isi halaman -->
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
		
        <!-- End./ halaman -->

    </div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>