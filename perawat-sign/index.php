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
                    <li class="active">
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
                            Halaman Depan <small>Selamat Datang</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Depan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Ingin menempatkan sesuatu?</strong> Tapi masih belum tahu menempatkan apa disini.!
                        </div>
                    </div>
                </div> -->
				
                <div class="row">
                    <div class="col-lg-6">
                        <div style="border-radius:10px;">
							<div class="col-md-12 alert alert-info" style="opacity:0.6; border-radius:5px;">
								<button type="button" class="close" id="sss" onClick="$('#sss').fadeOut(100);" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h5><i class="fa fa-info-circle"></i> Ada <strong>Pasien</strong> ? Cek datanya disini :</br></h5>
							</div>
							<div class="col-md-12">
								<?php 
								$aa ='';
								 if (isset($_POST['sea'])){ //cari
										$cari = $_POST['carii'];
										if($cari==''){
											echo "Isi Datanya dulu </br>";
											echo "<div class='btn btn-warning'><a href='index.php'>Kembali</a></div>";
										}
										else{
											$a = mysql_query("SELECT * FROM data_pasien WHERE nomor_registrasi='".$cari."'");
											if (!$a){
												echo "Datanya Belum Ada </br>";
											echo "<div class='btn btn-info'><a href='reg-pasien.php'>Registrasi Pasien</a></div></br></br>";
											echo "<div class='btn btn-info'><a href='reg-pasien.php'>Registrasi Pasien</a></div></br></br>";
											echo "<div class='btn btn-warning'><a href='index.php'>Kembali</a></div>";}
											else{
											$b=mysql_fetch_array($a);
												echo "<table class='table table-hover'><tr align='center'>
												<td><strong>Nama</strong></td>
												<tr align='center'>
												<td><a href='trans-pasien.php?read=".$b['id_pasien']."'>".$b['nama']."</a></td>
												</tr></table>
											";}
											}
										
								}elseif (isset($_POST['sear'])){ //cari
										$cari = $_POST['carii2'];
										if($cari==''){
											echo "Isi Datanya dulu </br>";
											echo "<div class='btn btn-warning'><a href='index.php'>Kembali</a></div>";
										}
										else{
											$a = mysql_query("SELECT * FROM data_pasien WHERE nama='".$cari."'");
											if (!$a){
												echo "Datanya Belum Ada </br></br>";
											echo "<div class='btn btn-info'><a href='reg-pasien.php'>Registrasi Pasien</a></div>";}
											else{
											$b=mysql_fetch_array($a);
												echo "<table class='table table-hover'><tr align='center'>
												<td style='width:30%;'><strong>No. Registrasi</strong></td>
												<td><strong>Nama</strong></td>
												<tr align='center'>
												<td><a href='trans-pasien.php?read=".$b['id_pasien']."'>".$b['nomor_registrasi']."</a></td>
												<td><a href='trans-pasien.php?read=".$b['id_pasien']."'>".$b['nama']."</a></td>
												</tr></table>
											";
											echo '<div align="center" style="height:10px;"><a href="index.php" style="border-radius:20px;"><p><i style="font-size:15px; border-radius:20px;" class="fa fa-refresh btn btn-warning"></i> kembali</p></a></div>';
											}
										}
								}else{ echo '
								 <form action="index.php" method="post">
	<div class="nav page-header alert alert-success" style="border-radius:20px;">
		<div align="left" class="pull-left col-md-6" style="height:150px;">
			<div class="col-md-12"  style="height:50px;"></div>
			<strong style="color:white; opacity:0.9; border-radius: 8px;" class="btn btn-success"> Cari nomor registrasi : </strong></br>
			<input type="text" name="carii" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
			<button type="submit" name="sea" class="btn btn-success" style="border-radius: 22px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div><div align="center" class="col-md-6" style="height:140px;">
			<div class="col-md-12"  style="height:50px;"></div>
			<strong style="color:white; opacity:0.9; border-radius: 8px;" class="btn btn-success"> Cari Nama : </strong></br>
			<input type="text" name="carii2" placeholder="Tulis Disini" style="border-radius: 0px 0px 0px 0px;" />
			<button type="submit" name="sear" class="btn btn-success" style="border-radius: 22px;"><i style="font-size:16px" class="fa fa-search"></i></button>
		</div>
	</div>
	</form>';
								 }
								?>
							</div>
						</div>
                    </div>
					<div class="col-lg-6">
						<div class="alert alert-info alert-success" style="border-radius:10px;">
							
						</div>
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
