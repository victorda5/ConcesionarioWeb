<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="./assets/img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/configurator.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/index.css">
  <title>Configurator - <?php echo $car = $_GET['car']?></title>
</head>

<?php
    // Inicia la sesión
    session_start();

    // Comprueba si existe la variable de sesión 'username'
    if (!isset($_SESSION['username'])) {
        // Si la sesión existe, redirige al usuario a la página 'index.php'
        header("Location: login.php");
        exit(); // Termina la ejecución del script actual
    }
?>

<?php
if (isset($_GET['car'])) {
  $car = $_GET['car'];

  // Asignar el ID según el valor de car utilizando un switch
  switch ($car) {
      case 'Tesla-Model S':
          $carId = 1;
          break;
      case 'Tesla-Model 3':
          $carId = 2;
          break;
      case 'Honda-Civic':
          $carId = 3;
            break;
      case 'Porsche-718 Boxster':
          $carId = 4;
            break;
      case 'Porsche-Panamera':
          $carId = 5;
            break;
      case 'Honda-CRV':
          $carId = 6;
            break;     
      default:
          header("Location: index.php");
          break;
  }

} 
?>

<span id="carIdSpan" style="display: none"><?php echo $carId?></span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function enviarValor() {
      var carIdSpanValue = document.getElementById('carIdSpan').innerText;

      var color = getColor();
      var valor = color; // Valor de la variable en JavaScript
      var wheelSize = getWheelSize();

      // Enviar el valor al servidor mediante una solicitud AJAX
      $.ajax({
        url: "procesar.php", // Archivo PHP que procesará el valor
        type: "POST",
        data: { valor: valor,
                wheelSize: wheelSize,
                carIdSpanValue: carIdSpanValue },
        success: function(response) {
          alert("Comprado!"); // Mostrar la respuesta del servidor (opcional)
          location.replace('profile.php');
        }
      });
    }
  </script>

<body>

  <div class="grid-container">
    <div class="car-column swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        <div class="car-container"><img src="./assets/img/car-models/display/<?php echo $car = $_GET['car']?>-display1.png" alt="" class="car-img"></div>
        </div>
        <div class="swiper-slide">
        <div class="car-container"><img src="./assets/img/car-models/display/<?php echo $car = $_GET['car']?>-display2.png" alt="" class="car-img"></div>
        </div>
        <div class="swiper-slide">
          <div class="car-container"><img src="./assets/img/car-models/display/<?php echo $car = $_GET['car']?>-display3.png" alt="" class="car-img"></div>
        </div>
        <div class="swiper-slide">
        <div class="car-container"><img src="./assets/img/car-models/display/<?php echo $car = $_GET['car']?>-display4.png" alt="" class="car-img"></div>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="panel-column">

      <div class="panel-column-content">

        <div class="title">
          <h2>Configure Your <?php echo $car = $_GET['car']?></h2>
          <p>Welcome to the custom <?php echo $car = $_GET['car']?> configurator! This is where you can create the car of your dreams. With a wide
            variety of customization options, you can design your own car to be as unique as you are.</p>
        </div>

        <?php

           require_once 'functions.php';
           dbcon();
           carSale();
           
        ?>
        
        <div class="paint section2">
          <h2>Paint Color </h2>
          <div class="radio_container">
            <input type="radio" name="color-radio" id="one" value="Red">
            <label for="one"><span class="dot red"></span></label>
            <input type="radio" name="color-radio" id="two" value="Grey">
            <label for="two"><span class="dot grey"></span></label>
            <input type="radio" name="color-radio" id="three" value="White">
            <label for="three"><span class="dot white" ></span></label>
            <input type="radio" name="color-radio" id="four" value="Blue">
            <label for="four"><span class="dot blue"></span></label>
          </div>
        </div>

        <div class="wheel section2">
          <h2>Wheel Size</h2>
          <div class="radio_container">
            <input type="radio" name="wheel-radio" id="one2" value="17">
            <label for="one2">17'</label>
            <input type="radio" name="wheel-radio" id="two2" value="19">
            <label for="two2">19'</label>
            <input type="radio" name="wheel-radio" id="three2" value="21">
            <label for="three2">21'</label>
            <input type="radio" name="wheel-radio" id="four2" value="22">
            <label for="four2">22'</label>
          </div>
        </div>

        <div class="extras section2">
          <h2>Extras</h2>
          
            <input type="checkbox" id="extra1" name="extra1" value="Tinted Windows">
            Tinted Windows<br>
            <input type="checkbox" id="extra2" name="extra2" value="Panoramic Roof">
            Panoramic Roof<br>
            <input type="checkbox" id="extra3" name="extra3" value="Performance Pack">
            Performance Pack<br>
            <input type="checkbox" id="extra4" name="extra4" value="Sports Wing">
            Sports Wing<br>
            
        </div>

        <div class="button-div section2" style="margin-top: 2rem" onclick="displayColor(); displayWheelSize(); displayExtras();">Proceed to Payment</div>

      </div>
      <div class="purchase-content">
        <h2>Your <?php echo $car = $_GET['car']?></h2>
        <h4><?php echo $car = $_GET['car']?></h4>
        <ul>
          <li>Color: <span class="colorDisplay"></span></li>
          <li>Wheel Size: <span class="wheelSizeDisplay"></span></li>
          <h4>Extras:</h4>
          <li><span class="extrasDisplay"></span></li>
          <h4>Price:</h4>
          <li>Vehicle Price: POR HACER</li>
          <li>Extras: <span class="extrasPrice"></span></li>
          <li>Total: POR HACER</li>
        </ul>
        <h5>Print receipt POR HACER</h5>
        <form method="post" action="configurator.php?car=<?php echo $car = $_GET['car']; ?>" class="login-form" onclick="enviarValor()">
        <input type="button"  name="submit" class="button section2" style="width: 100%; border: 0" value="Order With Card">
        </form>
        <div class="button-div section2 cancel" style="margin-top: 1rem; background-color: rgb(80 80 80);">Cancel</div>
      </div>
    </div>
  </div>

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

</body>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".car-display-swiper", {
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
  });
</script>
<script src="./assets/js/scrollreveal.min.js"></script>
<script src="./assets/js/configurator.js"></script>

</html>