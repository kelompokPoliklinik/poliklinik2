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
function update(){ // untuk mengudate data
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
	
	$cari = mysql_query("SELECT * FROM data_pasien");
	$hitung_cari=0;
	while ($cari1 = mysql_fetch_array($cari)){
		$cari2 = $cari1['nomor_registrasi'];
		if ($nim == $cari2){
			$hitung_cari = $hitung_cari + 1;
		}
	}
	if ($hitung_cari > 0){
		$cari_lagi = mysql_query("SELECT * FROM data_pasien WHERE id_pasien='$id_pasien'");
		$cari_lagi1 = mysql_fetch_array($cari_lagi);
		$nim = $cari_lagi1['nomor_registrasi'];
		$pekerja =  $cari_lagi1['pekerjaan'];
		
		if($pekerjaan != $pekerja){
			if($pekerjaan == 'mahasiswa')
			{$idPasien = "MHS_".+$nim;}
			else if ( $pekerjaan == 'dosen')
				{$idPasien = "DOS_".+$nim;}
			else if ( $pekerjaan == 'karyawan')
				{$idPasien = "KRY_".+$nim;}
			else {$idPasien = "UMU_".+$nim;}
		$up=mysql_query("UPDATE `poliklinik`.`data_pasien` SET id_pasien='$idPasien', nama='$nama', nomor_registrasi='$nim', tempat_lahir = '$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin = '$jk', pekerjaan='$pekerjaan', fakultas='$fak', alergi = '$alergi' WHERE `data_pasien`.`id_pasien` = '$id_pasien';") or die (mysql_error());
		}
		else{
			$up=mysql_query("UPDATE `poliklinik`.`data_pasien` SET nama='$nama', nomor_registrasi='$nim', tempat_lahir = '$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin = '$jk', pekerjaan='$pekerjaan', fakultas='$fak', alergi = '$alergi' WHERE `data_pasien`.`id_pasien` = '$id_pasien';") or die (mysql_error());
		}
	}else{
		if($pekerjaan == 'mahasiswa')
		{$idPasien = "MHS_".+$nim;}
		else if ( $pekerjaan == 'dosen')
			{$idPasien = "DOS_".+$nim;}
		else if ( $pekerjaan == 'karyawan')
			{$idPasien = "KRY_".+$nim;}
		else {$idPasien = "UMU_".+$nim;}	
		$up=mysql_query("UPDATE `poliklinik`.`data_pasien` SET id_pasien='$idPasien', nama='$nama', nomor_registrasi='$nim', tempat_lahir = '$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin = '$jk', pekerjaan='$pekerjaan', fakultas='$fak', alergi = '$alergi' WHERE `data_pasien`.`id_pasien` = '$id_pasien';") or die (mysql_error());
	
	}
}
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
function delete(){
	$id_pasiend=$_GET['delete'];
	mysql_query("delete from data_pasien where id_pasien='$id_pasiend'");
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
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
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
                <a class="navbar-brand" href="index.php"> Balai Peng<i class="fa fa-spinner fa-spin"></i>batan</a>

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
					<li class="active">
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
                    <li>
                        <a href="game.php"><i class="fa fa-fw fa-book pull-left"></i> Laporan </a>
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
                        <!--<div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman data pasien?</strong> Halaman ini sudah fix.!
                        </div>-->
                    </div>
                </div>

                <div class="row">
				<!-- isi -->
<?php
$ee = "no data";
if (isset($_GET['edit']))
{
		$n = $_GET['edit'];
		$z=mysql_query("select * from data_pasien where id_pasien='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);

		//----------- Dropdown Fakultas ----------------------------------------------
		$fakultasW = '';
		$cari = mysql_query("SELECT * FROM fakultas");
			 
			$fakultasW .= '<select  name="fakultas" style="border-radius:10px;" class=" form-control col-md-12">';
			while($baris = mysql_fetch_array($cari))
			{$fakultasW .= "<option style='border-radius:10px;' value='".$baris['fakultas']."'>".$baris['nama']."</option>";}
			$fakultasW .= '</select>';
		//-----------------------------------------------------------------------------
		
		echo '<h2 class="page-header alert alert-success" style="">
                           Ubah data <small><small> Data pasien dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '<form action="data-pasien.php" method="post" class="form form-static">
					<table class="table table-hover">
					<tr><td></td><td><input type="hidden" name="id_pasien" value="'.$n.'"/></td></tr>
					<tr><td>Nama</td><td><input class="col-md-12 form-control" type="text" name="nama" value="'.$z1['nama'].'"/></td></tr>
					<tr><td>Nomor Registrasi</td><td><input class="col-md-12 form-control " type="text" name="nomor_registrasi" value="'.$z1['nomor_registrasi'].'"/></td></tr>
					<tr><td>Tempat Lahir</td><td><input class="col-md-12 form-control " type="text" name="tempat_lahir" value="'.$z1['tempat_lahir'].'" /></td></tr>
					<tr><td>Tanggal Lahir</td><td><input class="col-md-12 form-control " type="text" name="tanggal_lahir" value="'.$z1['tanggal_lahir'].'" /></td></tr>
					<tr><td>Alamat</td><td><input class="col-md-12 form-control " type="text" name="alamat" value="'.$z1['alamat'].'" /></td></tr>
					<tr><td>Jenis Kelamin</td><td><input class="col-md-12 form-control " type="text" name="jenis_kelamin" value="'.$z1['jenis_kelamin'].'" /></td></tr>
					<tr><td>Pekerjaan</td><td><select  name="pekerjaan" style="border-radius:10px;"  class="form-control col-md-12">
                            	<option style="border-radius:10px;" value="mahasiswa">Mahasiswa</option>
                                <option style="border-radius:10px;" value="dosen">Dosen</option>
                                <option style="border-radius:10px;" value="karyawan">Karyawan</option>
                                <option style="border-radius:10px;" value="lain-lain">Lain-Lain</option>
                            </select></div></td></tr>
					<tr><td>Fakultas</td><td>'.$fakultasW.'</td></tr>
					<tr><td>Alergi</td><td><input class="col-md-12 form-control " type="text" name="alergi" value="'.$z1['alergi'].'" /></td></tr>
					</table>
					<button type="submit" name="update" value="update" class="col-md-12 btn btn-warning" >Update</button>
					</form>
					<div class="col-md-12" style="height:10px"></div>';
}elseif (isset($_GET['read'])){
			$n = $_GET['read'];
		$z=mysql_query("select * from data_pasien where id_pasien='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);

		echo '<h2 class="page-header alert alert-success" style="">
                           Lihat data <small><small> Data pasien dengan ID : '.$n.'</small></small>
                        </h2>';
		echo '		<table class="table table-hover">
					<tr><td>ID Pasien</td><td><input type="text" name="id_pasien" value="'.$n.'" readonly /></td></tr>
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
}else{
echo '
	<form action="" method="post">
	<div class="nav" style="background-color:green;border-radius:20px;">
		<div align="left" class="pull-left col-md-4">
			<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nomor Registrasi: </strong>
			<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
			<button type="submit" name="search" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
		
		<div align="center" class="col-md-4">
			<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Nama: </strong>
			<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
			<button type="submit" name="search2" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
		<div align="right" class="col-md-4">
			<strong style="color:white; border-radius: 22px 0px 0px 22px;" class="btn btn-success">Cari Pekerjaan: </strong>
			<input type="text" name="carii3" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
			<button type="submit" name="search3" class="btn btn-success" style="border-radius: 0px 22px 22px 0px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>
';
}
?>
<div style="height:5px;"></div>
<div style="height:10px;"><a href="data-pasien.php" style="border-radius:20px;"><p><i style="font-size:15px; border-radius:20px;" class="fa fa-refresh btn btn-warning"></i> Data Pasien</p></a></div>
<div style="height:5px;"></div>
<div><h2 class="page-header alert alert-success" style="">
                           Data pasien <small><small> Data pasien terurut berdasarkan nomor registrasi</small></small>
                        </h2></div>
<table class="table table-striped table-bordered"  id="exx" data-pagination="true" data-search="true" data-page-list="[5, 10, 20, 50, 100, 200]">  
<thead>
<tr align="center">
	<td><strong> No. </strong></td>
	<td><strong>ID Pasien</strong></td>
    <td><strong>Nama</strong></td>
    <td><strong>Alamat</strong></td>
    <td><strong>Pekerjaan</strong></td>
    <td style="width:35%;"><strong>Aksi</strong></td>
</tr></thead>
<?php //tampil data
$a='';
$koko='';
if (isset($_POST['search'])){ //cari
		$cari = $_POST['carii'];
		
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nomor_registrasi='".$cari."' ");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
elseif (isset($_POST['search2'])){ //cari
		$cari = $_POST['carii2'];
		
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE nama='".$cari."' order by nomor_registrasi desc");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}elseif (isset($_POST['search3'])){ //cari
		$cari = $_POST['carii3'];
		if($cari=='')
			$a=mysql_query("select * from data_pasien");
		else{
			$a = mysql_query("SELECT * FROM data_pasien WHERE pekerjaan='".$cari."' order by nomor_registrasi desc");
			if(!$a)
				$koko ='data tidak ditemukan';
		}
}
else
	$a=mysql_query("select * from data_pasien order by nomor_registrasi desc");

$noo = 0;
while ($b=mysql_fetch_array($a)){
	$noo = $noo + 1;
?>
<tbody>
<tr align="center">
	<td><?php echo $noo; ?></td>
	<td><?php echo $b['id_pasien']; ?></td>
    <td><?php echo $b['nama']; ?></td>
    <td><?php echo $b['alamat']; ?></td>
    <td><?php echo $b['pekerjaan']; ?></td>
    <td><a href="?read=<?php echo $b['id_pasien']; ?>"><button class="btn btn-warning"><i style="font-size:18px" class="fa fa-search"></i><small><small> Detail</small></small></button></a> <b style="color:white">|||</b> <a href="?edit=<?php echo $b['id_pasien']; ?>"><button class="btn btn-info"><i style="font-size:18px" class="fa fa-upload"> </i><small><small> Update</small></small></button></a> <b style="color:white">|||</b> 
	<a href="?delete=<?php echo $b['id_pasien']; ?>"><button class="btn btn-danger"><i style="font-size:18px" class="glyphicon glyphicon-remove"> </i><small><small> Delete</small></small></button></a> <b style="color:white">|||</b> 
	<a href="trans-pasien.php?read=<?php echo $b['id_pasien']; ?>"><button class="btn btn-danger"><i style="font-size:18px">K</i>artu Status</button></a></td>
</tr></tbody>
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
<script>
$(document).ready(function() {
    $('#exx').dataTable();
} );
</script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
</html>