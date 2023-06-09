<?php include_once ("controller2.php"); 
//test
// echo $_SESSION['email'];
//end test
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Đăng ký </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <style>
        #alert
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
        }
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
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Đăng ký</h2>
                        <?php 
                        // echo $msg; 
                        ?>
                        <form action="register.php" method="post" autocomplete="off">
                        <?php
                            if($errors > 0){
                                foreach($errors AS $displayErrors){
                                ?>
                                <div id="alert">
                                    <?php echo $displayErrors; ?>
                                    
                                </div>
                                <?php
                                }
                            }
                            ?> 
                            <input type="text" class="input" name="name" placeholder="Enter Your Name" required>
                            <input type="email" class="input" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirmPassword" placeholder="Enter Your Confirm Password" required>
                            <button name="signup" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="index.php">Login</a>.</p>
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

</body>

</html>