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
	if(empty($_POST['nombre']) || empty($_POST['sintoma']) || empty($_POST['enfermedad']))
	{
		$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
	}else{

		$idenfermedad = $_POST['idenfermedad'];
		$nombre = $_POST['nombre'];
		$sintoma = $_POST['sintoma'];
		$enfermedad = $_POST['enfermedad'];
		$idmas = $_POST['idmas'];


		$query = mysqli_query($conection,"SELECT * FROM EnfermedadesMascotas WHERE NombreEnfermedad = '$nombre' AND IDMascota =  '$idmas'");
		$result = mysqli_fetch_array($query);

		if($result > 0){
			$alert='<p class="msg_error">La Enfermedad Ha Sido Registrada Anteriormente a Este Paciente.</p>';
		}else{


			if(empty($_POST['idmas']))
			{
				$sql_update = mysqli_query($conection,"UPDATE EnfermedadesMascotas
					SET NombreEnfermedad = '$nombre', SintomaEnfermedad ='$sintoma', TipoEnfermedad ='$enfermedad'
					WHERE IDEnfermedad= $idenfermedad");

			}else{
				$sql_update = mysqli_query($conection,"UPDATE EnfermedadesMascotas
					SET NombreEnfermedad = '$nombre', SintomaEnfermedad ='$sintoma', TipoEnfermedad ='$enfermedad', IDMascota = '$idmas'
					WHERE IDEnfermedad= $idenfermedad");

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
	header('Location: lista_enfermedades.php');
	mysqli_close($conection);
}
$iduser = $_GET['id'];

$sql= mysqli_query($conection,"SELECT IDEnfermedad, NombreEnfermedad, SintomaEnfermedad, TipoEnfermedad, IDMascota FROM EnfermedadesMascotas");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
	header('Location: lista_enfermedades.php');
}else{

	while ($data = mysqli_fetch_array($sql)) {
			# code...
		$idenfer  = $data['IDEnfermedad'];
		$nombre = $data['NombreEnfermedad'];
		$sintoma = $data['SintomaEnfermedad'];
		$enfermedad = $data['TipoEnfermedad'];
		$idmascota  = $data['IDMascota'];


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
			<center><h1>Registro de Enfermedad</h1></center>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="idenfermedad" value="<?php echo $idenfer; ?>">
				<label for="nombre">Nombre de la Enfermedad</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
				<label for="nombre">Sintomas</label>
				<input type="text" name="sintoma" id="sintoma" placeholder="Sintomas" value="<?php echo $sintoma; ?>">
				<label for="enfermedad">Tipo de Enfermedad</label>
				<select name="enfermedad" id="enfermedad">
					<option value="Tratable">Tratable</option>
					<option value="Grave">Grave</option>
				</select>
				<label for="nombre">ID de la Mascota</label>
				<input type="text" name="idmas" id="idmas" placeholder="ID">
				
				
				<input type="submit" value="Actualizar" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>