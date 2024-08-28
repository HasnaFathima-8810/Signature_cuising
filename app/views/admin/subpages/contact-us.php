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
                        Contact us
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Contact us</h4>

            </div>
        </div>
    </div>

    <?php
    include "app/models/Contact.model.php";

    $contact = new Contact();

    $Allcontact = $contact::get_all();

    ?>
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Contact us reports</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($Allcontact as $contact) : ?>
                                <tr>
                                    <td><?= $contact['id'] ?></td>
                                    <td><?= $contact['name'] ?></td>
                                    <td><?= $contact['email'] ?></td>
                                    <td><?= $contact['msg'] ?></td>
                                </tr>
                            <?php endforeach; ?>




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