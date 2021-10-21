<?php
session_start(); 
include "db_conn.php";

if(isset($_POST['otp_code'])) {
    $otp = $_SESSION['otp'];
    $otp_code = $_POST['otp_code'];
    $email=$_SESSION['email'];
    
    if($otp != $otp_code){
        header("Location:verify.php?error=Your valid code does not match ");
        exit();
    }else{
        header("Location: changePass.php");
        exit();
    }
}else{
    echo "Can't Connect";
}

