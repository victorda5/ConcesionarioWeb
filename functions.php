<?php

function dbcon() {
    // Configuración de la conexión a la base de datos
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "concesionario"; 

    // Crea la conexión utilizando la información de configuración
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Establece el conjunto de caracteres a utilizar
    $conn->set_charset("utf8");

    // Retorna la conexión establecida
    return $conn;
}

function displayCars(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Construir la consulta SQL para obtener los datos de los vehículos
    $sql = "SELECT ID, BRAND, MODEL, HORSEPOWER, FUEL, PRICE FROM vehicles";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            // Usar un switch para definir la clase CSS del artículo según la marca del vehículo
            switch ($row["BRAND"]) {
                case "Honda":
                    echo '<article class="featured__card mix audi">';
                    break;
                case "Tesla":
                    echo '<article class="featured__card mix tesla">';
                    break;
                case "Porsche":
                    echo '<article class="featured__card mix porsche">';
                    break;
            }

            // Imprimir los datos del vehículo en el artículo
            echo '<h1 class="featured__title">'.$row["BRAND"].'</h1>
                  <h3 class="featured__subtitle">'.$row["MODEL"].'</h3>

                  <img src="./assets/img/car-models/' .$row["BRAND"]. '-' .$row["MODEL"]. '.png" alt="" class="featured__img">

                  <div class="popular__data">
                    <div class="popular__data-group">
                        <i class="ri-flashlight-fill"></i> ' .$row["HORSEPOWER"]. ' HP
                    </div>
                    <div class="popular__data-group">
                        <i class="ri-funds-box-line"></i> 210 Km/h
                    </div>
                    <div class="popular__data-group">
                        <i class="ri-charging-pile-2-line"></i> ' .$row["FUEL"]. '
                    </div>
                  </div>

                  <h3 class="featured__price">'.$row["PRICE"].' €</h3>

                  <a href="configurator.php?car='.$row["BRAND"].'-' .$row["MODEL"]. '" target="_blank">
                        <button class="button featured__button">
                            <i class="ri-shopping-bag-2-line"></i>
                    </button>
                  </a>
            </article>';
        }
    } else {
        echo "0 resultados";
    }
}

function logIn(){
    
    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {

        // Obtener los valores enviados por el formulario y escaparlos para evitar inyecciones SQL
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        // Construir la consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM users WHERE NAME = '$username' AND PASSWORD = '$password'";
    
        // Ejecutar la consulta
        $result = mysqli_query($conn, $sql);
    
        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if (mysqli_num_rows($result) == 1) {
            
            // Credenciales válidas, establecer la sesión con el nombre de usuario y contraseña
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            
            // Redirigir al profile.php después de iniciar sesión
            header("Location: profile.php");
            exit(); // Asegurar que el código se detenga después de la redirección
        } else {
            echo "Invalid credentials";
        }

        $sql = "SELECT ID FROM users WHERE NAME = '$username'";

        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            // Get the result of the query
            $row = $result->fetch_assoc();
        
            // Assign the value to a session variable
            $_SESSION['userid'] = $row['ID'];
        
            echo "User ID assigned to the session successfully";
        } else {
            echo "No user found or multiple users found";
        }
    }
}

function register(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {

        // Obtener los valores enviados por el formulario
        $username = $_POST['username'];
        $email =  $_POST['email'];
        $password = $_POST['password'];

        // Verificar si el email ya existe en la base de datos
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // El email ya está registrado, mostrar error al usuario
            echo "The email is already registered. Please use another email.";
            return false;
        }

        // Crear una consulta SQL para insertar los datos del usuario en la base de datos
        $sql = "INSERT INTO users (NAME, EMAIL, PASSWORD) VALUES ('$username', '$email', '$password')";

        // Ejecutar la consulta y verificar si se realizó correctamente
        if (mysqli_query($conn, $sql)) {
            // Registro exitoso, establecer las credenciales en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            // Redirigir al profile.php después de registrar al usuario
            header("Location: profile.php");
            exit(); // Asegurar que el código se detenga después de la redirección
        } else {
            echo "Can't register the user, an error occurred. " . mysqli_error($conn);
        }
    }
}

function changeCredentials(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {

        // Obtener los valores enviados por el formulario
        $newName = $_POST['newName'];
        $newPassword = $_POST['newPassword'];
        $userId = $_SESSION['username'];

        // Construir la consulta SQL para actualizar los datos de usuario
        $sql = "UPDATE `users` SET `NAME`='$newName', `PASSWORD`='$newPassword' WHERE `NAME` = '$userId' ";
    
        // Ejecutar la consulta y verificar si se actualizó correctamente
        if (mysqli_query($conn, $sql)) {
            // Actualización exitosa, establecer las nuevas credenciales en la sesión
            $_SESSION['username'] = $newName;
            $_SESSION['password'] = $newPassword;
            // Redirigir al profile.php después de cambiar las credenciales
            header("Location: profile.php");
            echo "Credentials successfully changed.";
        } else {
            echo "Can't change credentials, an error occurred. " . mysqli_error($conn);
        }
    }
}

function displaySales(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Consultar información de ventas y unir tablas "sales", "vehicles" y "users"
    $sql = "SELECT users.NAME, vehicles.BRAND, vehicles.PRICE, vehicles.MODEL, sales.ID as ORDERID, users.NAME FROM sales INNER JOIN vehicles ON sales.VEHICLE_ID = vehicles.ID INNER JOIN users ON sales.USER_NAME = users.NAME";
    $result = mysqli_query($conn, $sql);
    
    // Recorrer cada fila de resultados y mostrar la información de la venta
    while ($row = mysqli_fetch_assoc($result)) {
    
        // Mostrar información de la venta dentro de un contenedor de tarjeta
        echo '
        <div class="car-card">
        <div class="car-stat">
            <div class="car-img">
                <img src="./assets/img/car-models/' .$row["BRAND"]. '-' .$row["MODEL"]. '.png" alt="">
                <span class="car-title">'. $row["BRAND"]." ".  $row["MODEL"].'</span>
            </div>
        </div>
        <div class="car-stat"><span class="mobile">ORDER ID</span> <span>' .$row["ORDERID"]. '</span></div>
        <div class="car-stat"><span class="mobile">OWNER</span><span>' .$row["NAME"]. '</span></div>
        <div class="car-stat"><span class="mobile">PRICE (€)</span><span>' .$row["PRICE"]. ' €</span></div>
    </div>';
    }
}

function displayUserSales(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    $username = $_SESSION["username"];

    // Consultar información de ventas y unir tablas "sales", "vehicles" y "users"
    $sql = "SELECT sales.COLOR as COLOR, sales.WHEEL_SIZE as WHEEL_SIZE, users.NAME, vehicles.BRAND, vehicles.PRICE, vehicles.MODEL, sales.ID as ORDERID, users.NAME FROM sales INNER JOIN vehicles ON sales.VEHICLE_ID = vehicles.ID INNER JOIN users ON sales.USER_NAME = users.NAME WHERE NAME = '$username'";
    $result = mysqli_query($conn, $sql);
    
    // Recorrer cada fila de resultados y mostrar la información de la venta
    while ($row = mysqli_fetch_assoc($result)) {
    
        // Mostrar información de la venta dentro de un contenedor de tarjeta
        echo '
        <div class="car-card">
        <div class="car-stat">
            <div class="car-img">
                <img src="./assets/img/car-models/' .$row["BRAND"]. '-' .$row["MODEL"]. '.png" alt="">
                <span class="car-title">'. $row["BRAND"]." ".  $row["MODEL"].'</span>
            </div>
        </div>
        <div class="car-stat"><span class="mobile">COLOR</span> <span>' .$row["COLOR"]. '</span></div>
        <div class="car-stat"><span class="mobile">WHEEL SIZE</span><span>' .$row["WHEEL_SIZE"]. '"</span></div>
        <div class="car-stat"><span class="mobile">PRICE</span><span>' .$row["PRICE"]. ' €</span></div>
    </div>';
    }
}

function displayUsers(){

    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Consultar todos los usuarios en la tabla "users"
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // Recorrer cada fila de resultados y mostrar la información del usuario
    while ($row = mysqli_fetch_assoc($result)){ 

        // Mostrar información del usuario dentro de un contenedor de tarjeta
        echo '<div class="car-card">
                <div class="car-stat">
                    <div class="car-img">
                        <img src="./assets/img/user.png" alt="" style="width: 50px; display: grid; justify-self: center; filter: invert();">
                        <span class="car-title">' .$row["EMAIL"]. '</span>
                    </div>
                </div>
                <div class="car-stat"><span class="mobile">NAME</span><span>' .$row["NAME"]. '</span></div>
                <div class="car-stat"><span class="mobile">REGION</span><span>Spain</span></div>
            </div>';
    }
}

function carSale(){
    
    // Establecer una conexión a la base de datos
    $conn = dbcon();

    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
    
        // Construir la consulta SQL para verificar las credenciales del usuario
        $sql = "INSERT INTO sales (`ID`, `USER_ID`, `VEHICLE_ID`) VALUES (9,9,9)";
    
        // Ejecutar la consulta
        $result = mysqli_query($conn, $sql);
    
    }
}

?>