
    <?php include("app/views/partials/header.php");  ?>


    <!-- main content starts here -->

    <section id="heading-about" class="page-heading">
        <div class="container">
            <h1>
                About Us
            </h1>
            <p>
                A Taste of Our Passion
            </p>
        </div>
        <img class="GoDown" src="./assets/images/Go-down.svg" alt="" onclick="lenis.scrollTo('main');">
    </section>

    <main>
        <div class="container">
            <h2 class="heading">
                Our Story
            </h2>

            <div class="row-about">
                <p class="about-content" data-aos="fade-right">
                    At Signature Cuisine, our story is one of passion, tradition, and innovation.
                    Founded with a deep-rooted love for culinary artistry, our journey began as a
                    humble endeavor to create exceptional dining experiences.
                </p>
                <div class="about-imgs" data-aos="fade-left">
                    <img src="./assets/images/About-img132.jpg" alt="">
                    <img src="./assets/images/about-generated.png" alt="">
                </div>
            </div>

            <div id="about-grid">
                <div class="grid-area1">
                    <img class="ukiyo" src="./assets/images/about-grid-img.png" alt="">
                </div>
                <div class="grid-area2">
                    <h4 class="small-heading" data-aos="fade-left">
                        Our Vision
                    </h4>

                    <p data-aos="fade-left" data-aos-delay="100">
                        We envisioned a place where every dish is a work of art, where tradition and innovation
                        harmonize, and where every bite tells a story. Our vision is to elevate dining into an immersive
                        sensory journey, where flavors, aromas, and ambiance come together to create unforgettable
                        memories.
                    </p>
                </div>
                <div class="grid-area3">
                    <img class="ukiyo" src="./assets/images/two-chefs-making desserts.png" alt="">
                </div>
                <div class="grid-area4">
                    <h4 class="small-heading" data-aos="fade-left">
                        Our Culinary Team
                    </h4>
                    <p data-aos="fade-left" data-aos-delay="100">
                        Our culinary team is at the heart of our success. With years of experience and a commitment to
                        excellence, our chefs transform the finest ingredients into masterpieces on a plate. Each dish
                        is a testament to their dedication and craftsmanship.
                    </p>
                </div>
                <div class="grid-area5">
                    <img class="ukiyo" src="./assets/images/swiper-imgs (3).jpg" alt="">
                </div>
                <div class="grid-area6">
                    <h4 class="small-heading" data-aos="fade-left">
                        The Signature Experience
                    </h4>
                    <p data-aos="fade-left" data-aos-delay="100">
                        When you dine at Signature Cuisine, you embark on a culinary adventure that celebrates the
                        diversity of flavors. Our carefully crafted menu showcases a fusion of traditional recipes and
                        contemporary techniques, ensuring that every dish is a delightful surprise for your palate.
                    </p>
                </div>
                <div class="grid-area7">
                    <h4 class="small-heading" data-aos="fade-left">
                        Our Commitment
                    </h4>
                    <p data-aos="fade-left" data-aos-delay="100">
                        We are committed to delivering an exceptional dining experience, not just through our cuisine
                        but also through our warm hospitality and inviting ambiance. At Signature Cuisine, you're not
                        just a guest; you're a part of our culinary family.
                    </p>
                </div>
            </div>


        </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/ukiyojs@4.1.2/dist/ukiyo.min.js"></script>

    <script>
        const images = document.getElementsByClassName('ukiyo');
        new Ukiyo(images);
    </script>


    <!-- main content ends here -->
    
    <?php include("app/views/partials/footer.php"); ?>