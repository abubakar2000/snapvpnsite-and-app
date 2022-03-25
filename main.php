<?php
include("includes/connection.php");

if(!file_exists($license_filename)){
    header("Location:$install");
    exit;
}else{
    if(isset($_SESSION['admin_name'])){
        header("Location:home.php");
        exit;
    }
}
?>