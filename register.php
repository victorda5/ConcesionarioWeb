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
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Neukino Motors - Register</title>
</head>

<?php
    // Inicia la sesión
    session_start();

    // Comprueba si la variable de sesión 'username' está definida
    if (isset($_SESSION['username'])) {
        // Si la sesión existe, redirige al usuario a la página 'index.php'
        header("Location: index.php");
        exit(); // Finaliza la ejecución del script actual
    }

    require_once 'functions.php';
    dbcon();
    register();
?>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <img src="assets/img/logo.png" alt="Neukino Logo" style="width: 20px">
                Neukino
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#featured" class="nav__link">Featured</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php#subscribe" class="nav__link">Subscribe</a>
                    </li>
                    <li class="nav__item">
                        <a href="register.php" class="nav__link active-link">Register</a>
                    </li>
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
        <section class="home section" id="home" style="height: auto; margin-top: 10rem; margin-bottom: 10rem">
            <div class="home__container container grid">
                <div class="box">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login-form">
                        <h1>Register</h1>
                        <input type="text" name="username" placeholder="Name" pattern=".{5,}" title="La contraseña debe tener al menos 5 caracteres" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" pattern="^(?=.*\d).{8,}$" title="La contraseña debe tener al menos 8 caracteres y contener al menos un número" required>
                        <input type="submit" style="border: 0" name="submit" value="Register">
                        <div class="register-msg">
                            <pre>Already have an account? Login <a href="login.php">here.</a></pre>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!--==================== LOGOS ====================-->
        <section class="logos section">
            <div class="logos__container container grid">
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo1.png" alt="Porsche Logo" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo2.png" alt="Honda Logo" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo3.png" alt="Tesla Logo" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo4.png" alt="Lamborghini Logo" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo5.png" alt="BMW Logo" class="logos__img">
                </div>
                <div class="logos__content">
                    <img src="assets/img/brand-logos/logo6.png" alt="Mitsubishi Logo" class="logos__img">
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
                    <img src="/assets/img/logo.png" alt="Neukino Logo" style="width: 20px"> Neukino
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