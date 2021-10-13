<footer>
    <!-- Footer -->
    <div class="container mt-5">
        <!-- Footer Section Wrapper Starts-->
        <div class="footer-wrapper">
        <div class="row">
            <div class="col-md-4  d-flex justify-content-center align-items-center">
                <div>
                    <span class="logo-text">Teknasyon Haber</span>
                </div>

            </div>
            <div class="col-md-4">
                <div class="social-links-up">
                    <div>
                        <a href="#"><img src="<?php asset('images/facebook.svg') ?>" alt=""></a>
                    </div>
                    <div>
                        <a href="#"><img src="<?php asset('images/instagram.svg') ?>" alt=""></a>
                    </div>
                    <div>
                        <a href="#"><img src="<?php asset('images/linkedin.svg') ?>" alt=""></a>
                    </div>
                </div>
                <div class="social-links-down">
                    <div>
                        <a href="#"><img src="<?php asset('images/yt-logo.png') ?>" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        </div>
        <!-- Footer Section Wrapper Ends-->
        <div class="text-center mt-3">
            <p>Talih Duran tarafından hazırlanmıştır. © 2021</p>
        </div>
    </div>

    <!-- Footer -->
</footer>




<script src="public/resources/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/swiper/swiper-bundle.min.js"></script>
<script >

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,


        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
</script>
</body>
</html>