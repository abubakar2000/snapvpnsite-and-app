<?php include("includes/connection.php");

    if (isset($_REQUEST['user'])) {
        

        $qry="UPDATE users SET days = 30 where username='".$_REQUEST['user']."'";
        echo $qry;
        $result=mysqli_query($mysqli,$qry);		
		
		if(mysqli_num_rows($result) > 0){ 

			$row=mysqli_fetch_assoc($result);
		}
    }
    header( "Location:add_users.php");
    exit;

    ?> 