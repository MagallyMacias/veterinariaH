<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	
    <link rel="stylesheet" href="css/style.css">
    <title>Alebrije</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
		<?php include "includes/footer.php"; ?>
        <div class="content-all">
            <div class="content-img" id="img1">
                <a href="#img4" class="icon-left-open"></a>
                <img src="img/Presentacion.jpg">
                <a href="#img2" class="icon-right-open"></a>
            </div>
            <div class="content-img" id="img2">
                <a href="#img1" class="icon-left-open"></a>
                <a href="adopta_perro.php"><img src="img/Adopta.jpg" alt="" /></a>
                <a href="#img3" class="icon-right-open"></a>
            </div>
            <div class="content-img" id="img3">
                <a href="#img2" class="icon-left-open"></a>
                <a href="diagnostico_perro.php"><img src="img/Diagnostico.jpg"></a> 
                <a href="#img4" class="icon-right-open"></a>
            </div>
            <div class="content-img" id="img4">
                <a href="#img3" class="icon-left-open"></a>
                <img src="img/Proximamente.jpg"> 
                <a href="#img1" class="icon-right-open"></a>
                <div class="content-details">
                    <h3>Proximamente Más Servicios</h3>
                    <p>Prueba Nuestros Dos Test´s Totalmente Funcionales</p>
                    <a href="adopta_perro.php"><input type="button" value="Adopción"></a>
                    <a href="diagnostico_perro.php"> <input type="button" value="Enfermedades"></a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>