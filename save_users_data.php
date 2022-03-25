<?php 

    include("includes/connection.php");
    if (isset($_REQUEST["count"])) {
        $count = $_REQUEST["count"];
    }else{
        $count = 0;
    }
    $i = 1;
    
    $filename = 'usersdata.csv';
    $f = fopen($filename, 'w');
    if ($f === false) {
        die('Error opening the file ' . $filename);
    }
    while($i <= $count){
        $qry="INSERT INTO `users` (`username`, `email`, `password`, `Firstname`, `Lastname`,`Days`) VALUES
         ('".$_POST[$i."_username"]."', '".$_POST[$i."_email"]."', '".$_POST[$i."_password"]."', '".$_POST[$i."_firstname"]."', '".$_POST[$i."_lastname"]."', '".$_POST[$i."_days"]."');";
        echo $qry;


// open csv file for writing


// write each row at a time to a file
	fputcsv($f, [$_POST[$i."_username"],$_POST[$i."_email"],$_POST[$i."_password"],$_POST[$i."_firstname"],$_POST[$i."_lastname"],$_POST[$i."_days"]]);


// close the file





$i++;
}
fclose($f);
    // header( "Location:add_users.php");
    exit;
?>