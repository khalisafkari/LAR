<?php
include_once '/dbconnect.php';
	$user_email = $MySQLi_CON->real_escape_string(trim($_POST['user_email']));
	$user_pass = $MySQLi_CON->real_escape_string(trim($_POST['user_pass']));
	
	$query = $MySQLi_CON->query("SELECT user_id, user_email, user_pass FROM users WHERE user_email='$user_email'");
	$row=$query->fetch_array();
	
	if(password_verify($user_pass, $row['user_pass']))
	{
		echo("sukses");
		//$_SESSION['userSession'] = $row['user_id'];
		//header("Location: home.php");
	}
	else
	{
		echo ("ERR");
		//$msg = "<div class='alert alert-danger'>
		//			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password does not exists !
		//		</div>";
	}
	
//	$MySQLi_CON->close();

?>

