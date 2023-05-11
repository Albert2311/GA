<?php
// session_start();

// require "Authenticator.php";
// if ($_SERVER['REQUEST_METHOD'] != "POST") {
//     header("location: codeQR.php");
//     die();
// }
// $Authenticator = new Authenticator();

// $checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['otp'], 2);    // 2 = 2*30sec clock tolerance

// if (!$checkResult) {
//     $_SESSION['failed'] = true;
//     header("location: codeQR.php");
//     die();
// } 
//
include_once("controller2.php"); 
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false){
    $query = " SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $run_query = mysqli_query($conn , $query);
    if($run_query){
        $fetch_data = mysqli_fetch_assoc($run_query);
        $status = $fetch_data['status'];
        if($status != "Đã xác minh"){
            header("location: codeQR.php");
        }
    }
}else{
    header('location: home.php');
}
?>