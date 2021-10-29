	<?php include "includes/scripts.php"; ?>
	<?php include "includes/header.php"; ?>
	<?php 

	$alert = '';
	session_start();
	if(!empty($_SESSION['active']))
	{
		header('location: sistema/');
	}else{

		if(!empty($_POST))
		{
			if(empty($_POST['usuario']) || empty($_POST['clave']))
			{
				$alert = 'Ingrese su Correo y Contraseña';
			}else{

				require_once "conexion.php";

				$user = mysqli_real_escape_string($conection,$_POST['usuario']);
				$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

				$query = mysqli_query($conection,"SELECT * FROM Usuario WHERE CorreoUsuario = '$user' AND Clave = '$pass'");
				mysqli_close($conection);
				$result = mysqli_num_rows($query);

				if($result > 0)
				{
					$data = mysqli_fetch_array($query);
					session_start();
					$_SESSION['active'] = true;
					$_SESSION['idUser'] = $data['IDUsuario'];
					$_SESSION['nombre'] = $data['Nombre'];
					$_SESSION['apat'] = $data['ApellidoPaterno'];
					$_SESSION['amat'] = $data['ApellidoMaterno'];
					$_SESSION['edad'] = $data['Edad'];
					$_SESSION['email']  = $data['CorreoUsuario'];
					$_SESSION['clav']   = $data['Clave'];
					$_SESSION['rol']    = $data['Rol'];

					header('location: sistema/');
				}else{
					$alert = 'El Correo o la Contraseña Son Incorrectos';
					session_destroy();
				}


			}

		}
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login | Alebrije</title>
		<link rel="stylesheet" type="text/css" href="css/stylelog.css">
	</head>
	<body>
		<section id="container">
			
			<form action="" method="post">
				
				<h2 class="form_titulo"><i class="fas fa-sign-in-alt"></i>Iniciar Sesión</h2>
				<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
				<br>
				<img src="img/login.png" alt="Login">
				<input type="text" name="usuario" placeholder="Correo">
				<input type="password" name="clave" placeholder="Contraseña">
				<input type="submit" value="Ingresar">

			</form>

		</section>
		<?php
		include "includes/footer.php";
		?>
	</body>
	</html>