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
                        Orders
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Orders</h4>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <?php
            include("app/models/Order.model.php");

            $order = new Order();
            $Allorders = $order::get_all();

            // show($Allorders);

        ?>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Orders</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Details</th>
                                <th>Total Price</th>
                                <th>Ordered Time</th>
                                <th>status</th>
                                <th>method</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>2</td>
                                <td>Anushka Lakshan</td>
                                <td>Colombo</td>
                                <td>
                                    <div class="d-flex no-block">
                                        <span>Chicken Biriyani</span>
                                        <span class="ms-auto text-end">X 3</span>
                                    </div>
                                    <div class="d-flex no-block">
                                        <span>Chicken Noodles</span>
                                        <span class="ms-auto text-end">X 1</span>
                                    </div>
                                </td>
                                <td>Rs.3200</td>
                                <td> 10/31/2023 17:50 </td>
                                <td class="text-warning"> <i class="far fa-clock me-1"></i> Pending </td>
                                <td> <i class="far fa-money-bill-alt me-1"></i> Cash on Delivery</td>
                                <td>
                                    <a href="<?= BASE_URL ?>/admin-dashboard?page=view-order" class="btn btn-success">View</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Change Status
                                        </button>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a class="dropdown-item" href="#">Preparing</a>
                                            <a class="dropdown-item" href="#">Delivering</a>
                                            <a class="dropdown-item" href="#">Completed</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">Cancelled</a>
                                        </div>
                                    </div>


                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Dasun Dhana</td>
                                <td>Maharagama</td>
                                <td>
                                    <div class="d-flex no-block">
                                        <span>Chicken Biriyani</span>
                                        <span class="ms-auto text-end">X 1</span>
                                    </div>
                                    <div class="d-flex no-block">
                                        <span>Chicken Noodles</span>
                                        <span class="ms-auto text-end">X 1</span>
                                    </div>
                                </td>
                                <td>Rs.1200</td>
                                <td> 10/31/2023 17:50 </td>
                                <td class="text-danger"> <i class="fas fa-fire  me-1"></i> Preparing </td>
                                <td> <i class="far fa-credit-card me-1"></i> Card Payment</td>
                                <td>
                                    <a href="#" class="btn btn-success">View</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Change Status
                                        </button>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a class="dropdown-item" href="#">Preparing</a>
                                            <a class="dropdown-item" href="#">Delivering</a>
                                            <a class="dropdown-item" href="#">Completed</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">Cancelled</a>
                                        </div>
                                    </div>


                                </td>
                            </tr> -->

                            <?php foreach ($Allorders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['customer_name'] ?></td>
                <td><?= $order['branch_name'] ?></td>
                <td>
                    <?php
                        $orderDetails = json_decode($order['order_details'], true);
                        foreach ($orderDetails['items'] as $item) {
                            echo '<div class="d-flex no-block">';
                            echo '<span>' . $item['name'] . '</span>';
                            echo '<span class="ms-auto text-end">X ' . $item['quantity'] . '</span>';
                            echo '</div>';
                        }
                        ?>
                    </td>
                    <td>Rs.<?= $orderDetails['total'] ?></td>
                    <td><?= $order['ordered_dt'] ?></td>
                    <td>
                        <?php
                        $statusClass = '';
                        if ($order['status'] === 'Pending') {
                            $statusClass = 'text-danger';
                        } elseif ($order['status'] === 'Preparing') {
                            $statusClass = 'text-warning';
                        } elseif ($order['status'] === 'Delivering') {
                            $statusClass = 'text-primary';
                        } elseif ($order['status'] === 'Completed') {
                            $statusClass = 'text-success';
                        }elseif ($order['status'] === 'Cancelled') {
                            $statusClass = 'bg-danger text-white p-1';
                        }
                        echo '<span class="' . $statusClass . '"><i class="far fa-clock me-1"></i> ' . $order['status'] . '</span>';
                        ?>
                    </td>
                    <td>
                        <?php
                        echo ' ' . $order['payment_method'];
                        ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL ?>/admin-dashboard?page=view-order&id=<?= $order['id'] ?>" class="btn btn-success">View</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Change Status
                            </button>
                            <div class="dropdown-menu" style="margin: 0px;">
                                <a class="dropdown-item" onclick="changeOrderStatus(<?= $order['id'] ?>, 'Preparing')" href="#">Preparing</a>
                                <a class="dropdown-item" onclick="changeOrderStatus(<?= $order['id'] ?>, 'Delivering')" href="#">Delivering</a>
                                <a class="dropdown-item" onclick="changeOrderStatus(<?= $order['id'] ?>, 'Completed')" href="#">Completed</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" onclick="changeOrderStatus(<?= $order['id'] ?>, 'Cancelled')" href="#">Cancelled</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>





                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Details</th>
                                <th>Total Price</th>
                                <th>Ordered Time</th>
                                <th>status</th>
                                <th>method</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <script>
            function changeOrderStatus(id, status) {
                Swal.fire({
                            title: 'Change Order Status',
                            text: 'Do you want to change the order status to ' + status + '?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/change_order_status',
                                    type: 'POST',
                                    data: { order_id: id, status: status },
                                    success: function (data) {
                                        // Check the response from the server
                                        if (data.success) {
                                            Swal.fire('Success', data.message, 'success').then(() => {
                                                window.location.reload();
                                            })
                                        } else {
                                            Swal.fire('Failed', data.message, 'error');
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