 <?php  include "app/views/partials/header.php"; ?>

    <!-- main content starts here -->

    <main class="account-page">
        <div class="cart-heading">
            <div class="container">
                <h1>
                    My Account
                </h1>
                <p>
                    Your Account, Your Control
                </p>
            </div>
        </div>
        <div class="container">

            <?php
                if(is_array($errors) && count($errors) > 0) {
                    echo '<div class="error">';
                    foreach ($errors as $error) {
                        echo '<p>' . $error . '</p>';
                    }
                    echo '</div>';
                }


            ?>

            <style>
                .error {
                    color: red;
                    font-size: 14px;
                    margin-bottom: 20px;
                }
            </style>

            <div class="tabs">

                <input type="radio" name="tab-ctrl" id="tab-1" class="tab-ctrl" checked>
                <input type="radio" name="tab-ctrl" id="tab-2" class="tab-ctrl">
                <input type="radio" name="tab-ctrl" id="tab-3" class="tab-ctrl">
                <input type="radio" name="tab-ctrl" id="tab-4" class="tab-ctrl">

                <div class="tab-labels">
                    <label for="tab-1">My Orders</label>
                    <label for="tab-2">Reservations</label>
                    <label for="tab-3">Edit Account</label>
                    <label for="tab-4">Change Password</label>
                </div>

                <div class="tab-panels">
                    <div class="panel" id="t-p-1">
                        <h2>My Orders</h2>
                        <p class="t-sub">Track Your Order Details</p>

                        <div class="table-container">

                            <ul class="Order-table">
                                <li class="table-header">
                                    <div class="col col-1">Order No</div>
                                    <div class="col col-2">Items</div>
                                    <div class="col col-3">Total</div>
                                    <div class="col col-4">Date & Time</div>
                                    <div class="col col-5">Order Status</div>
                                    <div class="col col-6">branch</div>
                                </li>
                                <!-- <li class="table-row">
                                    <div class="col col-1" data-label="Order No">42235</div>
                                    <div class="col col-2" data-label="Items">

                                        <div>
                                            <div class="order-t-i">
                                                <p>Chicken Biriyani</p><span>X 2</span>
                                            </div>
                                            <div class="order-t-i">
                                                <p>Chicken Noodles</p><span>X 1</span>
                                            </div>
                                            <div class="order-t-i">
                                                <p>Mix Biriyani</p><span>X 2</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col col-3" data-label="Total">$350</div>
                                    <div class="col col-4" data-label="Date & Time">2023/12/11 16:55</div>
                                    <div class="col col-5" data-label="Order status">pending</div>
                                    <div class="col col-6" data-label="branch">Colombo</div>
                                </li> -->

                                <?php
                                    foreach ($orderData as $order) {
                                    
                                        echo '<li class="table-row">';
                                        echo '<div class="col col-1" data-label="Order No">' . $order['id'] . '</div>';
                                        echo '<div class="col col-2" data-label="Items">';
                                    
                                        $orderDetails = json_decode($order['order_details'], true);
                                    
                                        foreach ($orderDetails['items'] as $item) {
                                            echo '<div class="order-t-i">';
                                            echo '<p>' . $item['name'] . '</p><span>X ' . $item['quantity'] . '</span>';
                                            echo '</div>';
                                        }
                                    
                                        echo '</div>';
                                        echo '<div class="col col-3" data-label="Total">Rs.' . $orderDetails['total'] . '</div>';
                                        echo '<div class="col col-4" data-label="Date & Time">' . $order['ordered_dt'] . '</div>';
                                        echo '<div class="col col-5" data-label="Order status">' . ucfirst($order['status']) . '</div>';
                                        echo '<div class="col col-6" data-label="Branch">' . $order['branch_name'] . '</div>';
                                        echo '</li>';
                                    }




                                ?>

                            </ul>
                        </div>

                    </div>
                    <div class="panel" id="t-p-2">
                        <h2>My Reservations</h2>
                        <p class="t-sub">View your Reservation status</p>

                        <div class="table-container">

                            <ul class="reservation-table">
                                <li class="table-header">
                                    <div class="col col-1">Reser. No</div>
                                    <div class="col col-2">People</div>
                                    <div class="col col-3">Date</div>
                                    <div class="col col-4">Time</div>
                                    <div class="col col-5">Name</div>
                                    <div class="col col-6">Phone</div>
                                    <div class="col col-7">Branch</div>
                                    <div class="col col-8">Status</div>
                                </li>
                                <!-- <li class="table-row">
                                    <div class="col col-1" data-label="Reser. No">42235</div>
                                    <div class="col col-2" data-label="People">6</div>
                                    <div class="col col-3" data-label="Date">2023/12/11</div>
                                    <div class="col col-4" data-label="Time">16:55</div>
                                    <div class="col col-5" data-label="Name">Anushka Lakshan</div>
                                    <div class="col col-6" data-label="Phone">076 611661104</div>
                                    <div class="col col-7" data-label="Branch">Colombo</div>
                                    <div class="col col-8" data-label="Status">pending</div>
                                </li> -->


                                <?php
                                    foreach ($reservationData as $reservation) {
                                        echo '<li class="table-row">';
                                        echo '<div class="col col-1" data-label="Reser. No">' . $reservation['id'] . '</div>';
                                        echo '<div class="col col-2" data-label="People">' . $reservation['persons'] . '</div>';
                                        echo '<div class="col col-3" data-label="Date">' . date('Y/m/d', strtotime($reservation['date'])) . '</div>';
                                        echo '<div class="col col-4" data-label="Time">' . date('H:i', strtotime($reservation['time'])) . '</div>';
                                        echo '<div class="col col-5" data-label="Name">' . $reservation['name'] . '</div>';
                                        echo '<div class="col col-6" data-label="Phone">' . $reservation['phone'] . '</div>';
                                        echo '<div class="col col-7" data-label="Branch">' . $reservation['branch_name'] ;// You may replace this with the actual branch name
                                        echo '</div>';
                                        echo '<div class="col col-8" data-label="Status">' . ucfirst($reservation['status']) . '</div>';
                                        echo '</li>';
                                    }

                                ?>

                            </ul>
                        </div>
                    </div>
                    <div class="panel" id="t-p-3">
                        <h2>Edit Account</h2>
                        <p class="t-sub">Change Your Account Details</p>

                        

                        <form id="register" action="" method="post" data-aos="fade-right">

                            <div class="form-col">
                                <label for="reg-name">Full Name*</label>
                                <input type="text" name="reg-name" id="reg-name" 
                                value="<?= $customerData[0]['Name'] ?>"
                                required>
                            </div>
            
                            <div class="form-col">
                                <label for="reg-email">Email*</label>
                                <input type="email" name="reg-email" id="reg-email" 
                                value="<?= $customerData[0]['Email'] ?>"
                                required>
                            </div>
                            
                            <div class="form-col">
                                <label for="reg-phone">Phone*</label>
                                <input type="text" name="reg-phone" id="reg-phone" 
                                value="<?= $customerData[0]['Phone'] ?>"
                                required>
                            </div>
            
                            <div class="form-col">
                                <label for="reg-dob">Date of Birth*</label>
                                <input type="date" name="reg-dob" id="reg-dob" 
                                value="<?= $customerData[0]['DOB'] ?>"
                                required>
                            </div>
            
                            <div class="form-col">
                                <label for="res-branch">Prepared Branch*</label>
                                <select name="res-branch" id="res-branch">
                                    <option value="">select branch</option>
                                    <?php
                                        foreach ($branchData as $branch) {
                                            echo '<option value="' . $branch['Branch_Id'] . '" '. ($branch['Branch_Id'] == $customerData[0]['PreparedBranch'] ? 'selected' : '') .'>' . $branch['Name'] . '</option>';
                                        }
                                    ?>
                                    <!-- <option value="1">Colombo</option>
                                    <option value="">Kandy</option>
                                    <option value="">Galle</option> -->
                                </select>
                            </div>

                            <div class="form-col">
                                <label for="NIC">NIC*</label>
                                <input type="text" name="NIC" id="NIC" 
                                value="<?= $customerData[0]['NIC'] ?>"
                                required>
                            </div>

                            <div class="form-full">
                                <label for="Address">Address*</label>
                                <textarea name="Address" id="Address"><?= $customerData[0]['Address'] ?></textarea>
                            </div>
            
                            <button class="form-full-btn btn-main" type="submit" name="update">Update Account Details</button>
        
                        </form>
                    </div>
                    <div class="panel" id="t-p-4">
                        <h2>Change Password</h2>
                        <p class="t-sub">Change Your Account Password</p>

                        <form id="register" action="" method="post" data-aos="fade-right">

                            <div class="form-full">
                                <label for="current_pass">Current Password*</label>
                                <input type="password" name="current_pass" id="current_pass" 
                                required>
                            </div>
            
                            <div class="form-col">
                                <label for="new_pass">New Password*</label>
                                <input type="password" name="new_pass" id="new_pass" 
                                required>
                            </div>
                            
                            <div class="form-col">
                                <label for="confirm_pass">Confirm New Password*</label>
                                <input type="password" name="confirm_pass" id="confirm_pass" 
                                required>
                            </div>
            
                            
            
                            <button class="form-full-btn btn-main" type="submit" name="change_pass">Update Password</button>
        
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </main>


    <!-- main content ends here -->

    <?php include("app/views/partials/footer.php"); ?>