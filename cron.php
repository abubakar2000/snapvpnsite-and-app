<?php 
    include("./includes/connection.php");
   
        $qry="UPDATE users SET Days = Days -1;";
        echo $qry;
        $result=mysqli_query($mysqli,$qry);		
		
		if(mysqli_num_rows($result) > 0){ 
			$row=mysqli_fetch_assoc($result);
		}
        $qry="DELETE from users where Days <= 0;";
        echo $qry;
        $result=mysqli_query($mysqli,$qry);		
		
		if(mysqli_num_rows($result) > 0){ 
			$row=mysqli_fetch_assoc($result);
		}
    
?>