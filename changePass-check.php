<?php
session_start(); 
include "db_conn.php";
$email=$_SESSION['email'];

if(isset($_POST['password']) && isset($_POST['re_password'])){
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);

	if (empty($password)) {
		header("Location: changePass.php?error=Password is required");
	    exit();
	}else if(empty($re_password)){
        header("Location: changePass.php?error=Confirm password is required");
	    exit();
	}else if($password !== $re_password){
        header("Location: changePass.php?error=Password does not match");
	    exit();
	}else{
		
		$sql="SELECT * FROM users WHERE user_name=$email";
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static'));
		$query = sqlsrv_num_rows($result);
		$row = sqlsrv_fetch_array($result);
		if($email){
			$password = md5($password);
			sqlsrv_query($conn, "UPDATE users SET password='$password' WHERE user_name='$email'");
			header("Location:login.php?success=Sign in to continue");
			exit();
		}else{
			echo"Can't Connect";
		}
		
	}

}else{
	echo"Can't Connect";
}