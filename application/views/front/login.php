<div class="about-us">
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                    <h2>Login</h2>
                    <!-- <ul>
                        <li><a href="JavaScript:;">Home</a></li>
                        <li><a href="JavaScript:;" class="active">Faq</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </section>
</div>
<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
				<form action="<?php echo base_url('login');?>" method="POST">
                <div class="login-box">
                    <h3>Login</h3>
                    <div class="input_wrap">
                        <input type="text" name="user_email" required="">
                        <label>Email</label>

                    </div>
                    <div class="input_wrap">
                        <input type="password" name="user_password" required="">
                        <label>Password</label>

                    </div>
                    <a href="JavaScript:;">Forget Password?</a>
                    <button type="submit">Login</button>
                </div>
				</form>
            </div>
        </div>
    </div>
</section>
