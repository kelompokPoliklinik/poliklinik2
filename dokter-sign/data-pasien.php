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

function read(){ // untuk melihat data
	$id_pasien=$_POST['id_pasien'];
	$nama=$_POST['nama'];
	$nim=$_POST['nomor_registrasi'];
	$tempat=$_POST['tempat_lahir'];
	$tanggal=$_POST['tanggal_lahir'];
	$alamat=$_POST['alamat'];
	$jk=$_POST['jenis_kelamin'];
	$pekerjaan=$_POST['pekerjaan'];
	$fak=$_POST['fakultas'];
	$alergi=$_POST['alergi'];
	$up=mysql_query("UPDATE `poliklinik`.`data_pasien` SET nama='$nama', nomor_registrasi='$nim', tempat_lahir = '$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin = '$jk', pekerjaan='$pekerjaan', fakultas='$fak', alergi = '$alergi' WHERE `data_pasien`.`id_pasien` = '$id_pasien';") or die (mysql_error());
}

if (isset($_POST['read'])){ //mengambil data dari read
		echo read();
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
                    <li class="active">
                        <a href="data-pasien.php"><i class="fa fa-fw fa-users"></i> Data Pasien</a>
                     </li>
                    <li>
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
                            Halaman Pasien <small><small>Bagian data pasien</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Pasien</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Data Pasien
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
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman data pasien?</strong> Halaman ini sudah fix.!
                        </div>
                    </div>
                </div>

                <div class="row">
				<!-- isi -->
<?php
$ee = "no data";
if (isset($_GET['read'])){
			$n = $_GET['read'];
		$z=mysql_query("select * from data_pasien where id_pasien='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);

		echo '<h2 class="page-header alert alert-success" style="">
                           Lihat data <small><small> Data pasien dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '		<table class="table table-hover">
					<tr><td>ID Pasien</td><td><input type="hidden" name="id_pasien" value="'.$n.'"/></td></tr>
					<tr><td>Nama</td><td>'.$z1['nama'].'</td></tr>
					<tr><td>Nomor Registrasi</td><td>'.$z1['nomor_registrasi'].'</td></tr>
					<tr><td>Tempat Lahir</td><td>'.$z1['tempat_lahir'].'</td></tr>
					<tr><td>Tanggal Lahir</td><td>'.$z1['tanggal_lahir'].'</td></tr>
					<tr><td>Alamat</td><td>'.$z1['alamat'].'</td></tr>
					<tr><td>Jenis Kelamin</td><td>'.$z1['jenis_kelamin'].'</td></tr>
					<tr><td>Pekerjaan</td><td>'.$z1['pekerjaan'].'</td></tr>
					<tr><td>Fakultas</td><td>'.$z1['fakultas'].'</td></tr>
					<tr><td>Alergi</td><td>'.$z1['alergi'].'</td></tr>
					</table>';
		$pengobatan = mysql_query("select * from ks_transaksi where id_pasien='$n'");	
			echo '<table class="table table-hover">
					<tr style="background-color:DimGray; color:white;"><td><strong>Tanggal</strong></td>
					<td><strong>Anemnesa</strong></td>
					<td><strong>Pemeriksaan</strong></td>
					<td><strong>Terapi</strong></td></tr>';		
		while ($dab=mysql_fetch_array($pengobatan)){
			echo "	<tr><td><strong>".$dab['tanggal']."</strong></td>
					<td><strong>".$dab['anemnesa']."</strong></td>
					<td><strong>".$dab['pemeriksaan']."</strong></td>
					<td><strong>".$dab['terapi']."</strong></td></tr>";		}	
}else{
echo '
	<form action="" method="post">
	<div class="nav" style="background-color:green;border-radius:20px;">
		<div align="left" class="pull-left col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nomor Registrasi: </strong>
		<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div><div align="center" class="col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nama: </strong>
		<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search2" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div><div align="right" class="col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Pekerjaan: </strong>
		<input type="text" name="carii3" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search3" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
';
}
?>
<table class="table table-hover">  
<div style="height:20px;"></div>
<div class="col-md-12 alert alert-success"><h3>Daftar Data Pasien</h3></div>
<tr align="center">
	<td><strong> ID Pasien </strong></td>
    <td><strong>Nama</strong></td>
    <td><strong>Alamat</strong></td>
    <td><strong>Pekerjaan</strong></td>
    <td style="width:35%;"><strong>Aksi</strong></td>
</tr>
<?php //tampil data
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nomor_registrasi='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
elseif (isset($_POST['search2'])){ //cari
		$cari = $_POST['carii2'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nama='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}elseif (isset($_POST['search3'])){ //cari
		$cari = $_POST['carii3'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE pekerjaan='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
else
	$a=mysql_query("select * from data_pasien order by nomor_registrasi desc");

while ($b=mysql_fetch_array($a)){
?>
<tr align="center">
	<td><?php echo $b['id_pasien']; ?></td>
    <td><?php echo $b['nama']; ?></td>
    <td><?php echo $b['alamat']; ?></td>
    <td><?php echo $b['pekerjaan']; ?></td>
    <td><a href="?read=<?php echo $b['id_pasien']; ?>"><button class="btn btn-warning"><i style="font-size:18px" class="fa fa-search"></i><small><small> Detail</small></small></button></a></td>
</tr>
<?php
}
?>
</table>
<?php echo $koko; ?>
<!-- end./ isi -->
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
		
        <!-- End./ halaman -->

    </div>

</body>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>