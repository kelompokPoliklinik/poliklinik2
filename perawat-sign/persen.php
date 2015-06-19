<?php 
include ('../db.php');
$coco = mysql_query("SELECT * FROM ks_transaksi");
if(!$coco)
	echo "gagal";
$datanya = '';
while($cocob = mysql_fetch_array($coco)){
$cocobi = $cocob['anemnesa'];	
$datanya = $datanya.$cocobi.', ';
}
echo $datanya.'</br></br>';

$qwerty_data = "aku, kamu, dia, mereka, kamu, aku, aku";
$data = explode(", ",$datanya);
$data_a = count($data);
echo $data_a.'</br></br>';
$hitung = 0; 
$hutt = '<table class="table table-hover">';
$hutt .='<tr><td>nama penyakit</td><td>jumlah</td><td>rating</td>';
while($hitung < $data_a){$hitung_a=0;
	$data_b = $data[$hitung];
	$hitung_b = 0;
	if($hitung==0){
		while($hitung_a < $data_a){
			$data_c = $data[$hitung_a];
			if($data_b == $data_c){
				$hitung_b = $hitung_b + 1;
			}
		$hitung_a = $hitung_a + 1;	
		}
	}
	else{
		$hitung_c = 0; $hitung_d=0;
		while($hitung_c < $hitung){
			if($data[$hitung_c]==$data[$hitung]){
				$hitung_d = $hitung_d + 1;
			}
			if($hitung_d==0){
				while($hitung_a < $data_a){
					$data_c = $data[$hitung_a];
					if($data_b == $data_c){
						$hitung_b = $hitung_b + 1;
					}
					$hitung_a = $hitung_a + 1;
				}
			}
			$hitung_c = $hitung_c + 1;
		}
	}
	if ($hitung_b > 0){ 
		$hitung_e = 0; $hitung_f = 0;
		while ( $hitung_e < $hitung ){
			if ($data[$hitung]==$data[$hitung_e]){
				$hitung_f = $hitung_f + 1;
			}$hitung_e = $hitung_e + 1;
		}
		if ($hitung_f == 0){
			if ($data_b != ''){
				$total_rating = $hitung_b / $data_a * 100;
				$hutt .= "<tr><td>$data_b</td><td>$hitung_b</td><td>".number_format($total_rating,2)." %</td></tr>";}
		}
	}
	$hitung=$hitung + 1;
}
$hutt .= '</table>';
echo $hutt;
?>