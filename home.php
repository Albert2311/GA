<?php 
include_once("controller2.php"); 
?>
<?php
// session_start();

// require "Authenticator.php";
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: codeQR.php");
    die();
}
$Authenticator = new Authenticator();

$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['otp'], 3);    // 2 = 2*30sec clock tolerance
$privatekey = $_SESSION['auth_secret'];
if (!$checkResult) {
    $_SESSION['failed'] = true;
    header("location: codeQR.php");
    die();
} 
//
// if (isset($_POST['verify'])) {
//         $_SESSION['message'] = "";
//         $otp = mysqli_real_escape_string($conn, $_POST['otp']);
//         // lưu gia tri otp nhap trong button/input
//         $_SESSION['otp'] = $otp;
//         // end lưu gia tri otp nhap trong button/input
//         $otp_query = "SELECT * FROM users WHERE code = '$privatekey'";
//         $otp_result = mysqli_query($conn, $otp_query);

//         if (mysqli_num_rows($otp_result) > 0) {
//             $fetch_data = mysqli_fetch_assoc($otp_result);
//             $fetch_code = $fetch_data['code'];

//             $update_status = "Đã xác minh";
//             $update_code = 0;

//             $update_query = "UPDATE users SET code = $update_code WHERE code = '$privatekey'";
//             $update_result = mysqli_query($conn, $update_query);
//         } else {
//             $errors['otp_error'] = "Mã xác minh không hợp lệ!";
//         }
//         // var_dump(`SELECT * FROM users WHERE code = 'JCGMKBZH2DON5DHI'`);
//         // echo $privatekey;

//     }
// $email = $_SESSION['email'];
// $password = $_SESSION['password'];

// if($email != false && $password != false){
//     $query = " SELECT * FROM users WHERE email = '$email' AND password = '$password'";
//     $run_query = mysqli_query($conn , $query);
//     if($run_query){
//         $fetch_data = mysqli_fetch_assoc($run_query);
//         $status = $fetch_data['status'];
//         if($status != "Đã xác minh"){
//             header("location: codeQR.php");
//         }
//     }
// }
// else{
//     header('location: index.php');
// }
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