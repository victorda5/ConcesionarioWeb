<!DOCTYPE html>
<html lang="en">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".sales-wrapper").hide();
        $(".box").hide();
        $("#modify").click(function(){
            $(".sales-wrapper").hide();
            $(".box").toggle();
    });
    $("#orders").click(function(){
        $(".box").hide();
        $(".sales-wrapper").toggle();
        });
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Neukino Motors - My Profile</title>
</head>

<?php
    // Inicia la sesión
    session_start();

    // Comprueba si existe la variable de sesión 'username'
    if (!isset($_SESSION['username'])) {
        // Si la sesión existe, redirige al usuario a la página 'index.php'
        header("Location: index.php");
        exit(); // Termina la ejecución del script actual
    }

    require_once 'functions.php';
    dbcon();
    changeCredentials();
?>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <img src="assets/img/logo.png" style="width: 20px">
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
                        <a href="profile.php" class="nav__link active-link">My Profile</a>
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
        <section class="home section" style="height: auto" id="home">

            <div class="home__container container grid">
            <div class="button-container">
                <h1>Welcome back, <?php echo $_SESSION['username']; ?> <br></h1>
            </div>
                <div class="box">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login-form">
                        <h1 style="text-align: left; margin-left: 1rem;">Modify Profile</h1>
                        <h3 style="margin-left: 1rem; opacity: .6;">Change login credentials</h3>
                        <input type="text" name="newName" placeholder="Email" value="<?php echo $_SESSION['username']?>" required>
                        <input type="password" name="newPassword" placeholder="Password" value="<?php echo $_SESSION['password']?>" required>
                        <input style="width: 49.2%; display: inline; border: 0;" type="submit" name="submit" value="Save">
                        <input style="width: 49.2%; display: inline; border: 0; background-color: rgb(80 80 80)" type="submit" name="cancel" value="Cancel">
                    </form>
                </div>

                <div class="sales-wrapper" style="display: flex; justify-content: center">
                    <div class="sales-stats">
                        <h1 class="section-title vehicles-sold-title">My Orders</h1>
                        <div class="table">
                        <div class="car-card desktop">
                        <div class="car-stat">
                        <div class="car-img">
                        <span>CAR</span>
                        <span>MODEL</span>
                </div>
            </div>
            <div class="car-stat"><span>COLOR</span></div>
            <div class="car-stat"><span>WHEEL SIZE</span></div>
            <div class="car-stat"><span>PRICE</span></div>
        </div>
        <?php displayUserSales(); ?>
    </div>
</div>
</div>

                <div class="button-container">

                <?php

                if($_SESSION['username'] !== 'admin'){
                    echo '<input type="button" value="Modify" class="form-button" id="modify">

                    <input type="button" value="My orders" class="form-button" id="orders">';
                }else{
                    echo '<a Target="_blank" href="dashboard.php" class="form-button">Dashboard</a>';
                }

                ?>
  
                    <a href="logout.php" class="form-button"> Logout </a>

                </div>

            </div>

            <?php

include_once 'functions.php';
dbcon();

?>

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
                    <img src="assets/img/logo.png" style="width: 20px"> Neukino
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