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

            </div>
        </div>
    </div>

    <?php
    include "app/models/Customer.model.php";

    $customer = new Customer();

    $Allcustomers = $customer::get_all();



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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>NIC</th>
                                <th>Address</th>
                                <th>Prepared Branch</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <!-- <tr>
                                        <td>2</td>
                                        <td>Anushka Lakshan</td>
                                        <td>dsfsdfsdfemail@gmail.com</td>
                                        <td>
                                            07565656565
                                        </td>
                                        <td>12/11/2023</td>
                                        <td>123456789V</td>
                                        <td>samaja raod,pathiragoda, maharagama</td>
                                        <td>Colombo</td>
                                        <td>
                                            <button class="btn btn-danger"> Reset Password </button>

                                        </td>
                                    </tr> -->

                            <?php foreach ($Allcustomers as $customer) : ?>
                                <tr>
                                    <td><?= $customer['Customer_Id'] ?></td>
                                    <td><?= $customer['Name'] ?></td>
                                    <td><?= $customer['Email'] ?></td>
                                    <td><?= $customer['Phone'] ?></td>
                                    <td><?= $customer['DOB'] ?></td>
                                    <td><?= $customer['NIC'] ?></td>
                                    <td><?= $customer['Address'] ?></td>
                                    <td><?= $customer['branch_name'] ?></td>
                                    <!-- <td>
                                        <button class="btn btn-danger">Reset Password</button>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>NIC</th>
                                <th>Address</th>
                                <th>Prepared Branch</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </tfoot>
                    </table>
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