<?php
// session_start();

// require "Authenticator.php";
include_once ("controller2.php");
// if ($_SERVER['REQUEST_METHOD'] != "POST") {
//     header("location: CodeQR.php");
//     die();
// }
// $Authenticator = new Authenticator();

// $checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

// if (!$checkResult) {
//     $_SESSION['failed'] = true;
//     header("location: CodeQR.php");
//     die();
// } 


?>
<?php
	// if(isset($_POST['login'])){
    //     $email = mysqli_real_escape_string($conn, $_POST['email']);
    //     $password = md5($_POST['password']);

	// 	$select = " SELECT * FROM users WHERE email = '$email' && password = '$password'";

	// 	$result = mysqli_query($conn, $select);

	// 	if(mysqli_num_rows($result) > 0){
	// 		$row = mysqli_fetch_array($result);

	// 		if($row['email'] == $email && $row['password'] == $password){
	// 			// $_SESSION['admin_name'] = $row['fname'];
	// 			header('location: loi.php');

	// 		}elseif($row['email'] != $email){
	// 			// $_SESSION['admin_name'] = $row['fname'];
	// 			header('location: loi.php');
	// 		}
	// 	}else{
	// 		$error[] = 'Sai mật khẩu hoặc địa chỉ email';
	// 	}
	// };
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Đăng nhập</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

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
                            <img src="images/image.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Đăng nhập</h2>
                        
                        <form action="index.php" method="post" autocomplete="off">
                        <?php
                            // if($errors > 0){
                            //     foreach($errors AS $displayErrors){
                            //     ?>
                            //     <div id="alert">
                            //         <?php echo $displayErrors ?>
                            //     </div>
                            //     <?php
                            //     }
                            // }
                            ?>
                            <input type="email" name="email" class="input" placeholder="Enter Your Email" required>
                            <input type="password" name="password" class="input" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button id="submit" name="login" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
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
</body>

</html>