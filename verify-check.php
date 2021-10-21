<?php
session_start(); 
include "db_conn.php";
if(isset($_POST['otp_code'])) {
    $otp = $_SESSION['otp'];
    $otp_code = $_POST['otp_code'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $re_password=$_SESSION['re_password'];
    if($otp != $otp_code){
        header("Location:verify.php?error=Your valid code does not match ");
    }else{
        
        $_SESSION['password']=$password;
        $sql = "INSERT INTO users(user_name, password) VALUES('$email', '$password')";
        $result = sqlsrv_query($conn, $sql);
        if ($result){
            header("Location: login.php?success=Your account has been created successfully, sign in to continue");
            exit();
    }else{
         echo "Can't Connect";
    }
}
}
