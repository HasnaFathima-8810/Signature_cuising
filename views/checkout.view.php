<?php include "app/views/partials/header.php"; ?>

<!-- main content starts here -->
<!-- <link rel="stylesheet" href="assets/admin-assets/assets/libs/bootstrap/dist/css/bootstrap.min.css">
<script src="assets/admin-assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

<main class="cart-page">
    <div class="cart-heading">
        <div class="container">
            <h1>
                Checkout
            </h1>
            <p>
                Finalized your order
            </p>
        </div>
    </div>
    <div class="container">

    </div>
</main>

<div class="container">
    <div class="row">


        <div class="col-md-6">
            <div class="cart">
                <div class="cart-body">
                    <h3 style="margin-bottom: 20px">
                        Order summery
                    </h3>

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
                            $i = 1;

                            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                foreach ($_SESSION['cart'] as $item) {

                                    echo '
                                        <tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $item['name'] . '</td>
                                            <td>' . $item['price'] . '</td>
                                            <td>' . $item['quantity'] . '</td>
                                            <td>' . $item['price'] * $item['quantity'] . '</td>
                                        </tr>
                                        ';

                                    $i++;
                                }
                            }
                            ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="row" colspan="4">Item Total Price</th>
                                <td> Rs.
                                    <?php
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        $total = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo $total;
                                    } else {
                                        echo 0;
                                    }

                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" colspan="4">Delivery Charge</th>
                                <td>
                                    <?php
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        echo 'Rs. 300';
                                    } else {
                                        echo 'Rs.0';
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr class="font-bold">
                                <th scope="row" colspan="4">Sub Total</th>
                                <td> Rs.
                                    <?php
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        $total = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo $total + 300;
                                    } else {
                                        echo 0;
                                    }

                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6">

            <h3 style="margin-bottom: 20px">
                Order Details
            </h3>

            <form id="register myForm" action="" method="post" data-aos="fade-right">

                <?php if (isset($errors) && count($errors) > 0) : ?>
                    <div class="error-msg">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="form-full">
                    <label for="ord-name">Full Name*</label>
                    <input type="text" name="ord-name" id="ord-name" required value="<?php echo isset($_POST['ord-name']) ? $_POST['ord-name'] : $customer[0]['Name']; ?>">

                </div>

                <div class="form-full">
                    <label for="ord-branch">Ordering Branch*</label>
                    <select name="ord-branch" id="ord-branch">
                        <option value="">Select Branch</option>

                        <?php foreach ($AllBranches as $branch) { ?>
                            <option value="<?php echo $branch['Branch_Id']; ?>" <?php if ($branch['Branch_Id'] == $customer[0]['PreparedBranch']) echo 'selected="selected"'; ?>><?php echo $branch['Name']; ?></option>
                        <?php } ?>

                    </select>
                </div>


                <div class="form-full">
                    <label for="ord-Address" >Address*</label>
                    <textarea name="ord-Address" id="ord-Address"><?php echo isset($_POST['ord-Address']) ? $_POST['ord-Address'] : $customer[0]['Address']; ?></textarea>
                </div>

                <div class="form-full">
                    <label for="ord-note">Special Notes(Optional)</label>
                    <textarea name="ord-note" id="ord-note"><?php echo isset($_POST['ord-Address']) ? $_POST['ord-Address'] : ''; ?></textarea>
                </div>

                <div class="form-col">
                    <label for="payment">Payment Method*</label>
                </div>
                <div class="form-col">
                    <select name="payment" id="payment" required>
                        <option value="">Select Payment Method</option>
                        <option value="Cash">Cash on delivery</option>
                        <option value="Online">Credit card or Debit card</option>
                    </select>
                </div>

                <div class="form-col" style="margin-bottom: 30px;">
                    <input type="hidden" name="latitude" id="latitude" value="<?php echo isset($_POST['latitude']) ? $_POST['latitude'] : ''; ?>">
                    <input type="hidden" name="longitude" id="longitude" value="<?php echo isset($_POST['longitude']) ? $_POST['longitude'] : ''; ?>">
                </div>

                <!-- <button name="submit" id="submitButton" class="form-full-btn btn-main" type="submit">Order</button> -->
                <input type="submit" id="submitButton" class="form-full-btn btn-main" value="Order">

            </form>
        </div>

    </div>
</div>

<script>
    const latitudeInput = document.getElementById("latitude");
    const longitudeInput = document.getElementById("longitude");
    const submitButton = document.getElementById("submitButton");
    const myForm = document.getElementById("myForm");
    let allow = false;

    document.addEventListener("DOMContentLoaded", function() {
    // Your code to submit the form
        getUserLocation();
    });


    function getUserLocation() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    // Handle success: User shared their location
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;


                    // Proceed with the checkout process using the obtained location
                    latitudeInput.value = position.coords.latitude;
                    longitudeInput.value = position.coords.longitude;
                },
                function(error) {
                    // Handle errors and user denials
                    swal("Error", "To provide the best service, please share your location, your location data is in safe", "info");
                }
            );
        } else {
            // Geolocation is not supported by the user's browser
            alert("Geolocation is not supported by your browser.");
        }
    }

    

    submitButton.addEventListener("click", function(e) {

        
        if ((latitudeInput.value === "" || longitudeInput.value === "") && allow === false) {
            e.preventDefault(); // Prevent the form from submitting

            // Display a SweetAlert2 alert
            Swal.fire({
                title: "Location Data Missing",
                text: "Your location data is missing. Do you want to Complete order without location data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Submit without Location Data",
                cancelButtonText: "Provide Location Data",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User chose to submit without location data
                    // document.getElementById("register").submit();
                    console.log("Form submitted without location data");
                    allow = true;
                }else{
                    // User chose to provide location data (you can add code to get location here)
                    

                    Swal.fire({
                        title: "Please share your location",
                        text: "your location data is safe with us, please enable location sharing in your browser",
                        icon: "info",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        getUserLocation();
                    })

                    
                }
            });
        }

    });


    const paymentSelect = document.getElementById("payment");

    paymentSelect.addEventListener("change", function() {
        if (paymentSelect.value === "Online") {
            Swal.fire({
                title: "Online payment feature not implemented yet",
                text: "if you select online payment, Order will be placed without payment. you can pay to delivery member using your card",
                icon: "info",
            })
        }
    });

</script>

<style>
    .row {
        display: flex;
        padding: 5px;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
    }

    .col-md-6 {
        flex: 1 0 45%;
        min-width: 300px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Tahoma, Geneva, sans-serif;
    }



    .table td,
    .table th {
        padding: 15px;
    }

    .table thead th {
        background-color: #54585d;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #54585d;
    }

    .table tbody td,
    .table tbody th,
    .table tfoot td,
    .table tfoot th {
        color: #000000;
        border: 1px solid #dddfe1;
    }

    .table tfoot td,
    .table tfoot th {
        background-color: #d6d6d6;
        text-align: left;
    }

    .table tbody tr {
        background-color: #f9fafb;
    }
</style>


<!-- main content ends here -->

<?php include "app/views/partials/footer.php";  ?>