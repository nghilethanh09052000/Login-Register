<?php
session_start();
include "db_conn.php";
if(isset($_POST['email']) && isset($_POST['password'])){

	function validate($data){
		$data = trim($data);
	  	$data = stripslashes($data);
	   	$data = htmlspecialchars($data);
	   	return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	if (empty($email)){
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$password= md5($password);
		$sql = "SELECT * FROM users WHERE user_name='$email' AND password='$password'";
		
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));

		if (sqlsrv_num_rows($result) === 1) {
			$row = sqlsrv_fetch_array($result);
            if ($row['user_name'] === $email && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['name'] = $row['name'];
            	header("Location: home.php");
		        exit();
            }else{
            	
            	header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}

}else{
	header("Location:login.php?error");
	exit();
}