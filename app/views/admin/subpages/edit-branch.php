<div class="page-wrapper">
    <!-- ... Other HTML code ... -->
    
    <?php
    // Retrieve branch data for editing
    include("app/models/Branch.model.php");
    $branchId = $_GET['branch_id'] ?? null;
    $branchData = null;

    if(!isset($branchId)) {
        sweetAlert("Success", "Branch Not Found", "success");
        echo "<script>window.location.href = '" . BASE_URL . "/admin-dashboard?page=branches'</script>";
    }

    
        $branch = new Branch();
        $branchData = $branch::get_branch_by_id($branchId);
        $branchData = $branchData[0];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($branchData)) {
        $errors = $branch::update_branch(
            $branchId,
            $_POST['Bname'],
            $_POST['Address'],
            $_POST['seats'],
            $_POST['Btel'],
            $_POST['Latitude'],
            $_POST['Longitude']
        );

        if ($errors['success']) {
            // Redirect to branches page on success
            sweetAlert("Success", "Branch Edited", "success");
            echo "<script>window.location.href = '" . BASE_URL . "/admin-dashboard?page=branches'</script>";
        } else {
            echo "<div class='alert alert-danger'>Failed to update branch.</div>";
        }
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>/admin-dashboard?page=edit-branch&branch_id=<?= $branchId ?>" method="post">
                            
                        <div class="form-group row">
                                <label for="Bname" class="col-sm-3 text-end control-label col-form-label">Branch Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Bname" id="Bname" value="<?= $branchData['Name'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 text-end control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="Address" id="Address" class="form-control"><?= $branchData['Address'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Btel" class="col-sm-3 text-end control-label col-form-label">Branch Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" name="Btel" id="Btel" value="<?= $branchData['Tel_no'] ?>" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Latitude" class="col-sm-3 text-end control-label col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Latitude" value="<?= $branchData['Latitude'] ?>" id="Latitude" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Longitude " class="col-sm-3 text-end control-label col-form-label">Longitude </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Longitude" value="<?= $branchData['Longitude'] ?>" id="Longitude" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="seats" class="col-sm-3 text-end control-label col-form-label">Seats Capacity </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="seats" value="<?= $branchData['SeatCapacity'] ?>" id="seats" required>
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
    </div>
    <!-- ... Footer and other HTML code ... -->
</div>
