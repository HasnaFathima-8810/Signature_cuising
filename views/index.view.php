

    <?php include("app/views/partials/header.php");  ?>

    

    <!-- main content starts here -->
    <div class="hero-section">
        <div class="container">

            <div class="hero-CTA">
                <h1>
                    Signature Cuisine: <br>
                    Where Flavor Meets Elegance
                </h1>
                <p>
                    Experience Unforgettable Flavors, Create Cherished Moments
                </p>

                <a class="btn-main" href="<?= BASE_URL ?>/reservation">
                    Make a Reservation
                </a>
                <a class="btn-secondery" href="<?= BASE_URL ?>/online-order">
                    Order for Home Delivery
                </a>
            </div>
            <div class="hero-imgs">
                <img src="./assets/images/hero-img (1).jpg" alt="Signature Cuisine kottu" class="heroimg1">
                <img src="./assets/images/hero-img (2).jpg" alt="Signature Cuisine rice and curry" class="heroimg2">
            </div>

        </div>

    </div>
    <section class="home-sec2">
        <img src="./assets/images/back-drops.svg" alt="">
        <img src="./assets/images/back-drops.svg" alt="">

        <div class="container">

            <h2 class="heading">
                Signature Delights Await You
            </h2>
            <div class="row">
                <div class="food-cards">
                    <div class="food-card" data-aos="fade-up">
                        <img src="./assets/images/food-cards.jpg" alt="Triple Delight Fried Rice">
                        <div>
                            <p class="card-title">Triple Delight Fried Rice</p>
                            <p class="card-desc">A harmonious blend of succulent shrimp, tender beef, and flavorful
                                chicken stir-fried with fragrant jasmine rice, colorful vegetables, and a savory sauce,
                                creating a delightful symphony of flavors in every bite.</p>
                        </div>
                    </div>
                    <div class="food-card" data-aos="fade-up" data-aos-delay="100">
                        <img src="./assets/images/food-cards.jpeg" alt="Spicy Sri Lankan Cheese Pasta">
                        <div>
                            <p class="card-title">Spicy Sri Lankan Cheese Pasta</p>
                            <p class="card-desc">Indulge in a fusion of flavors with our Spicy Sri Lankan Cheese Pasta.
                                Creamy cheese sauce meets the warmth of traditional Sri Lankan spices, creating a
                                tantalizing pasta dish that's rich, spicy, and wonderfully comforting.</p>
                        </div>
                    </div>
                </div>
                <div class="home-sec2-desc">
                    <p>
                        Indulge your senses in a remarkable culinary journey that celebrates the exquisite art of
                        flavor. At Signature Cuisine, we meticulously craft each signature dish, seamlessly blending
                        timeless traditions with innovative techniques. Our commitment to excellence ensures an
                        unforgettable dining experience that delights your palate and captivates your senses
                    </p>
                    <a class="btn-main" href="<?= BASE_URL ?>/online-order">
                        Order Online Now
                    </a>
                </div>
            </div>

        </div>
    </section>
    <section class="home-sec3">
        <div class="container">
            <h2 class="heading text-w">
                Book Your Culinary Journey
            </h2>

            <div class="home-sec3-row" >
                <div class="sec3-desc" data-aos="fade-up">
                    <p>
                        Experience exceptional dining with ease. Reserve your table at Signature Cuisine by selecting
                        your preferred date, time, party size, and any special requests. Your table awaits—simply click
                        "Secure Your Reservation" to start your culinary adventure.
                    </p>
                    <a href="<?= BASE_URL ?>/reservation" class="btn-main">Secure Your Reservation</a>
                </div>
                <div class="sec3-imgs">
                    <img src="./assets/images/sec2-card (1).jpg" alt="">
                    <img src="./assets/images/sec2-card (2).jpg" alt="">
                    <img src="./assets/images/sec2-card (3).jpg" alt="">

                </div>
            </div>
        </div>


    </section>
    <section class="home-sec4">
        <div class="container">
            <h2 class="heading text-w">
                Discover Our Facilities
            </h2>

            <div class="row sec4-row">
                <div class="facility_cards" data-aos="fade-down">
                    <img src="./assets/images/Private_dining.png" alt="">
                    <h6 class="card-titlle">Private Dining Rooms</h6>
                    <p class="card-desc">
                        Elevate your dining experience in our exclusive private dining rooms. Ideal for intimate
                        gatherings, business meetings, or special occasions.
                    </p>
                </div>
                <div class="facility_cards" data-aos="fade-down" data-aos-delay="100">
                    <img src="./assets/images/Free_wifi.png" alt="">
                    <h6 class="card-titlle">Free Wi-Fi</h6>
                    <p class="card-desc">
                        Stay connected during your visit with our complimentary Wi-Fi access. Share your moments and
                        connect with loved ones effortlessly.
                    </p>
                </div>
                <div class="facility_cards" data-aos="fade-down" data-aos-delay="200">
                    <img src="./assets/images/kids_play.png" alt="">
                    <h6 class="card-titlle">Kids Play Area</h6>
                    <p class="card-desc">
                        We cater to families! Let your little ones have a blast in our dedicated kids' play area,
                        complete with games and entertainment.
                    </p>
                </div>
                <div class="facility_cards" data-aos="fade-down" data-aos-delay="300">
                    <img src="./assets/images/bar.png" alt="">
                    <h6 class="card-titlle">Lounge & Bar</h6>
                    <p class="card-desc">
                        Begin or end your dining experience in our stylish lounge and bar. Enjoy a wide selection of
                        drinks and appetizers in a relaxed ambiance.
                    </p>
                </div>
            </div>
            <div class="sec4-cta-row">
                <a href="<?= BASE_URL ?>/facility" class="btn-main" data-aos="fade-right">Learn more &RightArrow;</a>
            </div>
        </div>
        <img src="./assets/images/sec-4-noodles.png" alt="">
    </section>

    <script>
        gsap.to(".home-sec4 > img", {
                rotation: 120, 
                scrollTrigger: {
                    trigger: ".home-sec4",
                    scrub: true, 
                    start: "top bottom", 
                    end: "bottom top",
                }
            });
    </script>

    <section class="home-sec5">
        <div class="container">
            <h2 class="heading">
                Gallery of Gastronomic Delights
            </h2>
            <p class="sec-5-sub">
                A Pictorial Journey Through the Culinary Wonders of Signature Cuisine
            </p>
            <div class="sec5-row" data-aos="fade-up">

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />



                <!-- swiper slider -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <img src="./assets/images/swiper-imgs (1).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (2).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (3).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (4).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (2).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (1).jpg" alt="" class="swiper-slide">
                        <img src="./assets/images/swiper-imgs (3).jpg" alt="" class="swiper-slide">
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
                <!-- Initialize Swiper -->
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        freeMode: true,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            950: {
                                slidesPerView: 3,
                                spaceBetween: 40,
                            },
                            1200: {
                                slidesPerView: 4,
                                spaceBetween: 50,
                            },
                        },
                    });
                </script>

            </div>
        </div>
    </section>
    <section class="home-sec6">
        <div class="container">
            <div class="sec6-row">
                <div class="about-sec" data-aos="fade-left">
                    <h2 class="heading text-w" >
                        About Signature Cuisine.
                    </h2>
                    <p>
                        Discover the heart and soul of Signature Cuisine. Our journey began with a passion for crafting
                        unforgettable dishes that blend tradition with innovation. With each plate, we invite you to
                        savor the flavors that tell our story.
                        <br />Join us on a voyage through the art of taste and tradition
                    </p>
                    <a href="<?= BASE_URL ?>/about" class="btn-main">Learn More About Us</a>
                </div>
                <img src="./assets/images/restaurant_menu_card 1.jpg" alt="menu card" data-aos="fade-left">
            </div>
        </div>
    </section>
    <section class="home-sec7">
        <div class="container" data-aos="fade-left">
            <h2 class="heading">
                Let's Stay connected
            </h2>
            <p>
                Have questions or feedback? We're here to assist you. Reach out to us anytime, and our dedicated team
                will ensure your inquiries are addressed promptly. Your satisfaction is our priority.

                <br>
                <br>
                Contact us today to enhance your dining experience.
            </p>
            <a href="<?= BASE_URL ?>/contact" class="btn-main">Get in Touch</a>
        </div>

        <img src="./assets/images/home-sec7-back.png" alt="">
    </section>

    <!-- main content ends here -->
    


    <?php include("app/views/partials/footer.php"); ?>
