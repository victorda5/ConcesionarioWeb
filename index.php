<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Neukino Motors</title>
</head>

<body>

    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="assets/img/logo.png" style="width: 20px">
                Neukino
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#featured" class="nav__link">Featured</a>
                    </li>
                    <li class="nav__item">
                        <a href="#subscribe" class="nav__link">Subscribe</a>
                    </li>

                    <?php
                    // Inicia la sesión
                    session_start();

                    // Comprueba si existe la variable de sesión 'username'
                    if (isset($_SESSION['username'])) {
                        // Usuario ha iniciado sesión
                        $username = $_SESSION['username'];

                        // Muestra el enlace 'My Profile'
                        echo '<li class="nav__item">
                            <a href="profile.php" class="nav__link">My Profile</a>
                        </li>';
                    } else {
                        // Usuario no ha iniciado sesión
                        // Muestra el enlace 'Login'
                        echo '<li class="nav__item">
                            <a href="login.php" class="nav__link">Login</a>
                        </li>';
                    }
                    ?>

                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <!-- Toggle button-->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">

            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        Choose The Best Car
                    </h1>

                    <h2 class="home__subtitle">
                        Dodge Charger SRT
                    </h2>

                    <h3 class="home__elec">
                        <i class="ri-flashlight-fill"></i> American Muscle Car
                    </h3>
                </div>

                <img src="assets/img/car-models/dodge-charger.png" alt="" class="home__img">

                <div class="home__car">
                    <div class="home__car-data">
                        <div class="home__car-icon">
                            <i class="ri-flashlight-line"></i>
                        </div>
                        <h2 class="home__car-number" data-val="720">000</h2>
                        <h3 class="home__car-name">HORSEPOWER</h3>
                    </div>

                    <div class="home__car-data">
                        <div class="home__car-icon">
                            <i class="ri-funds-box-line"></i>
                        </div>
                        <h2 class="home__car-number" data-val="280">000</h2>
                        <h3 class="home__car-name">TOP SPEED</h3>
                    </div>

                    <div class="home__car-data">
                        <div class="home__car-icon">
                            <i class="ri-timer-line"></i>
                        </div>
                        <h2 class="home__car-number" data-val="4">4</h2>
                        <h3 class="home__car-name">0-100 km/h</h3>
                    </div>
                </div>

                <a href="#featured" class="home__button">START</a>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__group order2" id="jiji">
                    <video class="about__img" autoplay muted loop
                        src="https://tesla-cdn.thron.com/static/PIUCZZ_MS-Interior-Grid-2-Audio-Desktop_CLFX4X.mp4?xseo="></video>
                </div>


                <div class="about__data" id="jojo">
                    <div class="about__data-content">
                        <h2 class="section__title about__title">
                            Machines with Future technology
                        </h2>
                        <p class="about__description">
                            See the future with high-performance cars produced by
                            renowned brands. They feature futuristic builds and designs with
                            new and innovative platforms that last a long time.
                        </p>
                    </div>
                </div>

            </div>

            <div class="about__container container grid">
                <div class="about__data" id="jaja">
                    <div class="about__data-content">
                        <h2 class="section__title about__title">
                            Make Your Own Car
                        </h2>
                        <p class="about__description">
                            Build and customize your car to your exact
                            specifications. You can choose everything from the exterior color to the interior material
                            and
                            technology packages. With the growing number of options available, you can truly make your
                            car
                            your own.
                        </p>
                    </div>

                </div>

                <div class="about__group swiper order2 aboutSwiper" id="juju">
                    <div class="swiper-wrapper">
                        <div class="about__group order1 swiper-slide">
                            <img src="assets/img/about1.png" alt="" class="about__img">
                        </div>

                        <div class="about__group order1 swiper-slide">
                            <img src="assets/img/about2.png" alt="" class="about__img">
                        </div>

                        <div class="about__group order1 swiper-slide">
                            <img src="assets/img/about3.png" alt="" class="about__img">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

            <div class="about__container container grid">

                <div class="about__group order2" id="jiji">
                    <img src="./assets/img/support.png" alt="" class="about__img">
                </div>

                <div class="about__data" id="jojo">
                    <div class="about__data-content">
                        <h2 class="section__title about__title">
                            Got Any Questions? Let Us Know
                        </h2>
                        <p class="about__description">
                            We believe in transparency and honesty in all our dealings, and we're always happy to answer
                            any
                            questions you may have about our vehicles or the car-buying process.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!--==================== FEATURED ====================-->
        <section class="featured section" id="featured">
            <h2 class="section__title">Featured Cars</h2>

            <div class="featured__container container">
                <ul class="featured__filters">
                    <li>
                        <button class="featured__item" data-filter="all">
                            <span>All</span>
                        </button>
                    </li>

                    <li>
                        <button class="featured__item" data-filter=".tesla">
                            <img src="assets/img/brand-logos/logo3.png" alt="">
                        </button>
                    </li>

                    <li>
                        <button class="featured__item" data-filter=".audi">
                            <img src="assets/img/brand-logos/logo2.png" alt="">
                        </button>
                    </li>

                    <li>
                        <button class="featured__item" data-filter=".porsche">
                            <img src="assets/img/brand-logos/logo1.png" alt="">
                        </button>
                    </li>
                </ul>

                <div class="featured__content grid">

                    <?php
                    require_once 'functions.php';
                    dbcon();
                    displayCars();
                    ?>
                    
                </div>
        </section>

        <!--==================== OFFER ====================-->
        <section class="offer section" id="subscribe">
            <div class="offer__container container grid">

                <div class="offer__data">
                    <h2 class="section__title offer__title">
                        Do You Want To Receive <br> Special Offers?
                    </h2>

                    <p class="offer__description">
                        Be the first to receive all the information about our
                        products and new cars by email by subscribing to our
                        mailing list.
                    </p>

                    <a href="#" class="button">
                        Subscribe Now
                    </a>
                </div>

                <img src="assets/img/offer.png" alt="" class="offer__img">
            </div>
        </section>

        <!--==================== LOGOS ====================-->
        <section class="logos section">
            <div class="logos__container container grid">
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo1.png" alt="" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo2.png" alt="" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo3.png" alt="" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo4.png" alt="" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo5.png" alt="" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo6.png" alt="" class="logos__img">
                </div>
            </div>
        </section>
    </main>


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="shape shape__big"></div>
        <div class="shape shape__small"></div>

        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="" class="footer__logo">
                    <img src="/assets/img/logo.png" style="width: 20px"> Neukino
                </a>
                <p class="footer__description">
                    We offer the best electric cars of <br>
                    the most recognized brands in <br>
                    the world.
                </p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Company
                </h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">About</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Cars</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">History</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Shop</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Information
                </h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Request a quote</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Find a dealer</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Contact us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Services</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Follow us
                </h3>

                <ul class="footer__social">
                    <a href="https:://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class="ri-facebook-fill"></i>
                    </a>
                    <a href="https:://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="https:://www.twitter.com/" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-line"></i>
                    </a>
                </ul>
            </div>
        </div>

        <span class="footer__copy">
            &#169; Víctor Davó. All rights reserved
        </span>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="./assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="./assets/js/swiper-bundle.min.js"></script>

    <!--=============== MIXITUP JS ===============-->
    <script src="./assets/js/mixitup.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="./assets/js/main.js"></script>

</body>
</html>