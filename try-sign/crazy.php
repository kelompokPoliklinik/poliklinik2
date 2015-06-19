<?php
 include ('db.php');
 
 if (isset($_POST['subb']))
{									$general_value = 0; $ggg = 0; $i = '';

	$ii = $_POST['nim'];
	
	$cekData = mysql_query("SELECT * FROM a");
	while($cekData2 = mysql_fetch_array($cekData)){
		$cekData3 = $cekData2['b'];
		if ($ii==$cekData3){
			$ggg = $ggg + 1;
			echo "<script> alert ('registrasi ada isinya');</script>";
		}
	}
	
if ($ggg != 0){
	$result = mysql_query("SELECT count(*) from a");
	$count_p =mysql_result($result, 0);
	$count_p = $count_p + 1;
	echo $count_p."</br>";
	
	$inp = mysql_query("SELECT * FROM a");
	while ($general_value == 0)	{
		$general_value2 = 0;
		while ($inp1=mysql_fetch_array($inp)){
			$hitt2 = $inp1['b'];
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
	
	$inputPasien = mysql_query("INSERT INTO `a`(`b`) VALUES ('$i')");
	if (!$inputPasien)
	{echo"<script language='javascript'> alert('gagal !');</script>";}
	else
	{echo "berhasil";}
}

	$result = mysql_query("SELECT count(*) from a");
	$count_p =mysql_result($result, 0);
	$count_p = $count_p + 1;
	echo $count_p."</br>";
 
 ?>
 
 <form method="post" action="">
 input : <input type="text" name="nim" />
 simpan: <button type="submit" name="subb" value="simpan" >SimpAn</button>
 </br></br></br></br></br></br></br></br></form> 
 
 
 
 
 
 
 
 
 
 
 
 -----------------------------------------------------------------------------------------------------------
 <?php
	$nama = 'MHS_1210963008';
	$count_ks = mysql_query("SELECT COUNT * FROM ks_transaksi WHERE id_pasien='".$nama."'");
	$result = mysql_query("SELECT count(*) from ks_transaksi WHERE id_pasien='".$nama."'");
	$count_p =mysql_result($result, 0);
	$count_p = $count_p + 1;
	$id_ks = $nama.$count_p;
	echo $id_ks."</br>";
	date_default_timezone_set("Asia/Jakarta");
	$arr=date("Ymd");
	$aa=date("YmdHis");
	$res = mysql_query("SELECT count(*) from pengunjung");
	$count_ks =mysql_result($res, 0);
	$count_ks += 1;
	$babu = 5;
	$cucu = $count_ks.'_'.$arr;
	
function tot(){
	date_default_timezone_set("Asia/Jakarta");
	$arr=date("Ymd");
	$aa=date("YmdHis");
	$res = mysql_query("SELECT count(*) from pengunjung");
	$count_ks =mysql_result($res, 0);
	$count_ks += 1;
	$babu = 5;
	$cucu = $count_ks.'_1_'.$arr;
	return $cucu;
}	
$sonnaa = tot();
echo $gaga = $babu.$sonnaa;
echo "</br>------------------------------------------------------------------------</br>";
$aaa= 'aku,juga,kamu c,aku c,aku,kamu c,kamu,kamu';

$bubu= substr($aaa,0,1);


echo "</br>------------------------------------------------------------------------</br>";

$r ='kamu,aku';
$hasill = $aaa.$r;
$str = 'data1 data2 data3 data4 data5'; 
$pisah = explode(' ',$str);     // hasilnya : $pisah[0] = “data1” ……. $pisah[4] = “data5”;

$hasil = explode(',',$hasill);
echo $hasil[0];
echo "</br>------------------------------------------------------------------------</br>";
print_r("Size 1: ".count($hasil)."<\br>");
echo "</br>------------------------------------------------------------------------</br>";
$h = count($hasil);
echo $h;
$am = 0;
echo "</br>------------------------------------------------------------------------</br>";
while($h>$am){ $am = $am + 1;
	echo $am."</br>";
	echo $hasil[$am];
}

	$da1 = "2015-04-04";
	$da2 = "2015-07-07";
	$input3 = mysql_query("SELECT * FROM ks_transaksi WHERE tanggal BETWEEN '$da1' AND '$da2'");
	$data_penyakit="-";
	while($the_data = mysql_fetch_array($input3)){
		$tambah_data1 = $the_data['anemnesa'];
	$data_penyakit = $data_penyakit.", ".$tambah_data1;
	}
	echo $data_penyakit."</br>";
	$hasil = explode(", ", $data_penyakit);
	$jumlah_hasil = count($hasil);
	echo $hasil[1]."</br>";
	echo $jumlah_hasil;
	$gogo = 0;
	while ($gogo <= $jumlah_hasil){$gogo = $gogo + 1 ;
		
	}

if(isset($_POST['tu'])){
	$aa= $_POST['jk'];
	$a = ("INSERT INTO `a`(`ab`) VALUES ('".$aa."')");
 }

?>
<form action="crazy.php" method="post">
<button type="submit"  name="tu">input</button>
<select  name="jk" style="border-radius:10px;"  class="col-md-12">
                            	<option style="border-radius:10px;" value='modul1'>modul0</option>
                                <option style="border-radius:10px;" value='modul2'>modul1</option>
								<!-- end option choose 'jenis kelamin' -->
                            </select>
</form>

