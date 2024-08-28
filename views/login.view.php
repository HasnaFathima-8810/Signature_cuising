
    <?php include("app/views/partials/header.php"); ?>

    <!-- main content starts here -->

    <div class="login-back">
        <div class="container">

            <div class="login-box">

                <img src="./assets/images/Login-img.webp" alt="signature Cuisine">
                <div class="login-div">
                    <h1 class="login-heading" data-aos="fade-down" data-aos-delay="300" data-aos-duration="600">
                        Welcome Back
                    </h1>
                    <div class="login-sub">
                        <span></span>
                        
                        <p>Login to your Account</p>
                        
                        <span></span>
                    </div>

                    <form action="" method="post">

                    <?php if(isset($errors) && count($errors) > 0): ?>
                    <div class="error-msg">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                        <label for="Email" data-aos="fade-left" data-aos-delay="300" data-aos-duration="600">Email*</label>
                        <input type="email" name="email" id="email" required data-aos="fade-left" data-aos-delay="300" data-aos-duration="600">

                        <label for="Password" data-aos="fade-right" data-aos-delay="300" data-aos-duration="600">Password*</label>
                        <input type="password" name="password" id="Password" required data-aos="fade-right" data-aos-delay="300" data-aos-duration="600">

                        <button 
                        type="submit" 
                        class="btn-main form-full-btn" 
                        data-aos="fade-up" 
                        data-aos-delay="300" 
                        data-aos-duration="600">
                            Login
                        </button>

                    </form>

                    <p>Don't Have an Account Yet? <a href="/register" class="inline-link">Sign up</a> </p>
                </div>

            </div>


        </div>
    </div>

    <!-- main content ends here -->

    <?php include("app/views/partials/footer.php");  ?>