<?php
include_once 'dbconnect.php';
$uname = $MySQLi_CON->real_escape_string(trim($_POST['user_name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['user_email']));
	$upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$numdays = $MySQLi_CON->real_escape_string(trim($_POST['numdays']));
	//$exp = $MySQLi_CON->real_escape_string(trim($_POST['expiry']));
	$tomorrow = mktime(0,0,0,date("m"),date("d")+$numdays,date("Y"));
	$exp=date("Y/m/d", $tomorrow);
	
	$new_password = password_hash($upass, PASSWORD_DEFAULT);
	
	$check_email = $MySQLi_CON->query("SELECT user_email FROM users WHERE user_email='$email'");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		
		$query = "INSERT INTO users(user_name,user_email,user_pass,expiry) VALUES('$uname','$email','$new_password','$exp')";

		
		if($MySQLi_CON->query($query))
		{
			echo ("SUSKSES");
		//	$msg = "<div class='alert alert-success'>
		//				<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
		//			</div>";
		}
		else
		{
		
		echo("ERROR PENDAFTARAN");
			//$msg = "<div class='alert alert-danger'>
			//			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
			//		</div>";
		}
	}
	else{
		
				//$msg = "<div class='alert alert-danger'>
				//	<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				//</div>";
		echo("Email sudah di");
			
	}
	
	//$MySQLi_CON->close();
?>