<?php include ('db.php');
function update(){ // untuk mengudate data
	$id_pasien=$_POST['id_pasien'];
	$nama=$_POST['nama'];
	$nim=$_POST['nim_nip'];
	$tempat=$_POST['tempat_lahir'];
	$tanggal=$_POST['tanggal_lahir'];
	$alamat=$_POST['alamat'];
	$jk=$_POST['jenis_kelamin'];
	$pekerjaan=$_POST['pekerjaan'];
	$fak=$_POST['fakultas'];
	$alergi=$_POST['alergi'];
	$up=mysql_query("UPDATE `poliklinik`.`data_pasien` SET nama='$nama', nim_nip='$nim', tempat_lahir = '$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin = '$jk', pekerjaan='$pekerjaan', fakultas='$fak', alergi = '$alergi' WHERE `data_pasien`.`id_pasien` = '$id_pasien';") or die (mysql_error());
}

if (isset($_POST['update'])){ //mengambil data dari update
		echo update();
	}
if (isset($_GET['delete'])){
	$id_pasiend=$_GET['delete'];
	mysql_query("delete from data_pasien where id_pasien='$id_pasiend'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
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
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="height:15px;">
				<div style="speak-header:always;"></div>
                <ul class="nav navbar-nav side-nav" style="background-color: #030;height:15px;">
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
                            <i class="fa fa-info-circle"></i>  <strong>Merupakan halaman crud data pasien?</strong> Tapi masih belum fix.!
                        </div>
                    </div>
                </div>

                <div class="row">
				<!-- isi -->
<?php
if (isset($_GET['edit']))
{
		$n = $_GET['edit'];
		$z=mysql_query("select * from data_pasien where id_pasien='$n'"); // query edit berdasarkan id_pasien
		$z1=mysql_fetch_array($z);

		echo '<h2> Edit data</h2>';
		echo '<form action="hell.php" method="post">
					<table class="table table-hover">
					<tr><td>ID Pasien</td><td><input type="hidden" name="id_pasien" value="'.$n.'"/></td></tr>
					<tr><td>Nama</td><td><input type="text" name="nama" value="'.$z1['nama'].'"/></td></tr>
					<tr><td>NIM/NIP</td><td><input type="text" name="nim_nip" value="'.$z1['nim_nip'].'"/></td></tr>
					<tr><td>Tempat Lahir</td><td><input type="text" name="tempat_lahir" value="'.$z1['tempat_lahir'].'" /></td></tr>
					<tr><td>Tanggal Lahir</td><td><input type="text" name="tanggal_lahir" value="'.$z1['tanggal_lahir'].'" /></td></tr>
					<tr><td>Alamat</td><td><input type="text" name="alamat" value="'.$z1['alamat'].'" /></td></tr>
					<tr><td>Jenis Kelamin</td><td><input type="text" name="jenis_kelamin" value="'.$z1['jenis_kelamin'].'" /></td></tr>
					<tr><td>Pekerjaan</td><td><input type="text" name="pekerjaan" value="'.$z1['pekerjaan'].'" /></td></tr>
					<tr><td>Fakultas</td><td><input type="text" name="fakultas" value="'.$z1['fakultas'].'" /></td></tr>
					<tr><td>Alergi</td><td><input type="text" name="alergi" value="'.$z1['alergi'].'" /></td></tr>
					</table>
					<button type="submit" name="update" value="update" >Update</button>
					</form>';
}else{
echo '<h2> BRBRBR</h2>';
}
?>

<table width="1000" border="2" >  
<tr>
	<td align="center" bgcolor="#00FF00"> <strong> ID Pasien </strong></td>
    <td align="center" bgcolor="#00FF00"><strong>Nama</strong></td>
    <td align="center" bgcolor="#00FF00"><strong>Alamat</strong></td>
    <td align="center" bgcolor="#00FF00"><strong>Pekerjaan</strong></td>
    <td align="center" bgcolor="#00FF00"><strong>Aksi</strong></td>
</tr>
<?php //tampil data
$a=mysql_query("select * from data_pasien");
while ($b=mysql_fetch_array($a)){
?>
<tr>
	<td align="center"><?php echo $b['id_pasien']; ?></td>
    <td align="center"><?php echo $b['nama']; ?></td>
    <td align="center"><?php echo $b['alamat']; ?></td>
    <td align="center"><?php echo $b['pekerjaan']; ?></td>
    <td><a href="?edit=<?php echo $b['id_pasien']; ?>"><button>Update</button></a> || <a href="?delete=<?php echo $b['id_pasien']; ?>"><button>Delete</button></a></td>
</tr>
<?php
}
?>
</table>
                </div>				
				
            </div>
			<!-- End./ container -->
        </div>
		
        <!-- End./ halaman -->

    </div>

</body></html>

<!DOCTYPE html>
<html>
<head>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").fadeOut();
        $("#divi").fadeOut("slow");
        $("#div2").fadeOut("slow");
        $("#div3").fadeOut(3000);
    });
	/*$("button").click(function(){
        $("#div1").fadeIn();
        $("#divi").fadeIn("slow");
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
    });*/
});
</script>
</head>
<body>

<p>Demonstrate fadeOut() with different parameters.</p>

<button id='bb'>Click to fade out boxes</button><br><br>
<button id='b1'>Click to fade inn boxes</button><br><br>

<div id="div1" style="width:80px;height:80px;background-color:red;"></div><br>
<div id="div2" style="width:80px;height:80px;background-color:green;"></div><br>
<div id="div3" style="width:80px;height:80px;background-color:blue;"></div>

<div class="col-md-12 container">
	<script language="javascript">
	$(document).ready(function(){
		$("#but").click(function(){
			$("#nono").fadeOut();
			$("#nono1").fadeIn("slow");
			$("#nono2").fadeOut("slow");
			//$("#div3").fadeOut(3000);
		});
		$("#butot").click(function(){
			$("#nono").fadeIn();
			$("#nono1").fadeOut("slow");
			$("#nono2").fadeIn("slow");
			//$("#div3").fadeOut(3000);
		});
	});
	</script>
	<button id="but">tampil</button><button id="buto">hilang</button>
	<div id="nono" style="background-color:green;">satuu</div>
	<div id="nono1" style="background-color:green; display:none;">duaaa</div>
	<div id="nono2" style="background-color:green;">tigaaa</div>
</div>


</body>
</html>

</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>