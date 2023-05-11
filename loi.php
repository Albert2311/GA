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
                            
                            <img style="text-align: center;;" class="img-fluid" src="<?php   echo $qrCodeUrl ?>" alt="Verify this Google Authenticator"><br><br>        
                            <input type="text" class="form-control" name="otp" placeholder="******" style="font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;"><br> <br>    
                            <button name="verify" type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px;">Verify</button>
                            <p>Have an account! <a href="home.php">home</a>.</p>
                                <p>Have an account! <a href="register.php">register</a>.</p>
                    </div>

                </form>
                <!--  -->
                <form action="codeQR.php" method="post">
                            <div class="social-icons">
                                 <!-- send back otp  -->
                                <input id ="resending" name="resending" type="submit" value="Chưa nhận được OTP?" class="btn btn-link" style="text-align: center;"></input>
                                <!-- < send back otp  -->
                                <p>Have an account! <a href="home.php">home</a>.</p>
                                <p>Have an account! <a href="register.php">register</a>.</p>
                            </div>
                        </form>