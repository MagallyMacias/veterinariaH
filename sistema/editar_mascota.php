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
	if(empty($_POST['nombre']) || empty($_POST['raza']) || empty($_POST['sexo']) || empty($_POST['edad']) || empty($_POST['tamano']) || empty($_POST['peso']))
	{
		$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
	}else{

		$idMascota = $_POST['idMascota'];
		$nombre = $_POST['nombre'];
		$idusuario = $_POST['idusuario'];
		$raza = $_POST['raza'];
		$sexo = $_POST['sexo'];
		$edad = $_POST['edad'];
		$tamano  = $_POST['tamano'];
		$peso = $_POST['peso'];

		$query = mysqli_query($conection,"SELECT * FROM Mascota WHERE NombreMascota = '$nombre' AND IDUsuario =  '$idusuario'");
		$result = mysqli_fetch_array($query);

		if($result > 0){
			$alert='<p class="msg_error">La Mascota Ya Se Ha Registrado Anteriormente.</p>';
		}else{


			if(empty($_POST['idusuario']))
			{
				$sql_update = mysqli_query($conection,"UPDATE Mascota
					SET NombreMascota = '$nombre', RazaMascota ='$raza', SexoMascota ='$sexo', EdadMascota ='$edad', TamanoMascota ='$tamano', PesoMascota ='$peso'
					WHERE IDMascota= $idMascota");

			}else{
				$sql_update = mysqli_query($conection,"UPDATE Mascota
					SET NombreMascota = '$nombre', IDUsuario = '$idusuario', RazaMascota ='$raza', SexoMascota ='$sexo', EdadMascota ='$edad', TamanoMascota ='$tamano', PesoMascota ='$Mascota'
					WHERE IDMascota= $idMascota");

			}

			if($sql_update){
				$alert='<p class="msg_save">Información Actualizada Correctamente.</p>';
			}else{
				$alert='<p class="msg_error">Error Al Actualizar Información.</p>';
			}

		}


	}
}

	//Mostrar Datos
if(empty($_GET['id']))
{
	header('Location: lista_mascotas.php');
	mysqli_close($conection);
}
$idMas = $_GET['id'];

$sql= mysqli_query($conection,"SELECT IDMascota, NombreMascota, IDUsuario, RazaMascota, SexoMascota, EdadMascota, TamanoMascota, PesoMascota FROM Mascota");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
	header('Location: lista_mascotas.php');
}else{

	while ($data = mysqli_fetch_array($sql)) {
			# code...
		$idMas  = $data['IDMascota'];
		$nombre = $data['NombreMascota'];
		$iduser = $data['IDUsuario'];
		$raza = $data['RazaMascota'];
		$sexo = $data['SexoMascota'];
		$edad  = $data['EdadMascota'];
		$tamano = $data['TamanoMascota'];
		$peso = $data['PesoMascota'];


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
				<input type="hidden" name="idMascota" value="<?php echo $idMas; ?>">
				<label for="nombre">Nombre de la Mascota </label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
				<label for="idusuario">ID del Dueño</label>
				<input type="text" name="idusuario" id="idusuario" placeholder="ID">
				<label for="nombre">Raza</label>
				<input type="text" name="raza" id="raza" placeholder="Raza" value="<?php echo $raza; ?>">
				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo" value="<?php echo $sexo; ?>">
					<option value="Macho">Macho</option>
					<option value="Hembra">Hembra</option>
				</select>
				<label for="nombre">Edad (Solo Cifra)</label>
				<input type="text" name="edad" id="edad" placeholder="Edad" value="<?php echo $edad; ?>">
				<label for="tamano">Tamaño (Solo Cifra cm)</label>
				<input type="text" name="tamano" id="tamano" placeholder="Tamaño" value="<?php echo $tamano; ?>">
				<label for="peso">Peso (Solo Cifra kg)</label>
				<input type="text" name="peso" id="peso" placeholder="Peso" value="<?php echo $peso; ?>">
				<input type="submit" value="Actualizar" class="btn_save">

			</form>


		</div>


	</section>
</body>
</html>