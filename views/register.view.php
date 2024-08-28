
    <?php include("app/views/partials/header.php");  ?>

    <!-- main content starts here -->

    <section id="heading-register" class="page-heading">
        <div class="container">
            <h1>
                Sign in
            </h1>
            <p>
                Join Us and Unlock Exclusive Benefits
            </p>
        </div>
        <img class="GoDown" src="./assets/images/Go-down.svg" alt="" onclick="lenis.scrollTo('main');">
    </section>

    <main>
        <div class="container">
            <h2 class="heading">
                Create an Account
            </h2>

            <div class="register-row">
                <form id="register" action="" method="post" data-aos="fade-right">

                    <?php if(isset($errors) && count($errors) > 0): ?>
                    <div class="error-msg">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-col">
                        <label for="reg-name">Full Name*</label>
                        <input type="text" name="reg-name" id="reg-name" required
                        value="<?php echo isset($_POST['reg-name']) ? $_POST['reg-name'] : ''; ?>">
                        
                    </div>
    
                    <div class="form-col">
                        <label for="reg-email">Email*</label>
                        <input type="email" name="reg-email" id="reg-email" required
                        value="<?php echo isset($_POST['reg-email']) ? $_POST['reg-email'] : ''; ?>">
                        
                    </div>
                    
                    <div class="form-col">
                        <label for="reg-phone">Phone*</label>
                        <input type="text" name="reg-phone" id="reg-phone" required
                        value="<?php echo isset($_POST['reg-phone']) ? $_POST['reg-phone'] : ''; ?>">
                        
                    </div>
    
                    <div class="form-col">
                        <label for="reg-dob">Date of Birth*</label>
                        <input type="date" name="reg-dob" id="reg-dob" required
                        value="<?php echo isset($_POST['reg-dob']) ? $_POST['reg-dob'] : '2000-01-01'; ?>" max="2010-01-01" min="1900-01-01">
                        
                    </div>

                    <?php $selectedBranchId = isset($_POST['res-branch']) ? $_POST['res-branch'] : ''; ?>

                    <div class="form-col">
                        <label for="res-branch">Prepared Branch*</label>
                        <select name="res-branch" id="res-branch">
                            <option value="">Select Branch</option>

                            <?php foreach ($AllBranches as $branch) { ?>
                                <option value="<?php echo $branch['Branch_Id']; ?>" <?php if ($branch['Branch_Id'] == $selectedBranchId) echo 'selected="selected"'; ?>><?php echo $branch['Name']; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>

                    <div class="form-col">
                        <label for="NIC">NIC</label>
                        <input type="text" name="NIC" id="NIC" required
                        value="<?php echo isset($_POST['NIC']) ? $_POST['NIC'] : ''; ?>">
                        
                    </div>
    
                    <div class="form-col">
                        <label for="reg-pass">Password*</label>
                        <input type="password" name="reg-pass" id="reg-pass" required
                        value="<?php echo isset($_POST['reg-pass']) ? $_POST['reg-pass'] : ''; ?>">
                        
                    </div>
    
                    <div class="form-col">
                        <label for="reg-pass2">Confirm Password*</label>
                        <input type="password" name="reg-pass2" id="reg-pass2" required
                        value="<?php echo isset($_POST['reg-pass2']) ? $_POST['reg-pass2'] : ''; ?>">
                        
                    </div>
    
                    
                    <div class="form-full">
                        <label for="reg-Address">Address*</label>
                        <textarea name="reg-Address" id="reg-Address"><?php echo isset($_POST['reg-Address']) ? $_POST['reg-Address'] : ''; ?></textarea>
                    </div>
    
                    <button class="form-full-btn btn-main" type="submit">Register</button>

                    <p>If you already have an account, you can <a href="/login" class="inline-link">Log in</a> here.</p>
                </form>

                <div class="img" data-aos="fade-left">
                    <img src="./assets/images/logo.png" alt="" data-aos="zoom-out" data-aos-duration="1000">
                </div>
                <!-- <img src="./assets/images/register-form.png" alt=""> -->

            </div>
            

        </div>
    </main>


    <!-- main content ends here -->

    <?php include("app/views/partials/footer.php");  ?>