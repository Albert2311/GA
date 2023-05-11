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
$otp = $_SESSION['otp'];
if($email != false && $password != false){
    $query = " SELECT * FROM users WHERE email = '$email' AND password = '$password' and code = $otp";
    // $query = " SELECT * FROM users WHERE email = '$email' AND code = '$otp'";

    $run_query = mysqli_query($conn , $query);
    if($run_query){
        $fetch_data = mysqli_fetch_assoc($run_query);
        $status = $fetch_data['status'];
        if($status != "Đã xác minh"){
            header("location: codeQR.php");
        }
    }
}
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication Successful</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico'  />
    <style>
        body,html {
            height: 100%;
        }       


        .bg { 
            /* The image used */
            background-image: url("images/bg.jpg");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
           
            background-size: cover;
        }
    </style>
</head>
<body  class="bg">
        welcome home
        <a href="logout.php" class="header__navbar-icon-link">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <p>Đăng xuất</p></a>
</body>
</html>