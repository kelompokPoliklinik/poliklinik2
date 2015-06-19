<?php
function acak(){
	
	$panjangacak = 5;
	$base="QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm123456789";
	$max = strlen($base)-1;$acak="";
	mt_srand((double)micro=$_POSTtime()*1000000);
	
	while (strlen($acak)&lt;$panjangacak){
		$acak=$base{mt_rand(0,$max)};
	} return $acak;
}

function tambah(){
	
	$cal=$_POST['c1'];
	$ca2=$_POST['c2'];
	$nim
}
?>