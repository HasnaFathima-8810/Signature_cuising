

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin-dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Categories
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Categories</h4>
                        <?php if (($_SESSION['admin_role'] == 'admin')) { ?>
                        <div class="ms-auto text-end">
                            <a type="button" href="javascript:void(0)" onclick="Add_category()" class="btn btn-success btn-lg text-white">
                                <i class="fas fa-plus" style="margin-right: 5px;"></i>
                                Add Category
                            </a>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <script>
                function Add_category() {
                    Swal.fire({
                        title: 'Add New Category',
                        html: `
                            <form id="myForm">
                                <input type="text" id="inputField" placeholder="Enter Category Name" required>
                            </form>`,
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Handle form submission
                            const inputFieldValue = document.getElementById('inputField').value;
                            // Perform actions with the form data, e.g., make an AJAX request
                            console.log('Submitted: ' + inputFieldValue);

                            $.ajax({
                                url: '<?=BASE_URL?>/admin/AJAX/add_category',
                                type: 'POST',
                                data: { category_name: inputFieldValue },
                                success: function (data) {
                                    // Check the response from the server
                                    if (data.success) {
                                        Swal.fire('Success', 'Category added successfully', 'success').then(() => {
                                            window.location.reload();
                                        })
                                    } else {
                                        Swal.fire('Failed', 'Category could not be added', 'error');
                                        console.log(data);
                                    }
                                },
                                error: function () {
                                    Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                                    console.log(data);
                                }
                            });

                            // Close the SweetAlert2 modal
                            Swal.close();
                            //reload page
                            
                        }
                    });
                }            
            
            </script>

            <div class="container-fluid">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Categories</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        include "app/models/Category.model.php";

                                        $category = new Category();

                                        $tableData = $category::get_all();


                                    ?>

                                    <?php foreach ($tableData as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <?php if (($_SESSION['admin_role'] == 'admin')) { ?>
                                            <td>
                                                <a href="#" class="btn btn-primary" onclick="Edit_category(<?= $value['id'] ?>, '<?= $value['name'] ?>')">Edit</a>
                                                <a href="#" class="btn btn-danger" onclick="Delete_category(<?= $value['id'] ?>)">Delete</a>
                                            </td>
                                            <?php }else{ echo "<td>only view</td>";} ?>
                                        </tr>
                                    <?php } ?>




                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <script>
                    function Edit_category(id, currentName) {
                        Swal.fire({
                            title: 'Edit Category Name',
                            html: `
                                <form id="myForm">
                                    <input type="text" id="inputField" placeholder="Enter Category Name" value="${currentName}" required>
                                </form>`,
                            showCancelButton: true,
                            confirmButtonText: 'Submit',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Handle form submission
                                const inputFieldValue = document.getElementById('inputField').value;
                                // Perform actions with the form data, e.g., make an AJAX request
                                console.log('Submitted: ' + inputFieldValue);

                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/edit_category',
                                    type: 'POST',
                                    data: { category_name: inputFieldValue, category_id: id },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', 'Category updated successfully', 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', 'Category could not be updated', 'error');
                                            console.log(data);
                                        }
                                    },
                                    error: function () {
                                        Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                                        console.log(data);
                                    }
                                });

                                // Close the SweetAlert2 modal
                                Swal.close();
                                //reload page
                                
                            }
                        });
                    }


                    function Delete_category(id) {
                        Swal.fire({
                            title: 'Are you sure? You want to delete this category?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes, delete it!'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/delete_category',
                                    type: 'POST',
                                    data: { category_id: id },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', 'Category deleted successfully', 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', 'Category could not be deleted', 'error');
                                            console.log(data);
                                        }
                                    },
                                    error: function () {
                                        Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                                        console.log(data);
                                    }
                                });
                            }
                        })
                    }
                </script>





                <!--              End-->

            </div>
            
            <footer class="footer text-center">
                Designed and Developed by: Anushka Lakshan <i class="fa fa-heart"></i>
            </footer>
            
        </div>
