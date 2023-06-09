<?php
// session_start();
// require "Authenticator.php";
include_once ("controller2.php");
$Authenticator = new Authenticator();

if (!isset($_SESSION['auth_secret'])) {
    $secret = $Authenticator->generateRandomSecret();
    $_SESSION['auth_secret'] = $secret;
}

$qrCodeUrl = $Authenticator->getQR('myPHPnotes', $_SESSION['auth_secret']);
//test---------------------
// use OTPHP\TOTP;
// require 'vendor/autoload.php';
// if (!isset($_SESSION['auth_secret2'])) {
//     $otp = TOTP::generate();
//     $secret2 = $otp->getSecret();
//     $_SESSION['auth_secret2'] = $secret2;
// }


// echo " The OTP secret2 is:{$_SESSION['auth_secret2']}\n";

// $otp = TOTP::createFromSecret($_SESSION['auth_secret2']);
// echo "The current OTP is: {$otp->now()}\n";

// $qrCodeUrl2 = $Authenticator->getQR('myPHPnotes',$_SESSION['auth_secret2']);
// echo "<img src='{$qrCodeUrl2}'>";
// code ban dau
// $code = $Authenticator->getCode($_SESSION['auth_secret']);
// $privatekey = $_SESSION['auth_secret'];
// echo "secret1:".$_SESSION['auth_secret'];
// echo "\n";
// echo '$privatekey:'.$privatekey;
// echo "code1: " .$code;
// echo "<img src='{$qrCodeUrl}'>";
// echo $_SESSION['email'];
//end test---------------------------------------
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nhập OTP</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico'  />
        <!-- //Meta tag Keywords -->
        <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <!--/Style-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--//Style-CSS -->
    <style>
        /* #alert
        {
            height: auto;
            width: 100%;
            background: #ee05503b;
            padding: 0 15px;
            font-size: 19px;
            line-height: 40px;
            margin: 10px 0;
            color: #000;
            border-radius: 4px;
            text-align: center;
        } */
    </style>
</head>
<body>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                   
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image3.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree" style="text-align: center;">
                        <h2 >Nhập mã OTP</h2>
                        <!-- thong bao loi -->
                        <?php
                            if(isset($_SESSION['message'])){
                            ?>
                            <div id="alert" class="alert alert-dismissible fade show" role="alert" style="color:#0275d8; background:#bde0fe">
                            <?php echo $_SESSION['message']; ?> 
                            <!-- <script><?php echo $_SESSION['message']; ?></script> -->
                            </div>
                        <?php } ?>
                        <?php
                            if($errors > 0){
                                foreach($errors AS $displayErrors){
                        ?>
                            <div id="alert" class="alert alert-danger" role="alert">
                            <?php echo $displayErrors; ?>
                            <!-- <script>alert(' <?php echo $displayErrors; ?>')</script> -->
                            </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- end thong bao loi -->
                        <!-- form -->
                        <form action="home.php" method="post">    
                            <div style="text-align: center;">
                                <?php if ($_SESSION['failed']): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> Invalid Code.
                                    </div>
                                    <?php   
                                        $_SESSION['failed'] = false;
                                    ?>
                                <?php endif ?>
                                    <input type="text" class="form-control" name="code" placeholder="******" style="font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;"><br> <br>    
                                    <button type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px;">Xác nhận</button>
                            </div>
                        </form>
                        <!-- form -->
                        <!-- form 2 -->
                        <form action="codeQR.php" method="post">
                            <div class="social-icons">
                                
                                <!-- send back otp -->
                                <input id ="resending" name="resending" type="submit" value="Chưa nhận được OTP?" class="btn btn-link" style="text-align: center;"></input>
                                <!-- send back otp -->
                            </div>
                        </form>
                        <!-- end form 2 -->
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <script>
    const inputs = document.querySelectorAll(".input");
function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
</script>
    <!-- //form section start -->
</body>
</html>
