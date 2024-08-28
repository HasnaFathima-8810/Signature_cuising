
<?php include "app/views/partials/header.php" ?>

    <!-- main content starts here -->
    
    <section id="heading-reservation" class="page-heading">
        <div class="container">
            <h1>
                Indulge in Culinary Excellence
            </h1>
            <p>
                Reserve Your Table for an Exceptional Dining Experience
            </p>
        </div>
        <img class="GoDown" src="./assets/images/Go-down.svg" alt="" onclick="lenis.scrollTo('main');">
    </section>

    <main>
        <div class="container">
            <h2 class="heading">
                Make a Reservation
            </h2>

            <div class="row reservation-row">

                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        
                        show($_POST);
                    }

                ?>

                <form action="" method="POST" id="reservation-form" data-aos="fade-right">
                    <div class="form-col">
                        <label for="res-date">Date*</label>
                        <input type="date"
                         id="res-date"
                          name="res-date"
                           min="<?php echo date('Y-m-d'); ?>"
                            max="<?php echo date('Y-m-d', strtotime('+60 days')); ?>"
                             required>
                    </div>
                    <div class="form-col">
                        <label for="res-time">Time*</label>
                        <input type="time" id="res-time" name="res-time" min="14:00" max="22:00" required>
                    </div>
                    <div class="form-col">
                        <label for="res-persons">Persons*</label>
                        <input id="res-persons" name="res-persons" type="number" min="0" max="12" required>
                    </div>
                    <div class="form-col">
                        <label for="res-email">Email*</label>
                        <input type="email" name="res-email" id="res-email" required>
                    </div>
                    <div class="form-col">
                        <label for="res-fname">Full Name*</label>
                        <input type="text" name="res-fname" id="res-fname" required>
                    </div>
                    
                    <div class="form-col">
                        <label for="res-phone">Phone*</label>
                        <input type="tel" name="res-phone" id="res-phone" required>
                    </div>

                    <div class="form-col">
                        <label for="res-branch">Branch*</label>
                        <select name="res-branch" id="res-branch" required>
                            <option value="">select branch</option>

                            <?php foreach ($branches as $branch) : ?>
                                <option value="<?= $branch['Branch_Id'] ?>"><?= $branch['Name'] ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <div class="form-full">
                        <label for="res-msg">Special Comments (Optional)</label>
                        <textarea name="res-msg" id="res-msg"></textarea>
                    </div>

                    <button class="form-full-btn btn-main" type="submit">Check Availability</button>
                </form>

                <script>

                    let formReady = false;
                    $(document).ready(function(){
                        $("#reservation-form").submit(function(event){

                            if(!formReady){
                                event.preventDefault();
                            // console.log($('#reservation-form').serialize());

                                $.ajax({
                                    url: '<?=BASE_URL?>/AJAX/reservation',
                                    type: 'post',
                                    data: $('#reservation-form').serialize(),
                                    success: function (respose_data) {
                                        // Check the response from the server
                                        if (respose_data.success) {

                                            console.log(respose_data);

                                            Swal.fire(
                                                {
                                                    title: respose_data.message,
                                                    text: "Do you want to Confirm your Reservation?",
                                                    icon: 'info',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#48c28d',
                                                    cancelButtonColor: '#ff6347',
                                                    confirmButtonText: 'Yes, Confirm reservation Now!',

                                                }
                                            )
                                            .then((result) => {
                                                if (result.isConfirmed) {
                                                    formReady = true;
                                                    $("#reservation-form").submit();   
                                                
                                                }
                                            })

                                        }else{
                                            Swal.fire(respose_data.message, "Sorry! try again" , 'warning');
                                            console.log(respose_data);
                                        }

                                    },
                                    error: function (data) {
                                        Swal.fire('Error', 'An error occurred while submitting the form', 'error');
                                        console.log(data.responseText);
                                    }
                                });
                            }
                            

                        });
                    });



                </script>

                <img src="./assets/images/reserv-img.png" alt="" data-aos="fade-left">
            </div>
        </div>
        <section class="resev">
            <p data-aos="zoom-out">
                Experience dining reimagined at Signature Cuisine. Our expertly crafted dishes fuse tradition with innovation to create unforgettable flavors. With inviting ambiance and warm hospitality, each meal becomes a cherished moment. Join us for a culinary journey that's nothing short of exceptional
            </p>
        </section>
    </main>



    <!-- main content ends here -->

<?php include "app/views/partials/footer.php" ?>