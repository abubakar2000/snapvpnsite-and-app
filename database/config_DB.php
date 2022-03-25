<?php

//  include ("includes/validator.php");
$DBhost = "localhost";
$DBuser = "snaprnqm_adminvpnuuuuu";
$DBpass = "Pass@word78";
$DBname = "snaprnqm_vpnpengu_vpnadmdddd";

// $DBhost = "localhost";
// $DBuser = "root";
// $DBpass = "";
// $DBname = "snaprnqm_vpnpengu_vpnadmdddd";

$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);


if ($DBcon->connect_errno) {
    die("ERROR : -> ".$DBcon->connect_error);
}
?>
