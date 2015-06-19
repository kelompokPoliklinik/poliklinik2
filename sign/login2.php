<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submi'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		include('db.php');
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("select * from user_n_pass where nama_pass='$username' AND pass_pass='$password' ");
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			$cekTiket = mysql_fetch_array($query);
			$cekTiket2 = $cekTiket['label_pass'];
			if ($cekTiket2 == 1){
				header("location: perawat_sign/");  // Redirecting To Other Page
			}
			else
				header("location: dokter_sign/");
		} else {
		$error = "Username or Password is invalid";
		}
		}
}
?>