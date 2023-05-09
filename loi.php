<?php
use OTPHP\TOTP;
require 'vendor/autoload.php';
// A random secret will be generated from this.
// You should store the secret with the user for verification.
$otp = TOTP::generate();
$secret = $otp->getSecret();
// echo "The OTP secret is: {$otp->getSecret()}\n";
echo " The OTP secret is:{$secret}\n";

$otp = TOTP::createFromSecret($secret);
echo "The current OTP is: {$otp->now()}\n";

// // Note: You must set label before generating the QR code
$otp->setLabel('Label of your web');
// //
require "Authenticator.php";
$Authenticator = new Authenticator();
$qrCodeUrl = $Authenticator->getQR('myPHPnotes', $secret);
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = false;
}
//test
// $input = $_GET['otp'];

// $otp = TOTP::createFromSecret($secret); // create TOTP object from the secret.
// $otp->verify($input); // Returns true if the input is verified, otherwise false.
// $check = $otp->verify($input);
// if($check){
//     header('location: home.php');
// }else{
//     header('location: codeQR.php');
// }
//end test
//
// $grCodeUri = $otp->getQrCodeUri(
//     'https://chart.googleapis.com/chart?chs=qr&chs=300x300&chl=[DATA]&ecc=M',
//     '[DATA]'
// );
echo "<img src='{$qrCodeUrl}'>";

// $otp = TOTP::createFromSecret($secret); // create TOTP object from the secret.
// $otp->verify($input); // Returns true if the input is verified, otherwise false.
// ?>