<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-dark text-white">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin-dashboard?page=reservations">Reservations</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Reservation details
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center mb-3">
                <h4 class="page-title">Reservation: <?= $_GET['id'] ?> </h4>

            </div>
        </div>
    </div>
    <?php
    if (!isset($_GET['id'])) {
        sweetAlert("Error", "Invalid ID", "error");
        echo '<script>window.location = "' . BASE_URL . '/admin-dashboard?page=orders";</script>';
    }

    include "app/models/Reservation.model.php";
    $reservation = new Reservation();
    $reservationData = $reservation::get_Reservation_by_id($_GET['id']);


    ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-9">
                <div class="card">


                    <!-- <div class="card-body">

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Reservation No
                                    </div>
                                    <div class="col-sm-9">
                                        002
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Customer Name
                                    </div>
                                    <div class="col-sm-9">
                                        Fathima Hasna
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Branch
                                    </div>
                                    <div class="col-sm-9">
                                        Colombo
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Date & Time
                                    </div>
                                    <div class="col-sm-9">
                                        10/31/2023 17:50
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Persons
                                    </div>
                                    <div class="col-sm-9">
                                        6
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Email
                                    </div>
                                    <div class="col-sm-9">
                                        Thismail@mail.com
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Phone
                                    </div>
                                    <div class="col-sm-9">
                                        077123456
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Current Status
                                    </div>
                                    <div class="col-sm-2">
                                        <i class="far fa-clock me-1"></i> Pending
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Change Status
                                            </button>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                              <a class="dropdown-item" href="#">Confirmed</a>
                                              
                                              <a class="dropdown-item" href="#">Completed</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item text-danger" href="#">Cancelled</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Special Note
                                    </div>
                                    <div class="col-sm-9">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur sapiente, minus, blanditiis iusto provident inventore quas quis in culpa magnam tempora ipsum facilis nam quos alias corrupti repellat quasi reprehenderit.
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Made by
                                    </div>
                                    <div class="col-sm-9">
                                        user
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Confirmed by
                                    </div>
                                    <div class="col-sm-9">
                                        not-yet
                                    </div>
                                </div>


                                <div class="row mb-1">
                                    <div class="col-sm-3 text-end font-bold">
                                        Cancelled by
                                    </div>
                                    <div class="col-sm-9">
                                        not-yet
                                    </div>
                                </div>

                            </div> -->

                    <div class="card-body">

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Reservation No
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['id'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Customer Name
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['name'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Branch
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['branch_name'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Date & Time
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['date'] . ' ' . $reservationData[0]['time'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Persons
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['persons'] ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Email
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['email'] ?>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Phone
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['phone'] ?>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Current Status
                            </div>
                            <div class="col-sm-2">
                                <i class="far fa-clock me-1"></i> <?= $reservationData[0]['status'] ?>
                            </div>
                            <div class="col-sm-7">
                               
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Special Note
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['note'] ?>
                            </div>
                        </div>

                        <!-- <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Made by
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['name'] ?>
                            </div>
                        </div> -->
                        <div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Status change by
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['Confirmed_by'] ?: 'not-yet' ?>
                            </div>
                        </div>

                        <!--<div class="row mb-1">
                            <div class="col-sm-3 text-end font-bold">
                                Cancelled by
                            </div>
                            <div class="col-sm-9">
                                <?= $reservationData[0]['Canceled_by'] ?: 'not-yet' ?>
                            </div>
                        </div> -->

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
        Designed and Developed by: Fathima Hasna <i class="fa fa-heart"></i>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>