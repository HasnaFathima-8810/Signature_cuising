

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Customers
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Customers</h4>
                        <div class="ms-auto text-end">
                            <a type="button" href="<?= BASE_URL ?>/admin-dashboard?page=add-member" class="btn btn-success btn-lg text-white">
                                <i class="fas fa-plus" style="margin-right: 5px;"></i>
                                Add New Member
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <?php

                include "app/models/admin.model.php";

                $admin = new Admin();

                $tableData = $admin->get_all();

            ?>

            <div class="container-fluid">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Customers</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        foreach ($tableData as $key => $value) {
                                            echo "<tr>";
                                            echo "<td>" . $value['id'] . "</td>";
                                            echo "<td>" . $value['name'] . "</td>";
                                            echo "<td>" . $value['username'] . "</td>";
                                            echo "<td>" . $value['role'] . "</td>";
                                            echo "<td>
                                                    
                                                    <button class='btn btn-danger' onclick='Delete_member(" . $value['id'] . ")'> Delete User </button>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>





                <!--              End-->

            </div>

            <script>
            function Delete_member(id) {
                        Swal.fire({
                            title: 'Are you sure? You want to delete this Member?',
                            text: "You won't be able to revert this!, proceed with caution!!!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes, delete !'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/delete_member',
                                    type: 'POST',
                                    data: { mem_id: id },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', 'Member deleted successfully', 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', 'member could not be deleted', 'error');
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