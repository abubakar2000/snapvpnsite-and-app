<?php 
    include("includes/connection.php");
    if (isset($_REQUEST["count"])) {
        $count = $_REQUEST["count"];
    }else{
        $count = 0;
    }
    $i = 1;
    $handler = fopen('usersData.csv','w');
    if ($handler === false) {
        die("Error saving data");
        exit;
    }
    fputcsv($handler,[
        "Username",
        "Email",
        "Password",
        "firstname",
        "Lastname",
        "Days"
    ]);
    while($i <= $count){
        $qry="INSERT INTO `users` (`username`, `email`, `password`, `Firstname`, `Lastname`,`Days`) VALUES
         ('".$_POST[$i."_username"]."', '".$_POST[$i."_email"]."', '".$_POST[$i."_password"]."', '".$_POST[$i."_firstname"]."', '".$_POST[$i."_lastname"]."', '".$_POST[$i."_days"]."');";
        echo $qry;
        $result=mysqli_query($mysqli,$qry);
        fputcsv($handler,[
                $_POST[$i."_username"],
                $_POST[$i."_email"],
                $_POST[$i."_password"],
                $_POST[$i."_firstname"],
                $_POST[$i."_lastname"],
                $_POST[$i."_days"]
            ]);
            $i++;
        }
    $remoteURL = 'usersData.csv';
            header("Content-type: application/x-file-to-save"); 
            header("Content-Disposition: attachment; filename=".basename($remoteURL));
            ob_end_clean();
            readfile($remoteURL);

            fclose($handler);
        
            // header( "Location:add_users.php");
            // exit;
        
        
        
    
    
?>