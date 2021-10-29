	<?php include "includes/scripts.php"; ?>
	<?php include "includes/header.php"; ?>


    <?php
    include "conexion.php";

    if(!empty($_POST))
    {
        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['apepat']) ||empty($_POST['apemat']) || empty($_POST['edad']) || empty($_POST['correo']) || empty($_POST['clave']))
        {
            $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
        }else{

            $nombre = $_POST['nombre'];
            $apepat = $_POST['apepat'];
            $apemat = $_POST['apemat'];
            $edad  = $_POST['edad'];
            $email   = $_POST['correo'];
            $clave  = md5($_POST['clave']);

            $query = mysqli_query($conection,"SELECT * FROM Usuario WHERE CorreoUsuario = '$email'");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert='<p class="msg_error">El Correo O El Usuario Ya Existe.</p>';
            }else{

             $query_insert = mysqli_query($conection,"INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Edad, CorreoUsuario, Clave, rol) VALUES('$nombre', '$apepat', '$apemat', '$edad', '$email', '$clave', '2')");
             if($query_insert){
                $alert='<p class="msg_save">Usuario Creado Correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error Al Crear El Usuario.</p>';
            }

        }


    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
	
	<section id="container">
		
		<form action="registro.php" method="post">
			
			<h2 class="form_titulo"><i class="fas fa-notes-medical"></i>Registro de Usuario</h2>

            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <img src="img/login.png" alt="Login">
            <center>
               <br>
               <input type="text" name="nombre" placeholder="Nombre">
               <input type="text" name="apepat" placeholder="Apellido Paterno">
               <input type="text" name="apemat" placeholder="Apellido Materno">
               <input type="number" name="edad" min="15" max="100" placeholder="Edad">
               <input type="email" name="correo" placeholder="Correo">
               <input type="password" name="clave" placeholder="Contraseña">
               <input type="submit" value="Registrarse" class="btn-enviar">
           </center>
       </form>


   </div>


</section>
</body>
</html>