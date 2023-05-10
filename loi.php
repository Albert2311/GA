<?php
session_start();
require "Authenticator.php";

$Authenticator = new Authenticator();

// if (!isset($_SESSION['auth_secret'])) {
//     $secret = $Authenticator->generateRandomSecret();
//     $_SESSION['auth_secret'] = $secret;
// }

// $qrCodeUrl = $Authenticator->getQR('myPHPnotes', $_SESSION['auth_secret']);
//test---------------------
use OTPHP\TOTP;
require 'vendor/autoload.php';
if (!isset($_SESSION['auth_secret2'])) {
    $otp = TOTP::generate();
    $secret2 = $otp->getSecret();
    $_SESSION['auth_secret2'] = $secret2;
}


// echo " The OTP secret2 is:{$_SESSION['auth_secret2']}\n";

$otp = TOTP::createFromSecret($_SESSION['auth_secret2']);
echo "The current OTP is: {$otp->now()}\n";

$qrCodeUrl2 = $Authenticator->getQR('myPHPnotes',$_SESSION['auth_secret2']);
// echo "<img src='{$qrCodeUrl2}'>";
// code ban dau
// $code = $Authenticator->getCode($_SESSION['auth_secret']);
// echo "secret1:".$_SESSION['auth_secret'];
// echo "code1: " .$code;
// echo "<img src='{$qrCodeUrl}'>";

//end test---------------------------------------
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = false;
}
?>