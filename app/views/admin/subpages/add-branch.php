<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-dark text-white">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Branches.html">Branches</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Add New Branch
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center mb-3">
                <h4 class="page-title">Add New Branch</h4>

            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        include("app/models/Branch.model.php");

        $branch = new Branch();

        $errors = $branch::add_branch($_POST['Bname'], $_POST['Address'], $_POST['seats'], $_POST['Btel'], $_POST['Latitude'], $_POST['Longitude']);

        if ($errors['success']) {
            sweetAlert("Success", "Branch added", "success");
            echo "<script>window.location.href = '" . BASE_URL . "/admin-dashboard?page=branches'</script>";
        } else {
            sweetAlert("Error", "Branch not added", "error");
            
        }
    }

    ?>



    <div class="container-fluid">

        <?php
            if(isset($errors) && count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            
            ?>


        <div class="row">
            <div class="col-md-6">
                <div class="card">


                    <div class="card-body">

                        <form action="<?= BASE_URL ?>/admin-dashboard?page=add-branch" method="post">

                            <div class="form-group row">
                                <label for="Bname" class="col-sm-3 text-end control-label col-form-label">Branch Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Bname" id="Bname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 text-end control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="Address" id="Address" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Btel" class="col-sm-3 text-end control-label col-form-label">Branch Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" name="Btel" id="Btel" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Latitude" class="col-sm-3 text-end control-label col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Latitude" id="Latitude" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Longitude " class="col-sm-3 text-end control-label col-form-label">Longitude </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Longitude" id="Longitude" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="seats" class="col-sm-3 text-end control-label col-form-label">Seats Capacity </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="seats" id="seats" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- full width booststrap button -->
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-info btn-lg w-100">Submit</button>
                                </div>

                            </div>

                        </form>
                    </div>
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