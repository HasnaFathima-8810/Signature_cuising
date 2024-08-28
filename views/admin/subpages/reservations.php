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
                        Reservations
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Reservations</h4>

            </div>
        </div>
    </div>

    <?php
    include("app/models/Reservation.model.php");

    $reservation = new Reservation();

    $reservationData = $reservation::get_all();


    ?>


    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Reservations</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Persons</th>
                                <th>Email</th>
                                <th>Phone</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <!-- <tr>
                                        <td>2</td>
                                        <td>Anushka Lakshan</td>
                                        <td>Colombo</td>
                                        <td>
                                            12/11/2023
                                        </td>
                                        <td>12:00</td>
                                        <td>6</td>
                                        <td>5EYqk@example.com</td>
                                        <td>0771234567</td>
                                        
                                        <td class="text-warning"> <i class="far fa-clock me-1"></i> Pending </td>
                                        
                                        <td>
                                            <a href="reservation-Details.html" class="btn btn-success">View</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Change Status
                                                </button>
                                                <div class="dropdown-menu" style="margin: 0px;">
                                                  <a class="dropdown-item" href="#">Preparing</a>
                                                  <a class="dropdown-item" href="#">Confirmed</a>
                                                  <a class="dropdown-item" href="#">Completed</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item text-danger" href="#">Cancelled</a>
                                                </div>
                                            </div>
                                            

                                        </td>
                                    </tr>  -->




                            <?php foreach ($reservationData as $reservation) : ?>
                                <tr>
                                    <td><?= $reservation['id'] ?></td>
                                    <td><?= $reservation['name'] ?></td>
                                    <td><?= $reservation['branch_name'] ?></td>
                                    <td><?= $reservation['date'] ?></td>
                                    <td><?= $reservation['time'] ?></td>
                                    <td><?= $reservation['persons'] ?></td>
                                    <td><?= $reservation['email'] ?></td>
                                    <td><?= $reservation['phone'] ?></td>

                                    <td class="<?= $reservation['status'] === 'Pending' ? 'text-warning' : '' ?>">
                                        <i class="far fa-clock me-1"></i> <?= $reservation['status'] ?>
                                    </td>

                                    <td>
                                        <a href="admin-dashboard?page=view-reservation&id=<?= $reservation['id'] ?>" class="btn btn-success">View</a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Change Status
                                            </button>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a class="dropdown-item" onclick="changeReservationStatus(<?= $reservation['id'] ?>, 'Confirmed')">Confirmed</a> 
                                                <a class="dropdown-item" onclick="changeReservationStatus(<?= $reservation['id'] ?>, 'Completed')">Completed</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" onclick="changeReservationStatus(<?= $reservation['id'] ?>, 'Cancelled')">Cancelled</a>
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
            function changeReservationStatus(Rid, status) {
                Swal.fire({
                            title: 'Change Reservation Status',
                            text: 'Do you want to change the reservation status to ' + status + '?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ff6347',
                            cancelButtonColor: '#48c28d',
                            confirmButtonText: 'Yes'

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Perform actions with the form data, e.g., make an AJAX request
                                $.ajax({
                                    url: '<?=BASE_URL?>/admin/AJAX/change_reservation_status',
                                    type: 'POST',
                                    data: { id: Rid, status: status },
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