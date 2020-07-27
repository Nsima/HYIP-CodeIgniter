    <!--====== ERROR PART START ======-->
    
    <section class="error-area bg_cover" style="background-image: url(<?php echo config_item('base_url'); ?>assets/images/login-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <div class="login-box">
                        <div class="login-title text-center">
                            <img src="<?php echo config_item('base_url'); ?>assets/images/logo-2.png" alt="logo">
                            <h3 class="title">Welcome to Crypten!</h3>
                        </div>
                        <div class="login-input">
                            <form action="<?=base_url('do_login')?>" method="post">
                                <div class="input-box mt-10">
                                    <input type="email" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="input-box mt-10">
                                    <input type="password" placeholder="Password" name="password" required="">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div class="input-btn mt-10">
                                    <button class="main-btn" type="submit">login  <i class="fal fa-arrow-right"></i></button>
                                    <span>Need an account? <a href="signup">Signup</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== ERROR PART ENDS ======-->