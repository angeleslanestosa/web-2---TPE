<?php
require_once 'app/controller/BookingController.php';
require_once 'templates/header.phtml';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripScript - Home</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Estilos directamente en el archivo PHP usando Bootstrap */
        .bg-image {
            background-image: url('images/home.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh; /* 100% de la altura de la ventana */
        }
    </style>
</head>
<body>
    <!-- Contenedor con imagen de fondo usando clases de Bootstrap -->
    <div class="bg-image d-flex align-items-center justify-content-center">
        <div class="text-center text-white">
            <h1>Bienvenido a TripScript</h1>
            <p>Gestiona tus reservas hoteleras fácilmente.</p>
            <a href="booking" class="btn btn-primary">Reservá ahora</a>
        </div>
    </div>

    <?php
    require_once 'templates/footer.phtml';
    ?>
    

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


