<?php 

session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}

include "../conexion.php";

if(!empty($_POST))
{
	$alert='';
	if(empty($_POST['nombre']) || empty($_POST['apepat']) ||empty($_POST['apemat']) || empty($_POST['edad']) || empty($_POST['correo']) || empty($_POST['rol']))
	{
		$alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
	}else{

		$idUsuario = $_POST['idUsuario'];
		$nombre = $_POST['nombre'];
		$apepat = $_POST['apepat'];
		$apemat = $_POST['apemat'];
		$edad  = $_POST['edad'];
		$correo   = $_POST['correo'];
		$clave  = md5($_POST['clave']);
		$rol    = $_POST['rol'];

		$query = mysqli_query($conection,"SELECT * FROM Usuario 
			WHERE (Nombre = '$nombre' AND IDUsuario != $idUsuario)
			OR (CorreoUsuario = '$correo' AND IDUsuario != $idUsuario) ");

		$result = mysqli_fetch_array($query);

		if($result > 0){
			$alert='<p class="msg_error">El Correo o el Usuario Ya Existe.</p>';
		}else{

			if(empty($_POST['clave']))
			{

				$sql_update = mysqli_query($conection,"UPDATE Usuario
					SET Nombre = '$nombre', ApellidoPaterno = '$apepat', ApellidoMaterno='$apemat', Edad='$edad', CorreoUsuario='$correo', rol='$rol'
					WHERE IDUsuario= $idUsuario");
			}else{
				$sql_update = mysqli_query($conection,"UPDATE Usuario
					SET Nombre = '$nombre', ApellidoPaterno = '$apepat', ApellidoMaterno='$apemat', Edad='$edad', CorreoUsuario='$correo', Clave ='$clave', rol='$rol'
					WHERE IDUsuario= $idUsuario");

			}

			if($sql_update){
				$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
			}else{
				$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
			}

		}


	}
}

	//Mostrar Datos
if(empty($_GET['id']))
{
	header('Location: lista_usuarios.php');
	mysqli_close($conection);
}
$iduser = $_GET['id'];

$sql= mysqli_query($conection,"SELECT u.IDUsuario, u.Nombre, u.ApellidoPaterno, u.ApellidoMaterno, u.Edad, u.CorreoUsuario, (u.Rol) as IDTipo, (r.Rol) as Rol
	FROM Usuario u
	INNER JOIN Tipo r
	on u.rol = r.IDTipo
	WHERE IDUsuario = $iduser");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
	header('Location: lista_usuarios.php');
}else{
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
			# code...
		$iduser  = $data['IDUsuario'];
		$nombre = $data['Nombre'];
		$apepat = $data['ApellidoPaterno'];
		$apemat = $data['ApellidoMaterno'];
		$edad  = $data['Edad'];
		$correo = $data['CorreoUsuario'];
		$idrol = $data['IDTipo'];
		$rol = $data['Rol'];

		if($idrol == 1){
			$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
		}else if($idrol == 2){
			$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';	
		}


	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actulización de Información</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<center><h1>Actulización de Información</h1></center>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
				<label for="nombre">Apellido Paterno</label>
				<input type="text" name="apepat" id="apepat" placeholder="Apellido Paterno" value="<?php echo $apepat; ?>">
				<label for="nombre">Apellido Materno</label>
				<input type="text" name="apemat" id="apemat" placeholder="Apellido Materno" value="<?php echo $apemat; ?>">
				<label for="nombre">Edad</label>
				<input type="text" name="edad" id="edad" placeholder="Edad" value="<?php echo $edad; ?>">
				<label for="correo">Correo Electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>">
				<label for="clave">Contraseña</label>
				<input type="password" name="clave" id="clave" placeholder="Contraseña">
				<label for="rol">Tipo de Usuario</label>

				<?php 
				include "../conexion.php";
				$query_rol = mysqli_query($conection,"SELECT * FROM Tipo");
				mysqli_close($conection);
				$result_rol = mysqli_num_rows($query_rol);

				?>

				<select name="rol" id="rol" class="notItemOne">
					<?php
					echo $option; 
					if($result_rol > 0)
					{
						while ($rol = mysqli_fetch_array($query_rol)) {
							?>
							<option value="<?php echo $rol["IDTipo"]; ?>"><?php echo $rol["Rol"] ?></option>
							<?php 
								# code...
						}

					}
					?>
				</select>
				<input type="submit" value="Actualizar Usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>