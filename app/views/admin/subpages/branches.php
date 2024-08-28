<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Branches
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Branches</h4>
                <div class="ms-auto text-end">
                    <a type="button" href="admin-dashboard?page=add-branch" class="btn btn-success btn-lg text-white">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>
                        Add New Branch
                    </a>

                </div>
            </div>
        </div>
    </div>

    <?php
    include "app/models/Branch.model.php";

    $branch = new Branch();

    $branches = $branch::get_all();


    ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Branches</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Tel No</th>
                                <th>Latitude</th>
                                <th>Longitude </th>
                                <th>SeatCapacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                        <td>2</td>
                                        <td>Colombo</td>
                                        <td>Highway Road, Maharagama(10280), Sri Lanka</td>
                                        <td>+94 11 234567</td>
                                        <td>6.9271</td>
                                        <td>79.8612</td>
                                        <td>100</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr> -->

                            <?php foreach ($branches as $branch) : ?>
                                <tr>
                                    <td><?= $branch['Branch_Id'] ?></td>
                                    <td><?= $branch['Name'] ?></td>
                                    <td><?= $branch['Address'] ?></td>
                                    <td><?= $branch['Tel_no'] ?></td>
                                    <td><?= $branch['Latitude'] ?></td>
                                    <td><?= $branch['Longitude'] ?></td>
                                    <td><?= $branch['SeatCapacity'] ?></td>
                                    <td>
                                        <a href="admin-dashboard?page=edit-branch&branch_id=<?= $branch['Branch_Id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger" onclick="Delete_branch(<?= $branch['Branch_Id'] ?>)">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Tel No</th>
                                <th>Latitude</th>
                                <th>Longitude </th>
                                <th>SeatCapacity</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


        <script>
            function Delete_branch(id) {
                        Swal.fire({
                            title: 'Are you sure? You want to delete this Branch?',
                            text: "You won't be able to revert this!, proceed with caution!!!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes, delete it!'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/delete_branch',
                                    type: 'POST',
                                    data: { branch_id: id },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', 'branch deleted successfully', 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', 'branch could not be deleted', 'error');
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