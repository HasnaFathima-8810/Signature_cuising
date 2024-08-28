

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-dark text-white">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard?page=members">Admin & Staff</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                Add New member
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center mb-3">
                        <h4 class="page-title">Add New User</h4>

                    </div>
                </div>
            </div>
            
            <?php
                if(isset($_POST['add-member'])) {

                    $data = array(
                        'name' => $_POST['name'],
                        'username' => $_POST['username'],
                        'pass1' => $_POST['pass1'],
                        'pass2' => $_POST['pass2'],
                        'role' => $_POST['role'],
                    );

                    include "app/models/admin.model.php";

                    $admin = new Admin();

                    $errors = $admin::Add_member($data);

                    if($errors === array('success' => true)) {
                        
                        echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Member Added Successfully
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <script>
                                    window.location = "'.BASE_URL.'/admin-dashboard?page=members";
                                </script>
                            ';

                        unset($_POST);

                    }
                    else if(is_array($errors) && count($errors) > 0) {
                        echo'
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ';
                        foreach($errors as $error) {
                            
                            echo $error . "<br>";
                        }
                        echo '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            ';
                    }

                }
            ?>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form action="<?= BASE_URL ?>/admin-dashboard?page=add-member" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-end control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="Bname" required 
                                        value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"
                                        >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Bname" class="col-sm-3 text-end control-label col-form-label">username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" id="Bname" required
                                        value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"
                                        >
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label for="Btel" class="col-sm-3 text-end control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="pass1" id="Btel" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Btel" class="col-sm-3 text-end control-label col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="pass2" id="Btel" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Cat"
                                        class="col-sm-3 text-end control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="cat" name="role">
                                            <option value=""> Select </option>
                                            <option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'admin') echo "selected"; ?>>Admin</option>
                                            <option value="stuff" <?php if(isset($_POST['role']) && $_POST['role'] == 'stuff') echo "selected"; ?>>Stuff</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- full width booststrap button -->
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-info btn-lg w-100" name="add-member">Submit</button>
                                    </div>

                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>



                <!--              End-->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Designed and Developed by: Anushka Lakshan <i class="fa fa-heart"></i>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>