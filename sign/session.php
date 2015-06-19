<?php

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$localhost = "localhost";
$user = "root";
$pas = "";
$db = "poliklinik";

$koneksi = mysql_connect ($localhost,$user,$pas) or die ("koneksi gagal");
$konek_db = mysql_select_db($db, $koneksi);
//-------------------------------------------------------------------------------------------------

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from user_n_pass where nama_pass='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['nama_pass'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
