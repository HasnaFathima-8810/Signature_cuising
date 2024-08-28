
    <?php include "app/views/partials/header.php" ?>

    <!-- main content starts here -->

    <section id="heading-gallery" class="page-heading">
        <div class="container">
            <h1>
               Gallery
            </h1>
            <p>
                A Visual Feast of Signature Cuisine
            </p>
        </div>
        <img class="GoDown" src="./assets/images/Go-down.svg" alt="" onclick="lenis.scrollTo('main');">
    </section>

    <main>
        <div class="container">
            <h2 class="heading">
                Explore Our Culinary World
            </h2>

            <div id="Gallery-grid">
                <div class="grid-area1">
                    <img src="./assets/images/sec2-card (1).jpg" alt="" class="ukiyo">
                </div>
                <div class="grid-area2">
                    <p>
                        Welcome to our gallery, where we invite you to feast your eyes on the visual delights of Signature Cuisine. Our carefully curated collection of images captures the essence of our culinary artistry, the elegance of our ambiance, and the memorable moments shared within our walls.
                    </p>
                </div>
                <div class="grid-area3">
                    <img src="./assets/images/sec2-card (3).jpg" alt="" class="ukiyo">
                </div>
                <div class="grid-area4">
                    <img class="ukiyo" src="./assets/images/two-chefs-making desserts.png" alt="">
                </div>
                <div class="grid-area5">
                    <img src="./assets/images/sec2-card (2).jpg" alt="" class="ukiyo">
                </div>
                <div class="grid-area6">
                    <p>Immerse yourself in the art of culinary presentation with our meticulously crafted dishes.</p>
                </div>
                <div class="grid-area7">
                    <img src="./assets/images/asian-6308470_1280.jpg" alt="" class="ukiyo">
                </div>
                <div class="grid-area8">
                    <p>Cherish the joy of sharing meals with loved ones in the heartwarming embrace of our restaurant</p>
                </div>
                <div class="grid-area9">
                    <p>Witness the dedication and expertise of our culinary team as they create culinary masterpieces.</p>
                </div>
                <div class="grid-area10">
                    <img src="./assets/images/about-grid-img.png" alt="" class="ukiyo">
                </div>
                <div class="grid-area11">
                    <img src="./assets/images/signature-chef.jpg" alt="" class="ukiyo">
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

    <?php include "app/views/partials/footer.php" ?>