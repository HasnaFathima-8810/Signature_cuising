<?php if (!($_SESSION['admin_role'] == 'admin')) {
        echo '<div class="page-wrapper mb-10">
        <div class="alert alert-danger mb-10" role="alert">
        <h2>You don\'t have permission to access this page</h2>
        </div>
        </div>';

        
}else {

    ?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-dark text-white">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard?page=food-items">Food-items</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Edit Item : <?= $_GET['id'] ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center mb-3">
                <h4 class="page-title">Edit Food Item</h4>

            </div>
        </div>
    </div>

    <?php
    include "app/models/Food.model.php";

    $food = new Food();

    if (isset($_GET['id'])) {

        //validate id
        if (!is_numeric($_GET['id'])) {
            echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Invalid ID
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';

            sweetAlert("Error", "Invalid ID", "error");
            echo '<script>window.location = "' . BASE_URL . '/admin-dashboard?page=food-items";</script>';
        } else {
            $item = $food::get_item_by_id($_GET['id']);

            if (!$item) {
                echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Invalid ID
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                sweetAlert("Error", "Invalid item ID", "error");
                echo '<script>window.location = "' . BASE_URL . '/admin-dashboard?page=food-items";</script>';
            }
        }
    }
    if (isset($_POST['edit-food-item']) && isset($_GET['id'])) {

        $errors = array();

        if (!is_numeric($_GET['id'])) {
            echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Invalid ID
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            sweetAlert("Error", "Invalid ID", "error");
            echo '<script>window.location = "' . BASE_URL . '/admin-dashboard?page=food-items";</script>';
        }

        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){

            
            $errors = $food::edit_item_with_img($_GET['id'], $_POST['name'], $_POST['price'], $_POST['Desc'], $_POST['Visibility'], $_POST['cat']);
        }else{

            $errors = $food::edit_item_without_img($_GET['id'], $_POST['name'], $_POST['price'], $_POST['Desc'], $_POST['Visibility'], $_POST['cat']);
        }
        
        if ($errors === array('success' => true)) {

            sweetAlert("Success!", "Item Edited Successfully", "success");
            echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Item Added Successfully
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <script>
                                
                                    window.location = "' . BASE_URL . '/admin-dashboard?page=food-items";
                                
                                
                                </script>
                            ';

            unset($_POST);
        } else if (is_array($errors) && count($errors) > 0) {
            echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                ';
            foreach ($errors as $error) {

                echo $error . "<br>";
            }
            echo '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                ';
        }
    }


    ?>

    <?php
    include "app/models/Category.model.php";

    $Category = new Category();

    $allCategories = $Category::get_all();
    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <form action="<?= BASE_URL ?>/admin-dashboard?page=edit-food-item&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="Iname" class="col-sm-3 text-end control-label col-form-label">Item
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="Iname" placeholder="Item name Here" value="<?= $item[0]['name'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Price" class="col-sm-3 text-end control-label col-form-label">Item
                                    Price</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rs.</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="price" id="Price" name="price" required value="<?= $item[0]['price'] ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Cat" class="col-sm-3 text-end control-label col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="cat" name="cat">
                                        <option value=""> Select </option>

                                        <?php
                                        foreach ($allCategories as $key => $value) {
                                            echo "<option value='" . $value['id'] . "' " . ($value['id'] == $item[0]['category_id'] ? "selected" : "") . ">" . $value['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-end control-label col-form-label">Visibility</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Visibility" id="exampleRadios1" value="true" <?= ($item[0]['visibility'] == 1 ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Visible
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Visibility" id="exampleRadios2" value="false" <?= ($item[0]['visibility'] == 0 ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Hidden
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="custom-file-input" class="col-sm-3 text-end control-label col-form-label">Item Image</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg, image/jpg" name="image">
                                        <label class="custom-file-label" for="customFile"><?= $item[0]['img'] ?></label>
                                    </div>
                                    <!-- show boostrap message (only accepted Jpg,jpeg and png files and must be less than 2mb) -->
                                    <p class="text-warning">Only accepted Jpg,jpeg and png files and must be less than 2mb</p>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="Desc" style="height: 65px;" required><?= $item[0]['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- full width booststrap button -->
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-info btn-lg w-100" name="edit-food-item">Submit</button>
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

<?php } ?>