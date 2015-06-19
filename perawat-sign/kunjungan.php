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

//----------- Dropdown Fakultas ----------------------------------------------
$fakultasW = '';
$cari = mysql_query("SELECT * FROM fakultas");
	 
	$fakultasW .= '<select  name="fakultas" style="border-radius:10px;" class="col-md-12">';
	while($baris = mysql_fetch_array($cari))
	{$fakultasW .= "<option style='border-radius:10px;' value='".$baris['fakultas']."'>".$baris['nama']."</option>";}
	$fakultasW .= '</select>';

function readd(){ // untuk melihat data
	date_default_timezone_set("Asia/Jakarta");
	$times=date("Y-m-d H:i:s");
	$timess=date("Y-m-d");
	$bagian_id1=date("YmdHis");
	
	$nama=$_POST['nama'];//--> ini bukan nama pasien melainkan id
	$nim_nip=$_POST['nim_nip'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$umur=$_POST['umur'];
	$alamat=$_POST['alamat'];
	$fakultas=$_POST['fakultas'];
	$tanggal=$timess;
	$berat_badan_kg=$_POST['berat_badan_kg'];
	$tensi=$_POST['tensi'];
	$terapi=$_POST['terapi'];
	$tinggi_badan=$_POST['tinggi_badan'];
	$perawat=$_POST['perawat'];
	
	$id_p3 = mysql_query("SELECT * FROM perawat WHERE nama='".$perawat."'");
	$id_p4 = mysql_fetch_array($id_p3);
	$id_perawat = $id_p4['id_perawat'];
	
	$res = mysql_query("SELECT count(*) from ks_transaksi WHERE id_pasien='".$nama."'");
	$count_ks =mysql_result($res, 0);
	$count_ks += 1;
	$id_ks = $bagian_id1.$nama.$count_ks;
	
	$id_pengunjung = $bagian_id1.'_'.$nim_nip;
	
	$inputt = mysql_query("INSERT INTO `pengunjung`(`id_pengunjung`, `nama`, `nim_nip`, `jenis_kelamin`, `umur`, `alamat`, `fakultas`, `tanggal`, `berat_badan_kg`, `tensi`, `terapi`, `tinggi_badan`, `id_perawat`) VALUES 
													('$id_pengunjung','$nama','$nim_nip','$jenis_kelamin','$umur','$alamat','$fakultas','$tanggal','$berat_badan_kg','$tensi','$terapi','$tinggi_badan','$id_perawat')") or die (mysql_error());
}
if (isset($_POST['readdd'])){ //mengambil data dari read
		echo readd();
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
                            Halaman Pengunjung <small><small>Bagian Registrasi</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Pengunjung</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Input Pengunjung
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Halaman peng-<i>input</i>-an bagi pasein yang belum terdaftar!</strong> Halaman ini telah diisi dengan baik.!
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-12">
<!-- isi -->					
					<div class="col-md-12" align="center">
					<h3 style="color:DimGray;"><strong>Input Kunjungan</strong></h3>
					</div>
					<div class="col-md-12" style="height:15px"></div>
<form action="kunjungan.php" method="post" class="form-control-static">
                    <div class="col-md-12">
                    	<div class="col-md-3">nama</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="nama" placeholder="tulis nama disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">nim</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;"  type="text" name="nim_nip" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">jenis kelamin</div>
                    	<div class="col-md-9"><select  name="jenis_kelamin" style="border-radius:10px;"  class="col-md-12">
                            	<option style="border-radius:10px;" value='Laki-Laki'>Laki-Laki</option>
                                <option style="border-radius:10px;" value='Perempuan'>Perempuan</option>
								<!-- end option choose 'jenis kelamin' -->
                            </select></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">umur</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="umur" /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">alamat</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="alamat" placeholder="tulis alamat disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">fakultas</div>
                    	<div class="col-md-9"><?php echo $fakultasW; ?></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">berat badan (kg)</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="berat_badan_kg" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">tensi</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="tensi" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">terapi</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="terapi" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">tinggi badan</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="tinggi_badan" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
						<div class="col-md-3">Perawat</div>
                    	<div class="col-md-9"><input class="col-md-12" style="border-radius:10px;" type="text" name="perawat" placeholder="tulis disini"  /></div>
                            <div class="col-sm-12" style="height:15px;"></div>
                        <div class="col-md-12" align="center" >
							<input type="submit" value="submit" style="border-radius:20px;" name="readdd" class="col-md-12 btn btn-success"  /></div>
                    </div>
</form>
                    
			
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