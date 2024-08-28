

<section id="Footer">
        <div class="container">
            <div class="col-4" data-aos="fade-up">
                <img src="./assets/images/FooterLogo.jpg" alt="Signature Cuisine" id="footerLogo">
            </div>
            <div class="col-4" data-aos="fade-up" data-aos-delay="200">
                <h3 class="F-title">
                    Explore
                </h3>
                <div class="F-list-row">
                    <ul class="F-list">
                        <li><a href="<?= BASE_URL ?>/">Home</a></li>
                        <li><a href="<?= BASE_URL ?>/online-order">Order Online</a></li>
                        <li><a href="<?= BASE_URL ?>/reservation">Reservations</a></li>
                        <li><a href="<?= BASE_URL ?>/gallery">Gallery</a></li>
                        <li><a href="<?= BASE_URL ?>/facility">Facilities</a></li>
                        <li><a href="<?= BASE_URL ?>/about">About Us</a></li>
                        <li><a href="<?= BASE_URL ?>/contact">Connect Us</a></li>
                    </ul>
                    <ul class="F-list">
                    <?php if (isset($_SESSION['Customer_Id'])): ?>
            
                        <li><a href="<?= BASE_URL ?>/my-account">My Account</a></li>
                        <?php else: ?>

                        <li><a href="<?= BASE_URL ?>/login">Login</a></li>
                        <li><a href="<?= BASE_URL ?>/register">Register</a></li>
                        <?php endif; ?>
                        <li><a href="<?= BASE_URL ?>/cart">Cart</a></li>

                    </ul>

                </div>

            </div>
            <div class="col-4" data-aos="fade-up" data-aos-delay="400">
                <h3 class="F-title">
                    Connect with US
                </h3>
                <ul class="socials">
                    <li><a href="#"><img src="./assets/images/facebook-i.png" alt="facebook-i"></a></li>
                    <li><a href="#"><img src="./assets/images/insta-i.png" alt="intargram icon"></a></li>
                    <li><a href="#"><img src="./assets/images/whatsapp-i.png" alt="whats app icon"></a></li>
                    <li><a href="#"><img src="./assets/images/twitter-i.png" alt="X icon"></a></li>
                </ul>

                <h3 class="F-title">
                    Operning Hours
                </h3>
                <p class="F-details">
                    Monday - Friday <br>
                    1.00 PM to 11.00 PM <br>
                    Saturday to Sunday <br>
                    6.00 PM to 11.00 PM

                </p>

            </div>
            <div class="col-4" data-aos="fade-up" data-aos-delay="600">
                <h3 class="F-title">
                    Operning Hours
                </h3>
                <ul class="F-list">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>

                <h3 class="F-title">Join Our Newsletter</h3>
                <form action="" method="post" class="Newsletter">
                    <input type="email" name="email" placeholder="Enter Your Email">
                    <button type="submit" class="btn-main">Subscribe</button>
                </form>

            </div>
        </div>
        <img src="./assets/images/FooterBack.svg" alt="Footer Background" id="FooterBack">
    </section>
    <div id="credits">
        <p>Design and Developed by <span>Fathima Hasna</span></p>
        <p>@2024 Advance Programming Project</p>
    </div>
    <div id="gotoTop" title="Goto top">
        <img src="./assets/images/gotoTop.png" alt="goto top">
    </div>


    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.23/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis();

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }

        requestAnimationFrame(raf)

        AOS.init();
    </script>
    <script src="assets/js/app.js"></script>
</body>

</html>