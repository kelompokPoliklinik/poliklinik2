<?php 
include ('../sign/session.php');
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

function update(){ // untuk mengudate data
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$jk=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$hari=$_POST['hari'];
	$telpon=$_POST['telpon'];
	$up=mysql_query("INSERT INTO `dokter`(`nip`, `nama`, `jenis_kelamin`, `alamat`, `hari`, `telpon`)
					VALUES ('$nip','$nama','$jk','$alamat','$hari','$telpon')");
}
function read(){ // untuk melihat data
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
	$jk=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$hari=$_POST['hari'];
	$telpon=$_POST['telpon'];
	}
function delete(){
	$nipd=$_GET['delete'];
	mysql_query("delete from dokter where nip='$nipd'");
}

if (isset($_POST['read'])){ //mengambil data dari read
		echo read();
	}
if (isset($_POST['update'])){ //mengambil data dari update
		echo update();
	}
if (isset($_GET['delete'])){ //delete
		echo delete();
}

//-----------------------------------------------------------------------------


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Balai Pengobatan</title>
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
                <a class="navbar-brand" style="color:Azure;" href="index.php">Balai Peng<i class="fa fa-spinner fa-spin"></i>batan</a>

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
					<li class="active">
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
                            Halaman Dokter <small><small>Bagian data dokter</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-medkit"></i> Dokter</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Data Dokter
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman data dokter?</strong> .!
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
<!--isi-->
<?php
$ee = "no data";
if (isset($_GET['edit']))
{
		$n = $_GET['edit'];
		$z=mysql_query("select * from dokter where nip='$n'"); // query edit berdasarkan nip
		$z1=mysql_fetch_array($z);

		echo '<h2 class="page-header alert alert-success" style="">
                           Ubah data <small><small> Data dokter dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '<form action="data-dokter.php" method="post" class="form form-static">
					<table class="table table-hover">
					<tr><td>NIP</td><td><input class="col-md-12" type="text" name="nip" value="'.$z1['nip'].'"/></td></tr>
					<tr><td>Nama</td><td><input class="col-md-12" type="text" name="nama" value="'.$z1['nama'].'"/></td></tr>
					<tr><td>Jenis Kelamin</td><td><input class="col-md-12" type="text" name="jenis_kelamin" value="'.$z1['jenis_kelamin'].'" /></td></tr>
					<tr><td>Alamat</td><td><input class="col-md-12" type="text" name="alamat" value="'.$z1['alamat'].'" /></td></tr>
					<tr><td>Hari</td><td><input class="col-md-12" type="text" name="hari" value="'.$z1['hari'].'" /></td></tr>
					<tr><td>Telpon</td><td><input class="col-md-12" type="text" name="telpon" value="'.$z1['telpon'].'" /></td></tr>
					</table>
					<button type="submit" name="update" value="update" class="col-md-12 btn btn-warning" >Update</button>
					</form>
					<div class="col-md-12" style="height:30px"></div>';
}elseif (isset($_GET['read'])){
			$n = $_GET['read'];
		$z=mysql_query("select * from dokter where nip='$n'"); // query edit berdasarkan nip
		$z1=mysql_fetch_array($z);

		echo '<h2 class="page-header alert alert-success" style="">
                           Lihat data <small><small> Data dokter dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '		<table class="table table-hover">
					<tr><td>NIP</td><td><input name="nip" value="'.$n.'"/></td></tr>
					<tr><td>Nama</td><td>'.$z1['nama'].'</td></tr>
					<tr><td>Jenis Kelamin</td><td>'.$z1['jenis_kelamin'].'</td></tr>
					<tr><td>Alamat</td><td>'.$z1['alamat'].'</td></tr>
					<tr><td>Hari</td><td>'.$z1['hari'].'</td></tr>
					<tr><td>telpon</td><td>'.$z1['telpon'].'</td></tr>
					</table>';
}else{
echo '
	<form action="" method="post">
	<div class="nav" style="background-color:green;border-radius:20px;">
		<div align="left" class="pull-left col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari NIP: </strong>
		<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div><div align="center" class="col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nama: </strong>
		<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search2" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
';
}
?>

<table class="table table-hover">  
<tr align="center">
	<td><strong> NIP Dokter </strong></td>
    <td><strong>Nama</strong></td>
    <td><strong>Hari</strong></td>
    <td><strong>Telpon</strong></td>
    <td><strong>Aksi</strong></td>
</tr>
<?php //tampil data
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		if($cari=='')
			$a=mysql_query("select * from dokter");
		else{
			$a = mysql_query("SELECT * FROM dokter WHERE nip='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
elseif (isset($_POST['search2'])){ //cari
		$cari = $_POST['carii2'];
		if($cari=='')
			$a=mysql_query("select * from dokter");
		else{
			$a = mysql_query("SELECT * FROM dokter WHERE nama='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}else
	$a=mysql_query("select * from dokter");

while ($b=mysql_fetch_array($a)){
?>
<tr align="center">
	<td><?php echo $b['nip']; ?></td>
    <td><?php echo $b['nama']; ?></td>
    <td><?php echo $b['hari']; ?></td>
    <td><?php echo $b['telpon']; ?></td>
    <td><a href="?read=<?php echo $b['nip']; ?>"><button class="btn btn-warning"><i style="font-size:18px" class="fa fa-search"></i><small><small><small> Detail</small></small></small></button></a> <b style="color:white">|||</b> <a href="?edit=<?php echo $b['nip']; ?>"><button class="btn btn-info"><i style="font-size:18px" class="fa fa-upload"> </i><small><small><small> Update</small></small></small></button></a> <b style="color:white">|||</b> <a href="?delete=<?php echo $b['nip']; ?>"><button class="btn btn-danger"><i style="font-size:18px" class="glyphicon glyphicon-remove"> </i><small><small><small> Delete</small></small></small></button></a></td>
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
