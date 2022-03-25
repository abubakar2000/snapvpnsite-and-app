<?php
    error_reporting(0);
 		 ob_start();
    session_start();
 
 	header("Content-Type: text/html;charset=UTF-8");


		  $DBuser = DEFINE ('DB_USER', 'snaprnqm_adminvpnuuuuu');
		  $DBpass = DEFINE ('DB_PASSWORD', 'Pass@word78');
		  $DBhost = DEFINE ('DB_HOST', 'localhost'); //host name depends on server
		  $DBname = DEFINE ('DB_NAME', 'snaprnqm_vpnpengu_vpnadmdddd');


		//   $DBuser = DEFINE ('DB_USER', 'root');
		//   $DBpass = DEFINE ('DB_PASSWORD', '');
		//   $DBhost = DEFINE ('DB_HOST', 'localhost'); //host name depends on server
		//   $DBname = DEFINE ('DB_NAME', 'snaprnqm_vpnpengu_vpnadmdddd');



$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);


	$mysqli =mysqli_connect('localhost','snaprnqm_adminvpnuuuuu','Pass@word78','snaprnqm_vpnpengu_vpnadmdddd');
	// $mysqli =mysqli_connect('localhost','root','','snaprnqm_vpnpengu_vpnadmdddd');

	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	mysqli_query($mysqli,"SET NAMES 'utf8'");

    if(isset($_SESSION['id'])){
    	$profile_qry="SELECT * FROM tbl_admin where id='".$_SESSION['id']."'";
	    $profile_result=mysqli_query($mysqli,$profile_qry);
	    $profile_details=mysqli_fetch_assoc($profile_result);

	    define("PROFILE_IMG",$profile_details['image']);
    }
    
	$license_filename="includes/.lic";
    $config_file_default= "dist/function.lic";
	$activate="activate/index.php";
	$install="install/index.php";
	$filename_data="includes/.lic";

?> 
	 
 