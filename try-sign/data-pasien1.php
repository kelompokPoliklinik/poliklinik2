<?php
include ('db.php');
//---------------------- Lihat Data --------------------------------------------
$go='no data';
$qwert='no data';
$hasilbaca='no data';
$lihatDataPasien = mysql_query("SELECT * FROM data_pasien");
	$hasilCari ='';
	$hasilCari .= '<table class="table table-hover col-md-12" border="2"><tr style="box-shadow: inset 2px 3px 4px 2px gray;"><td>Nama</td><td>Alamat</td><td>TL</td><td>Aksi</td></tr>';
	while($baris1 = mysql_fetch_array($lihatDataPasien))
	{$a=$baris1['id_pasien'];
		$hasilCari .= "<tr>
	<td>".$baris1['nama']."</td>
	<td>".$baris1['alamat']."</td>
	<td>".$baris1['tanggal_lahir']."</td>
	<td align='center' style='width:30%'>
	<a data-toggle='collapse' data-parent='#downy' href='#tiga'><a href='?read=".$baris1['id_pasien']."'><button class='btn btn-info'>Edit</button></a></a><b style='color:white'> ||| </b>
	<a href='?read=".$baris1['id_pasien']."'><button class='btn btn-info'>Details</button></a><b style='color:white'> ||| </b> 
	<a href='?delete=".$baris1['id_pasien']."'><button class='btn btn-info'>Delete</button></a></td></tr>";
	}
	$hasilCari .= '</table>';
	
if(isset($_GET['delete'])){
	$del = $_GET['delete'];
	$dele=mysql_query("DELETE FROM `poliklinik`.`data_pasien` WHERE `data_pasien`.`id_pasien` = '$del'");
	//header('Refresh: 0; url=data-pasien.php');
	}
if(isset($_GET['edit'])){
	$qwert = $_GET['edit'];
	// $editor=mysql_query("INSERT INTO `data_pasien`(`id_pasien`, `nama`, `nim_nip`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `pekerjaan`, `fakultas`, `alergi`) VALUES ('$idPasien','$a','$i','$b','$c','$d','$e','$f','$g','$h') ");
	}
if(isset($_GET['']))	
if(isset($_GET['read'])){
	$go = $_GET['read'];
	$hasilbaca='
			<table class="table table-hover">
			<tr><td>ID Pasien</td><td><input /></td></tr>
			<tr><td>Nama</td><td><input /></td></tr>
			<tr><td>NIM/NIP</td><td><input /></td></tr>
			<tr><td>Tempat Lahir</td><td><input /></td></tr>
			<tr><td>Tanggal Lahir</td><td></td></tr>
			<tr><td>Alamat</td><td><input /></td></tr>
			<tr><td>Jenis Kelamin</td><td><input /></td></tr>
			<tr><td>Pekerjaan</td><td><input /></td></tr>
			<tr><td>Fakultas</td><td><input /></td></tr>
			<tr><td>Alergi</td><td><input /></td></tr>
			</table>';	
}
	/*
	function update(){
		
		$aaa = mysql_query("UPDATE pasien SET .... WHERE id_pasien=$idd");
	}
	function delete(){
		
		$aaa = mysql_query("DELETE FROM pasien WHERE id_pasien=$idd");
	} */

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

    <title>Poliklinik</title>
	<!-- icon poliklinik -->
	<link rel="icon" href="images/icon.png" type="image/x-icon"/>
	<!-- end./ icon poliklinik -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/edit-menu.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<style type="text/css">
body (background-color:ghostwhite;)
</style>
<body>
	<!-- Start./ -->
    <div id="wrapper">

        <!-- Start./ menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#161616; box-shadow: 0px 5px 5px -10px rgba(0, 0, 0, 0.700);">
            <!-- Start./ header -->
            <div class="navbar-header">
				<!--Start./ Tombol Responsive(hide and see sidebar menu) -->
                <button type="button" style="border-radius:20px;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
					<span style="color:DimGray;" class="glyphicon glyphicon-list"></span>
					<span class="icon-bar"></span>
                </button>
				<!--End./ Tombol Responsive(hide and see sidebar menu) -->
                <marquee behavior="alternate" direction="right"><a class="navbar-brand" href="index.php"> P<i class="fa fa-spinner fa-spin"></i>liklinik</a></marquee>

			</div>
			
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-md"></i> Hi, Perawat <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-cog fa-spin"></i> Setting</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.php" style="color:red;"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul><l
			<!--end./ header -->
			
            <!-- Start./ menu sidebar (udah pake responsive lho, ngebukanya ada di button ) -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
				<div style="speak-header:always;"></div>
                <ul class="nav navbar-nav side-nav" style="background-color: #030;">
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
                            <li>
                                <a href="ks-pasien.php"><i class="fa fa-ellipsis-v"></i> Data Berobat Pasien</a>
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
                            <li>
                                <a href="obat.php"><i class="fa fa-ellipsis-v"></i> Permintaan Obat</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="game.php"><i class="fa fa-fw fa-book pull-left"></i> History</a>
                    </li>
                    <li>
                        <a href="game.php"><i class="fa fa-fw fa-paper-plane-o pull-left"></i> Refreshing</a>
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
                        <h1 class="page-header" style="box-shadow: inset 2px 1px 2px gray;">
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
                    
<!--isi-->

<div class="container col-md-12">
  <div class="panel-group" id="downy"> 
    <div class="panel panel-default">
		<a href="#satu">
			<div class="btn btn-default col-md-12" align="left" style="background-color:!inherit;">
				<h4 class="panel-default" align="left">
					<b style="color:green;">Lihat Data </b><small>Panel Data</small>
				</h4>
			</div>
		</a>
      <div id="satu" class="panel-collapse collapse in">
        <div class="panel-body">
			<br>			
			<?php echo $del; echo $hasilCari; ?>
			</div>
      </div>
    </div>
    <div class="panel panel-default">
		<a data-toggle="collapse" data-parent="#downy" href="#dua">
			<div class="btn btn-default col-md-12" align="left" style="background-color:!inherit;">
				<h4 class="panel-default" align="left">
					Editor Data <small>Panel Data</small>
				</h4>
			</div>
		</a>
		<div id="dua" class="panel-collapse collapse" style="display:none;">
			<div class="panel-body">
				Hy Pell ! <?php echo $hasilbaca; ?>
			</div>
		</div>
    </div>
  </div> 
</div>

<!--end./ isi-->
                    
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
		
        <!-- End./ halaman -->

    </div>
    <!-- End./ -->
		<script language="javascript">
	$(document).ready(function(){
		$("#but").click(function(){
			$("#nono").fadeOut();
			$("#nono1").fadeOut("slow");
			$("#nono2").fadeOut("slow");
			//$("#div3").fadeOut(3000);
		});
		$("#buto").click(function(){
			$("#nono").fadeIn();
			$("#nono1").fadeIn("slow");
			$("#nono2").fadeIn("slow");
			//$("#div3").fadeOut(3000);
		});
	});
	</script>
	
		<div class="col-md-12" align="right">
	<button id="but">tampil</button><button id="buto">hilang</button>
	<div id="nono" style="background-color:green;">satuu</div>
	<div id="nono1" style="background-color:green;">duaaa</div>
	<div id="nono2" style="background-color:green;">tigaaa</div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body></html>
