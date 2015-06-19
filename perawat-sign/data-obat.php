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

function tambah(){ // untuk mengudate data

	date_default_timezone_set("Asia/Jakarta");
	$a=date("Ymd_His");
	
	$b=$_POST['b'];$c=$_POST['c'];
	$d=$_POST['d'];$e=$_POST['e'];$f=$_POST['f'];
	$g=$_POST['g'];$h=$_POST['h'];$i=$_POST['i'];
	$j=$_POST['j'];$k=$_POST['k'];$l=$_POST['l'];
	$m=$_POST['m'];
	
	$chari = mysql_query("SELECT * FROM data_obat WHERE nama='$b'");
	$char  = mysql_fetch_array($chari);
	$ch    = $char['nama'];
	
	if ($b != $ch){
	$input2 = mysql_query("INSERT INTO `data_obat`(`id_dataobat`, `nama`, `jenis`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES 
	('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
	
	$aa=date("Ymd_His");
	$tang=date("Y-m-d");
	
	$up2=mysql_query("INSERT INTO `obat`(`id_obat`, `nama`, `jenis`, `tanggal`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES 
	('$aa','$b','$c','$tang','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
	}
	else
		echo '<script>alert("data sudah ada !")</script>';
}

function update(){ // untuk mengudate data
	$a=$_POST['a'];$b=$_POST['b'];$c=$_POST['c'];
	$d=$_POST['d'];$e=$_POST['e'];$f=$_POST['f'];
	$g=$_POST['g'];$h=$_POST['h'];$i=$_POST['i'];
	$j=$_POST['j'];$k=$_POST['k'];$l=$_POST['l'];
	$m=$_POST['m'];
	date_default_timezone_set("Asia/Jakarta");
	$aa=date("Ymd_His");
	$tang=date("Y-m-d");
	
	$up=mysql_query("UPDATE `data_obat` SET
	`nama`='$b',`jenis`='$c',`bulan_tahun`='$d',
	`jml_obat_awal`='$e',`strip`='$f',`butir`='$g',
	`ampul`='$h',`botol`='$i',`jml_pemakaian_butir`='$j',
	`jml_pemakaian_botol`='$k',`jml_sisa_butir`='$l',`jml_sisa_strip`='$m' WHERE id_dataobat='$a'");
	
	$up2=mysql_query("INSERT INTO `obat`(`id_obat`, `nama`, `jenis`, `tanggal`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES 
	('$aa','$b','$c','$tang','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
}
function delete(){
	$nipd=$_GET['delete'];
	date_default_timezone_set("Asia/Jakarta");
	$aa=date("Ymd_His");
	$tang=date("Y-m-d");
	
	$asomasi = mysql_query("select * from data_obat where id_dataobat='$nipd'");
	$somasi = mysql_fetch_array($asomasi);
	$namanya = $somasi['nama'];
	$c=$somasi['jenis'];
	$d= date("Y-m");
	$e='Data Obat Telah Dihapus !'; $f=0;$g=0;$h=0;$i=0;$j=0;$k=0;$l=0;$m=0;
	
	$oom= mysql_query("insert into obat(`id_obat`, `nama`, `jenis`, `tanggal`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES 
	('$aa','$namanya','$c','$tang','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
	
	$soo= mysql_query("delete from data_obat where id_dataobat='$nipd'");
	header('Refresh: 0; url=data-obat.php');
}
if (isset($_POST['tambah'])){ 
		echo tambah();
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
                    <li class="active">
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
                            Halaman Obat <small><small>Bagian data obat</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Obat</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Data obat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman melihat data obat?</strong> Disini juga bisa melakukan penambahan data, pengubahan data, dan penghapusan data obat.!
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
		$z=mysql_query("select * from data_obat where id_dataobat='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);
		$k=$z1['nama'];
		
		echo '<h2 class="page-header alert alert-success" style="">
                           Ubah data <small><small> Data obat dengan nama : '.$k.'</small></small>
                        </h2>';
		echo "<form action='data-obat.php' method='post' class='form form-static'>
					<table class='table table-hover'>
					<input type='hidden' value='".$z1['id_dataobat']."' name='a' />
					<tr><td>nama</td><td>jenis</td><td>bulan tahun</td><td>jumlah obat awal</td><td>strip</td><td>butir</td><td>ampul</td><td>botol</td><td>jumlah pemakaian </br> butir</td><td>jumlah pemakaian</br>botol</td><td>jumlah sisa</br>butir</td><td>jumlah sisa</br>strip</td></tr>
					<tr><td><input name='b' value='".$z1['nama']."' style='width:110px;'  /></td><td><input name='c' value='".$z1['jenis']."'  style='width:110px;' /></td>
					<td><input name='d' value='".$z1['bulan_tahun']."'  style='width:85px;' /></td><td><input name='e' value='".$z1['jml_obat_awal']."' style='width:110px;' /></td>
					<td><input name='f' value='".$z1['strip']."' style='width:45px;' /></td><td><input name='g' value='".$z1['butir']."' style='width:45px;' /></td>
					<td><input name='h' value='".$z1['ampul']."' style='width:45px;' /></td><td><input name='i' value='".$z1['botol']."' style='width:45px;' /></td>
					<td><input name='j' value='".$z1['jml_pemakaian_butir']."' style='width:95px;' /></td>
					<td><input name='k' value='".$z1['jml_pemakaian_botol']."' style='width:95px;' /></td><td><input name='l' value='".$z1['jml_sisa_butir']."' style='width:80px;' /></td>
					<td><input name='m' value='".$z1['jml_sisa_strip']."' style='width:80px;' /></td></tr>
					</table>
					<button type='submit' name='update' value='update' class='col-md-12 btn btn-danger' >Selesai</button>
					</form>
					<div class='col-md-12' style='height:30px'></div>";
}elseif (isset($_GET['tambah']))
{
		$n = $_GET['tambah'];
		$z=mysql_query("select * from data_obat where id_dataobat='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);
		$k=$z1['nama'];
		
		echo '<h2 class="page-header alert alert-success" style="">
                           Tambah data <small><small> Data obat !</small></small>
                        </h2>';
		echo "<form action='data-obat.php' method='post' class='form form-static'>
					<table class='table table-hover'>
					<tr><td>nama</td><td>jenis</td><td>bulan tahun</td><td>jumlah obat awal</td><td>strip</td><td>butir</td><td>ampul</td><td>botol</td><td>jumlah pemakaian </br> butir</td><td>jumlah pemakaian</br>botol</td><td>jumlah sisa</br>butir</td><td>jumlah sisa</br>strip</td></tr>
					<tr><td><input class='form-control' name='b' value='".$z1['nama']."' style='width:110px;'  /></td><td><input name='c' class='form-control' value='".$z1['jenis']."'  style='width:110px;' /></td>
					<td><input class='form-control' class='form-control' name='d' value='".$z1['bulan_tahun']."'  style='width:85px;' /></td><td><input class='form-control' name='e' value='".$z1['jml_obat_awal']."' style='width:110px;' /></td>
					<td><input class='form-control' name='f' value='".$z1['strip']."' style='width:45px;' /></td><td><input class='form-control' name='g' value='".$z1['butir']."' style='width:45px;' /></td>
					<td><input class='form-control' name='h' value='".$z1['ampul']."' style='width:45px;' /></td><td><input class='form-control' name='i' value='".$z1['botol']."' style='width:45px;' /></td>
					<td><input class='form-control' name='j' value='".$z1['jml_pemakaian_butir']."' style='width:95px;' /></td>
					<td><input class='form-control' name='k' value='".$z1['jml_pemakaian_botol']."' style='width:95px;' /></td><td><input class='form-control' name='l' value='".$z1['jml_sisa_butir']."' style='width:80px;' /></td>
					<td><input class='form-control' name='m' value='".$z1['jml_sisa_strip']."' style='width:80px;' /></td></tr>
					</table>
					<button type='submit' name='tambah' value='update' class='col-md-12 btn btn-danger' >Selesai</button>
					</form>
					<div class='col-md-12' style='height:30px'></div>";
}else{
echo '
	<form action="" method="post">
	<div class="nav" style="background-color:green;border-radius:20px;">
		<div align="left" class="pull-left col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nama: </strong>
		<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div><div align="center" class="col-md-4">
		<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Jenis: </strong>
		<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
		<button type="submit" name="search2" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
';
}
?>
<div style="height:50px" class="col-md-12">
<div style="height:10px" class="col-md-12"></div>
<a href="data-obat.php?tambah=0"><div class="col-md-1 pull-left btn btn-success"><i class="fa fa-plus"></i> Tambah</div></a>
</div>
<table class="table table-hover">  
<tr align="center"><td></td>
	<td><strong> Nama </strong></td>
    <td><strong>Jenis</strong></td>
    <td><strong>Bulan dan Tahun</strong></td>
    <td><strong>Jumlah Obat Awal</strong></td>
    <td><strong>Edit</strong></td>
</tr>
<?php //tampil data
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		if($cari=='')
			$a=mysql_query("select * from data_obat");
		else{
			$a = mysql_query("SELECT * FROM data_obat WHERE nama='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
elseif (isset($_POST['search2'])){ //cari
		$cari = $_POST['carii2'];
		if($cari=='')
			$a=mysql_query("select * from data_obat");
		else{
			$a = mysql_query("SELECT * FROM data_obat WHERE jenis='".$cari."'");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}else
	$a=mysql_query("select * from data_obat");

$nomor=0;
while ($b=mysql_fetch_array($a)){$nomor=$nomor+1;
?>
<tr align="center">
	<td><?php echo $nomor; ?></td>
	<td><?php echo $b['nama']; ?></td>
    <td><?php echo $b['jenis']; ?></td>
    <td><?php echo $b['bulan_tahun']; ?></td>
    <td><?php echo $b['jml_obat_awal']; ?></td>
    <td><a href="?edit=<?php echo $b['id_dataobat']; ?>"><button class="btn btn-info"><i style="font-size:18px" class="fa fa-upload"> </i><small><small><small> Update</small></small></small></button></a> <b style="color:white">|||</b> <a href="?delete=<?php echo $b['id_dataobat']; ?>"><button class="btn btn-danger"><i style="font-size:18px" class="glyphicon glyphicon-remove"> </i><small><small><small> Delete</small></small></small></button></a></td>
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
