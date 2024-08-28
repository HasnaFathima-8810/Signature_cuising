<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-dark text-white">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard?page=orders">Orders</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Order Details
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center mb-3">
                <h4 class="page-title">Order: <?= $_GET['id'] ?> </h4>

            </div>
        </div>
    </div>

    <?php

    if (!isset($_GET['id'])) {
        sweetAlert("Error", "Invalid ID", "error");
        echo '<script>window.location = "' . BASE_URL . '/admin-dashboard?page=orders";</script>';
    }

    include "app/models/Order.model.php";
    $order = new Order();
    $orderData = $order::get_item_by_id($_GET['id']);

    $orderData = $orderData[0];

    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">
                <div class="card">




                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Order No
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['id'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Customer Name
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['name'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Ordered Branch
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['branch_name'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Order Details
                            </div>
                            <div class="col-sm-9">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $orderDetails = json_decode($orderData['order_details'], true);
                                        $items = $orderDetails['items'];
                                        $itemTotal = 0;
                                        foreach ($items as $index => $item) :
                                            $unitPrice = $item['price'];
                                            $quantity = $item['quantity'];
                                            $totalPrice = $unitPrice * $quantity;
                                            $itemTotal += $totalPrice;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $index + 1 ?></th>
                                                <td><?= $item['name'] ?></td>
                                                <td>Rs.<?= $unitPrice ?></td>
                                                <td><?= $quantity ?></td>
                                                <td>Rs.<?= $totalPrice ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="row" colspan="4">Item </th>
                                            <td>Rs.<?= $itemTotal ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4">Delivery Charge</th>
                                            <td>Rs.<?= $orderDetails['delivery'] ?></td>
                                        </tr>
                                        <tr class="font-bold">
                                            <th scope="row" colspan="4">Sub Total</th>
                                            <td>Rs. <?= $orderDetails['sub_total'] ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Payment method
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['payment_method'] ?>
                            </div>
                        </div>

                        <div class="row mb-1" style="overflow: visible;">
                            <div class="col-sm-3 text-end font-bold">
                                Current Status
                            </div>
                            <div class="col-sm-2 text-default">
                                <?php
                                $statusClass = '';
                                if ($orderData['status'] === 'Pending') {
                                    $statusClass = 'text-warning';
                                } elseif ($orderData['status'] === 'Preparing') {
                                    $statusClass = 'text-danger';
                                }
                                echo '<i class="' . $statusClass . '"><i class="far fa-clock me-1"></i> ' . $orderData['status'] . '</i>';
                                ?>
                            </div>
                            <div class="col-sm-7">
                                
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Ordered Date & Time
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['ordered_dt'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Address
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['address'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                User Note
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['user_note'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Last Change Made by
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['last_change'] ? $orderData['last_change'] : 'not-yet' ?>
                            </div>
                        </div>



                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Admin Note
                            </div>
                            <div class="col-sm-9">
                                <?= $orderData['admin_note'] ?>
                            </div>
                        </div>

                        <?php $locationData = json_decode($orderData['location'], true);

                        if (is_array($locationData)) {
                            $latitude = $locationData['latitude'];
                            $longitude = $locationData['longitude'];


                        ?>

                            <div class="row mb-1">
                                <div class="col-sm-3 text-end font-bold">
                                    Customer Location
                                </div>
                                <div class="col-sm-9">

                                    <iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= $latitude ?>,<?= $longitude ?>&language=en&z=14&amp;output=embed">
                                    </iframe>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>



        <!--              End-->

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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        Designed and Developed by: Fathima Hasna  <i class="fa fa-heart"></i>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>