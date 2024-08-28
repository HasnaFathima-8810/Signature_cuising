
    <?php include "app/views/partials/header.php"; ?>

    <!-- main content starts here -->
    
    <main class="cart-page">
        <div class="cart-heading">
            <div class="container">
                <h1>
                    Cart
                </h1>
                <p>
                    Customize your order
                </p>
            </div>
        </div>
        <div class="container">

            <div class="cart-row">
                <div id="cart">
                    <div class="cart-head">
                        <h3>Cart</h3>
                        <button onclick="removeAll()">Remove All</button>
                    </div>
                    <table id="cart-body">

                        <?php
                            if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                foreach($_SESSION['cart'] as $item) {
                                    echo '<tr>
                                    <td class="p-details">
                                        <img src="'. $item['img'] . '" class="p-img">
                                        <div>
                                            <p class="p-name">
                                                '. $item['name'] . '
                                            </p>
                                            <p class="single-price">
                                                Rs. '. $item['price'] . ' each
                                            </p>
                                        </div>
                                    </td>
                                    <td class="p-controls">
                                        <button onclick="updateQuantity('. $item['id'] .','. ($item['quantity'] + 1) .')">+</button>
                                            <p>'.$item['quantity'].'</p>
                                        <button onclick="updateQuantity('. $item['id'] .','. ($item['quantity'] - 1) .')">-</button>
                                    </td>
                                    <td class="p-price">
                                        <p>
                                            Rs. '. $item['price'] * $item['quantity'] . '
                                        </p>
                                        <button class="p-remove" onclick="removeItem('. $item['id'] .')">
                                            Remove
                                        </button>
                                    </td>
                                </tr>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="3">
                                        Your cart is empty
                                    </td>
                                </tr>';
                            }

                        ?>

                        <!-- single product -->
                        <!-- <tr>
                            <td class="p-details">
                                <img src="./assets/Food-imgs/item (1).png" class="p-img">
                                <div>
                                    <p class="p-name">
                                        Chicken Mix Biriyani
                                    </p>
                                    <p class="single-price">
                                        Rs.1500 each
                                    </p>
                                </div>
                            </td>
                            <td class="p-controls">
                                <button>+</button>
                                    <p>1</p>
                                <button>-</button>
                            </td>
                            <td class="p-price">
                                <p>
                                    Rs.3000
                                </p>
                                <button class="p-remove">
                                    Remove
                                </button>
                            </td>
                        </tr> -->


                        <tr class="total-row">
                            <td colspan="2" class="total-col">
                                <p>
                                    Total
                                </p>
                                <p><?php echo count($_SESSION['cart']) ?> Items</p>
                            </td>
                            <td class="total-price">
                                Rs. 
                                <?php
                                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        $total = 0;
                                        foreach($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo $total;
                                    }else{
                                        echo 0;
                                    }

                                ?>
                            </td>
                        </tr>
                        

                    </table>
                    <a href="<?= BASE_URL ?>/online-order" class="btn-green">Continue Shopping</a>
                </div>

                <div class="order-summery">
                    <h4>Order Summary</h4>
                    <table>

                        <tr>
                            <td> Order Total</td>
                            <td>
                               Rs.
                               <?php
                                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        $total = 0;
                                        foreach($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo $total;
                                    }else{
                                        echo 0;
                                    }

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td>
                                <?php
                                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        echo 'Rs. 300';
                                    }
                                    else{
                                        echo 'Rs.0';
                                    }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Sub Total</td>
                            <td>
                                Rs.
                            <?php
                                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        $total = 0;
                                        foreach($_SESSION['cart'] as $item) {
                                            $total += $item['price'] * $item['quantity'];
                                        }
                                        echo $total + 300;
                                    }else{
                                        echo 0;
                                    }

                                ?>
                            </td>
                        </tr>

                    </table>
                    <a href="<?= BASE_URL ?>/checkout" class="btn-main form-full-btn">Checkout</a>
                </div>
            </div>
        </div>
    </main>

    <script>

        function removeItem(id){
            let product_id = id;

            Swal.fire({
                title: 'Do you want to remove this item from cart?',
                text: "warning!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff6347',
                cancelButtonColor: '#48c28d',
                confirmButtonText: 'Yes, remove it!'

            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform actions with the form data, e.g., make an AJAX request
                    $.ajax({
                        url: '<?=BASE_URL?>/AJAX/cartControll',
                        type: 'POST',
                        data: { id: product_id, action: 'remove' },
                        success: function (respose_data) {
                            // Check the response from the server
                            if (respose_data.success) {
                                Swal.fire('Success', respose_data.message, 'success').then(() => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire('Failed', 'something went wrong, please try again', 'error');
                                console.log(respose_data);
                            }
                        },
                        error: function (respose_data) {
                            Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                            console.log(respose_data);
                        }
                    });
                }
            })
            
            
        }


        
        function removeAll(){
            
            Swal.fire({
                title: 'Do you want to remove All items from cart?',
                text: "warning!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff6347',
                cancelButtonColor: '#48c28d',
                confirmButtonText: 'Yes, remove All!'

            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform actions with the form data, e.g., make an AJAX request
                    $.ajax({
                        url: '<?=BASE_URL?>/AJAX/cartControll',
                        type: 'POST',
                        data: { action: 'removeAll' },
                        success: function (respose_data) {
                            // Check the response from the server
                            if (respose_data.success) {
                                Swal.fire('Success', respose_data.message, 'success').then(() => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire('Failed', 'something went wrong, please try again', 'error');
                                console.log(respose_data);
                            }
                        },
                        error: function (respose_data) {
                            Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                            console.log(respose_data);
                        }
                    });
                }
            })

        }

        function updateQuantity(id, quantity){
            let product_id = id;
            let new_quantity = quantity;

            if(new_quantity <= 0) {
                Swal.fire('Failed', 'Minimum quantity is 1', 'warning');
            }else if(new_quantity > 10){
                Swal.fire('Failed', 'Maximum order quantity is 10', 'warning');
            }else{


                $.ajax({
                    url: '<?=BASE_URL?>/AJAX/cartControll',
                    type: 'POST',
                    data: { id: product_id, quantity: new_quantity, action: 'update' },
                    success: function (respose_data) {
                        // Check the response from the server
                        if (respose_data.success) {
                            Swal.fire('Success', respose_data.message, 'success').then(() => {
                                location.reload();
                            })
                        }else{
                            Swal.fire('Failed', 'something went wrong, please try again', 'error');
                            console.log(respose_data);
                        }

                    },
                    error: function (respose_data) {
                        Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                        console.log(respose_data);
                    }
                });

            }
        }
    </script>


    <!-- main content ends here -->

    <?php include "app/views/partials/footer.php";  ?>