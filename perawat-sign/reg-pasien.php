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
//----------- Dropdown Fakultas ----------------------------------------------
$fakultasW = '';
$cari = mysql_query("SELECT * FROM fakultas");
	 
	$fakultasW .= '<select  name="fak" style="border-radius:10px;" class=" form-control col-md-12">';
	while($baris = mysql_fetch_array($cari))
	{$fakultasW .= "<option style='border-radius:10px;' value='".$baris['fakultas']."'>".$baris['nama']."</option>";}
	$fakultasW .= '</select>';
//-----------------------------------------------------------------------------
if (isset($_POST['submit']))
{									$general_value = 0; $ggg = 0; $i = '';
	$a = $_POST['nama'];
	$ii = $_POST['nim'];
	$b = $_POST['tempat'];
	$c = $_POST['tanggal'];
	$d = $_POST['alamat'];
	$e = $_POST['jk'];
	$f = $_POST['pekerjaan'];
	$g = $_POST['fak'];
	$h = $_POST['alergi'];
	$idPasien = "_";
	
	$cekData = mysql_query("SELECT * FROM data_pasien");
	while($cekData2 = mysql_fetch_array($cekData)){
		$cekData3 = $cekData2['nomor_registrasi'];
		if ($ii==$cekData3){
			$ggg = $ggg + 1;
			echo "<script> alert ('registrasi ada isinya, sistem akan mencocokkan ke nomor yang belum terpakai');</script>";
		}
	}
	
if ($ggg != 0){
	$result = mysql_query("SELECT count(*) from data_pasien");
	$count_p =mysql_result($result, 0);
	$count_p = $count_p + 1;
	
	$inp = mysql_query("SELECT * FROM data_pasien");
	while ($general_value == 0)	{
		$general_value2 = 0;
		while ($inp1=mysql_fetch_array($inp)){
			$hitt2 = $inp1['nomor_registrasi'];
			if ($hitt2 == $count_p){
				$general_value2 = $general_value2 + 1;
			}
		}
		if ($general_value2 < 1){
			$general_value = 1;
		}
		else{
			$count_p = $count_p - 1;
		}
	}
	$i = $count_p;
}	
else{
$i = $ii;}
	
	if($f == 'mahasiswa')
		{$idPasien = "MHS_".+$i;}
	else if ( $f == 'dosen')
		{$idPasien = "DOS_".+$i;}
	else if ( $f == 'karyawan')
		{$idPasien = "KRY_".+$i;}
	else {$idPasien = "UMU_".+$i;}		
	$inputPasien = mysql_query("INSERT INTO `data_pasien`(`id_pasien`, `nama`, `nomor_registrasi`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `pekerjaan`, `fakultas`, `alergi`) VALUES ('$idPasien','$a','$i','$b','$c','$d','$e','$f','$g','$h') ");
	if (!$inputPasien)
	{echo"<script language='javascript'> alert('gagal !');</script>";
			}
	else
	{echo "<script language='javascript'> alert('berhasil, dengan nomor registrasi $i !');</script>"; 
			header("Location:trans-pasien.php?read=$idPasien");}
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

    <title> Balai Pengobatan</title>
	<!-- icon poliklinik -->
	<link rel="icon" href="../images/icon.png" type="image/x-icon"/>
	<!-- end./ icon poliklinik -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/edit-menu.css" rel="stylesheet">
    <link href="../css/bootstrap-datepicker3.min.css" rel="stylesheet">
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
<!------------------------------------------------------------------------------------------->		
		<!--Start./ halaman 1 -->
		<div id="page11">
        <div id="page-wrapper">
			<!-- Start./ Container -->
            <div class="container-fluid">
                <!-- Start./ Halaman Atas (Head) -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Halaman Pasien <small><small>Bagian Registrasi</small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i> Depan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Pasien</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-home"></i> Registrasi Pasien
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End./ Halaman Atas (Head) -->

                <div class="row">
                    <div class="col-lg-12">
                       <!-- <div class="alert alert-info alert-dismissable" style="border-radius:10px;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Halaman peng-<i>input</i>-an bagi pasein yang belum terdaftar!</strong> Halaman ini telah diisi dengan baik.!
                        </div>-->
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-12">
<!-- isi -->					
					<div class="col-md-12" align="center">
					<h3 style="color:DimGray;"><strong>Registrasi</strong></h3>
					</div>
					<div class="col-md-12" style="height:15px"></div>
						<form action="reg-pasien.php" method="post" class="form-control-static">
                    <div class="col-md-12">
                    	<div class="col-md-3">nama</div>
                    	<div class="col-md-9"><input class="form-control col-md-12" style="border-radius:10px;" type="text" name="nama" placeholder="tulis nama disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">nomor registrasi</div>
                    	<div class="col-md-9"><input class="form-control col-md-12" style="border-radius:10px;"  type="text" name="nim" placeholder=""  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">tempat lahir</div>
                    	<div class="col-md-9"><input class="form-control col-md-12" style="border-radius:10px;"  type="text" name="tempat" placeholder=""  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">tanggal lahir</div>
                    	<div class="col-md-9">
							<div class="span2 col-md-12" id="sandbox-container">
								<input style="border-radius:6px;" name="tanggal" class="form-control col-md-12" type="text" /></div>
						</div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">alamat</div>
                    	<div class="col-md-9"><input class=" form-control col-md-12" style="border-radius:10px;" type="text" name="alamat" placeholder="tulis alamat disini"  /></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">jenis kelamin</div>
                    	<div class="col-md-9">
                        	<select  name="jk" style="border-radius:10px;"  class="form-control col-md-12">
                            	<option style="border-radius:10px;" value='Laki-Laki'>Laki-Laki</option>
                                <option style="border-radius:10px;" value='Perempuan'>Perempuan</option>
								<!-- end option choose 'jenis kelamin' -->
                            </select></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">pekerjaan</div>
                    	<div class="col-md-9">
                        <select  name="pekerjaan" style="border-radius:10px;"  class="form-control col-md-12">
                            	<option style="border-radius:10px;" value='mahasiswa'>Mahasiswa</option>
                                <option style="border-radius:10px;" value='dosen'>Dosen</option>
                                <option style="border-radius:10px;" value='karyawan'>Karyawan</option>
                                <option style="border-radius:10px;" value='lain-lain'>Lain-Lain</option>
								<!-- end option choose 'pekerjaan' -->
                                <!-- ./ pekerjaan juga_digunakan_untuk_menentukan_Id_pasien -->
                            </select></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">fakultas</div>
                    	<div class="col-md-9"><?php echo $fakultasW; ?></div>
                            <div class="col-sm-12" style="height:6px;"></div>
                    	<div class="col-md-3">Alergi</div>
                    	<div class="col-md-9">
							<input class="form-control col-md-12" style="border-radius:10px;" value="-" type="text" name="alergi" placeholder="tulis alergi disini"  /></div>
                            <div class="col-sm-12" style="height:15px;"></div>
                        <div class="col-md-12" align="center" >
							<input type="submit" value="submit" style="border-radius:20px;" name="submit" class="col-md-12 btn btn-info"  /></div>
                    </div>
</form>
                    
			
<!--end./ isi-->					
                    </div>
                </div>

            </div>
			<!-- End./ container -->
        </div>
        </div>
		<!-- End./ halaman 1 -->
		<!-- Start./ halaman 2 -->
		<!-- End./ halaman 2 -->

    </div>
    <!-- End./ -->

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('element').datepicker();
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpp').datepicker();
			$('#dpp').datepicker();
			$('#sandbox-container input').datepicker({ format: 'yyyy-mm-dd'
    });
			
			
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>

</body>

</html>