<?php

$localhost = "localhost";
$user = "root";
$pas = "";
$db = "poliklinik";

$koneksi = mysql_connect ($localhost,$user,$pas) or die ("koneksi gagal");
$konek_db = mysql_select_db($db, $koneksi);

//---------------------- Lihat Data --------------------------------------------	

$lihatDataPasien = mysql_query("SELECT * FROM pasien");
	$hasilCari ='';
	$hasilCari .= '<table class="table table-hover" border="2"><tr><td>Id</td><td>Nama</td><td>Alamat</td><td>TL</td><td>Aksi</td></tr>';
	while($baris1 = mysql_fetch_array($lihatDataPasien))
	{
		$hasilCari .= "<tr>
	<td>".$baris1['nama']."</td>
	<td>".$baris1['alamat']."</td>
	<td>".$baris1['tanggal_lahir']."</td>
	<td><a href='?read=".$baris1['id_pasien']."'><button>Lihat</button></a>
	<a href='?edit=".$baris1['id_pasien']."'><button>Edir</button></a>
	<a href='?delete=".$baris1['id_pasien']."'><button>Delete</button></a></td></tr>";
	}
	$hasilCari .= '</table>';

if (isset($_POST['update'])){
	echo update;
}	
if (isset($_POST['delete'])){
	$qw=mysql_query("DELETE FROM pasien WHERE id_pasien=$idd");
}	
	
	function update(){
		
		$aaa = mysql_query("UPDATE pasien SET .... WHERE id_pasien=$idd");
	}
	function delete(){
		
		$aaa = mysql_query("DELETE FROM pasien WHERE id_pasien=$idd");
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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #E5E5E5 ;">
            <!-- Start./ header -->
            <div class="navbar-header">
				<!--Start./ Tombol Responsive(hide and see sidebar menu) -->
                <button type="button" style="border-radius:20px;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
					<span style="color:DimGray;" class="glyphicon glyphicon-list"></span>
					<span class="icon-bar"></span>
                </button>
				<!--End./ Tombol Responsive(hide and see sidebar menu) -->
                <marquee behavior="alternate" direction="right"><a style="color:#444;" class="navbar-brand" href="index.php"> P<i class="fa fa-spinner fa-spin"></i>liklinik</a></marquee>
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
            </ul>
			<!--end./ header -->
            <!-- Start./ menu sidebar (udah pake responsive lho, ngebukanya ada di button ) -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color:darkgreen;">
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
		<!--Start./ halaman -->
        <div id="page-wrapper">
			<!-- Start./ Container -->
            <div class="container-fluid">
                <!-- Start./ Halaman Atas (Head) -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
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
                        <?php echo $hasilCari; ?>
<!--end./ isi-->
                    </div>
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
        <!-- End./ halaman -->

    </div>
    <!-- End./ -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
