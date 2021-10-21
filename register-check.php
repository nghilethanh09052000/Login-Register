<?php 
session_start(); 
include "db_conn.php";
include('smtp/PHPMailerAutoload.php');
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);
	if (empty($email)) {
		header("Location: register.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: register.php?error=Password is required");
	    exit();
	}else if(empty($re_password)){
        header("Location: register.php?error=Re_Password is required");
	    exit();
	}else if($password !== $re_password){
        header("Location: register.php?error=The confirmation password does not match");
	    exit();
	    //
	}else{
		//hashing the password
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE user_name='$email' ";
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static'));
		if (sqlsrv_num_rows($result) > 0){
			header("Location: register.php?error=The username is taken try another&$user_data");
	        exit();
	    }else{
	    	$otp = rand(100000,999999);
	    	$_SESSION['otp'] = $otp;
	    	$_SESSION['email'] = $email;
	    	$_SESSION['password'] = $password;
	    	$_SESSION['re_password'] = $re_password;
	    	
			require "PHPMailer-master/src/PHPMailer.php";  
			require "PHPMailer-master/src/SMTP.php"; 
			require 'PHPMailer-master/src/Exception.php'; 
			$mail = new PHPMailer\PHPMailer\PHPMailer(true); 
			try {
			    $mail->SMTPDebug = 2; 
			    $mail->isSMTP();  
			    $mail->CharSet  = "utf-8";
			    $mail->Host = 'smtp.gmail.com'; 
			    $mail->SMTPAuth = true; 
				$nguoigui = 'nghile979.k44@st.ueh.edu.vn';
				$matkhau = 'abcABC@123';
				$tennguoigui = 'Nghi';
			    $mail->Username = $nguoigui; 
			    $mail->Password = $matkhau;   
			    $mail->SMTPSecure = 'ssl';  
			    $mail->Port = 465;                 
			    $mail->setFrom($nguoigui, $tennguoigui ); 
			    
			    
			    $mail->addAddress($_POST['email']); 
			    $mail->isHTML(true);  // Set email format to HTML
			    $mail->Subject = 'From Hospital of Dermatology';      
			    $noidungthu = "<b>Hello!</b><br>Your Valid Code is! $otp" ;
			    $mail->Body = $noidungthu;
			    $mail->smtpConnect( array(
			        "ssl" => array(
			            "verify_peer" => false,
			            "verify_peer_name" => false,
			            "allow_self_signed" => true
			        )
			    ));
			    $mail->send();
			    echo 'Đã gửi mail xong';
			} catch (Exception $e) {
			    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
			}
			header("Location:verify.php");
			exit();
			
		}
	}
}






// else{
// 	echo"fail";
// 	exit();
	// hashing the password
  //       $password = md5($password);

	 //    $sql = "SELECT * FROM users WHERE user_name='$username' ";
		// $result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static'));

		// if (sqlsrv_num_rows($result) > 0) {
		// 	header("Location: index.php?error=The username is taken try another&$user_data");
	 //        exit();
		// }else {
  //          $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$username', '$password', '$name')";
  //          $result2 = sqlsrv_query($conn, $sql2);
  //          if ($result2) {
           	
  //          	 header("Location: index.php?success=Your account has been created successfully");
	 //         exit();
  //          }else {
	 //           	header("Location:index.php?error=unknown error occurred&$user_data");
		//         exit();
  //          }
		// }