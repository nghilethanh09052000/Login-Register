<?php 
session_start(); 
include "db_conn.php";
include('smtp/PHPMailerAutoload.php');
if (isset($_POST['email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	if (empty($email)) {
		header("Location: forgotPass.php?error=Email is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$email' ";
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static'));
		if (sqlsrv_num_rows($result) <= 0){
			header("Location: forgotPass.php?error=Sorry, no emails exists");
		}else{
			$otp = rand(100000,999999);
			$_SESSION['email'] = $email;
			$_SESSION['otp'] = $otp;
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
			header("Location:verify1.php");
			exit();

	    }
	}
}