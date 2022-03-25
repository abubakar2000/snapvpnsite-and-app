<?php
include_once("../database/config_DB.php");
//include_once("includes/connection.php");

$cookie_name = "_e_ll";
if(!isset($_COOKIE[$cookie_name])){
    header("Location:../lndex.php");
} else {
    $query = $DBcon->query("SELECT * FROM tbl_admin WHERE username='".$_COOKIE[$cookie_name]."'");
    $count = $query->num_rows;
    if($count < 1){
        header("Location:../lndex.php");
    }
}

//Add Servers
if(isset($_POST['addServer'])){
    $serverName =  $_POST['serverName'];
    $flagURL =  $_POST['flagURL'];
    $exploded =  explode("\n",$_POST['ovpn']);
    $ovpn = '';
    for($i = 0;$i < sizeof($exploded);$i++){
        if(strcmp($exploded[$i][0],"#")!= 0){
            $ovpn =$ovpn.$exploded[$i].'\n';
        }
    }
    //echo $ovpn;
    $vpnUsername =  $_POST['vpnUsername'];
    $vpnPassword =  $_POST['vpnPassword'];
    if(strcmp($_POST['isFree'],"free") == 0){
        $isFree = 1;
    }else{
        $isFree = 0;
    }
    if($query = $DBcon->query("INSERT INTO servers(serverName,flagURL,ovpnConfiguration,vpnUserName,vpnPassword,isFree) VALUES('".$serverName."','".$flagURL."','".$ovpn."','".$vpnUsername."','".$vpnPassword."',".$isFree.")")){
        header('Location:../index.php?status=success&message=Server added succesfully');
    }else{
        // //echo "And here";
        //echo $DBcon->error;
        header('Location:../add_servers.php.php?status=error&message=Error can\'t add server');
    }
}

//Change admob
if(isset($_POST['editAdmob'])){
    $admobID =  $_POST['admobID'];
    $interstitialID =  $_POST['interstitialID'];
    $bannerID =  $_POST['bannerID'];
    $nativeID =  $_POST['nativeID'];
    $RewardedAdID =  $_POST['RewardedAdID'];
    if($query = $DBcon->query("UPDATE `admobconfig` SET `admobID` = '".$admobID."', `interstitialID` = '".$interstitialID."' , `bannerID` = '".$bannerID."' , `nativeID` = '".$nativeID."' , `RewardedAdID` = '".$RewardedAdID."' WHERE `admobconfig`.`id` = 1")){
        header('Location:../index.php?status=success&message=Information changed succesfully');
    }else{
        //echo $DBcon->error;

        header('Location:../manage_admob?status=error&message=Error can\'t change information');
    }
}

//Change edit servers
if(isset($_POST['editServer'])){
    $id =  $_POST['id'];
    $serverName =  $_POST['serverName'];
    $flagURL =  $_POST['flagURL'];
    $exploded =  explode("\n",$_POST['ovpn']);
    $ovpn = '';
    for($i = 0;$i < sizeof($exploded);$i++){
        if(strcmp($exploded[$i][0],"#")!= 0){
            $ovpn =$ovpn.$exploded[$i].'\n';
        }
    }
    $vpnUsername =  $_POST['vpnUsername'];
    $vpnPassword =  $_POST['vpnPassword'];
    if(strcmp($_POST['isFree'],"free") == 0){
        $isFree = 1;
    }else{
        $isFree = 0;
    }
    if($query = $DBcon->query("UPDATE servers SET serverName = '".$serverName."',flagURL = '".$flagURL."',ovpnConfiguration = '".$ovpn."',vpnUserName =  '".$vpnUsername."', vpnPassword = '".$vpnPassword."',isFree = ".$isFree." WHERE id = ".$id)){
        header('Location:../index.php?status=success&message=Server edited succesfully');
    }else{
        // echo "And here";
        // echo $DBcon->error;
        header('Location:../add_servers.php?status=error&message=Error can\'t edit server');
    }
}

//Change password
if(isset($_POST['changePassword'])){
    $previousPassword =  $_POST['previousPassword'];
    $newPassword =  $_POST['newPassword'];
    $confirmPassword =  $_POST['confirmPassword'];
    if(strcmp($newPassword,$confirmPassword)==0){
        $query = $DBcon->query("SELECT * FROM tbl_admin WHERE password = '".$previousPassword."'");
        $row=$query->fetch_array();
        $count = $query->num_rows; // if userName/password are correct returns must be 1 row
        if ($count==1) {
            if($query = $DBcon->query("UPDATE `tbl_admin` SET `password` = '".$newPassword."' WHERE `tbl_admin`.`id` = 1")){
                header('Location:../index.php?status=success&message=Password changed succesfully');
            }else{
                // echo $DBcon->error;

                header('Location:../change_password.php?status=error&message=Error can\'t change information');
            }
        }else{
            //echo $DBcon->error;

            header('Location:../change_password.php?status=error&message=Incorrect previous password.');
        }
    }else{
        //echo $DBcon->error;

        header('Location:../change_password.php?status=error&message=New password don\'t match.');
    }
}

//Add Adss
if(isset($_POST['addAds']))
{
    $admobID =  $_POST['admobID'];
    $bannerID =  $_POST['bannerID'];
    $interstitialID =  $_POST['interstitialID'];
    $nativeID =  $_POST['nativeID'];
    $RewardedAdID =  $_POST['RewardedAdID'];
    //$adType =  $_POST['adType'];
    if(strcmp($_POST['activeAd'],"1") == 0)
    {
        $activeAd = 1;
    }
    else
    {
        $activeAd = 0;
    }

    if($query = $DBcon->query("INSERT INTO admobconfig(admobID, bannerID, interstitialID, nativeID,RewardedAdID, activeAd) VALUES('".$admobID."','".$bannerID."','".$interstitialID."','".$nativeID."','".$RewardedAdID."',".$activeAd.")"))
    {
        header('Location:../index.php?status=success&message=Ads config added succesfully');
    }
    else
    {
        header('Location:../add_ads.php.php?status=error&message=Error can\'t add ads config');
    }
}

//Change edit ads
if(isset($_POST['editAds']))
{
    $id =  $_POST['id'];
    $admobID =  $_POST['admobID'];
    $bannerID =  $_POST['bannerID'];
    $interstitialID =  $_POST['interstitialID'];
    $nativeID =  $_POST['nativeID'];
    $RewardedAdID =  $_POST['RewardedAdID'];
    //$adType =  $_POST['adType'];
    if(strcmp($_POST['activeAd'],"1") == 0)
    {
        $activeAd = 1;
    }
    else
    {
        $activeAd = 0;
    }

    if($query = $DBcon->query("UPDATE admobconfig SET admobID = '".$admobID."',bannerID = '".$bannerID."',interstitialID = '".$interstitialID."',nativeID =  '".$nativeID."', RewardedAdID = '".$RewardedAdID."',activeAd = ".$activeAd." WHERE id = ".$id))
    {
        if ($activeAd == 1)
        {
            if ($query = $DBcon->query("UPDATE admobconfig SET activeAd = 0 WHERE id != ".$id));
            {
                header('Location:../index.php?status=success&message=Ads config edited succesfully');
            }
        }
        {
            header('Location:../index.php?status=success&message=Ads config edited succesfully');
        }
    }
    else
    {
        header('Location:../add_ads.php?status=error&message=Error can\'t edit ads config');
    }
}
?>