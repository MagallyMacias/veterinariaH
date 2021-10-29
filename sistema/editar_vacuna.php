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
	if(empty($_POST['IDMascota']) || empty($_POST['NombreVacuna']) ||empty($_POST['Aplicacion']) || empty($_POST['Revacunacion ']))
	{
		$alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
	}else{

		$idVacuna = $_POST['idVacuna'];
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$aplica = $_POST['aplica'];
		$fecha = $_POST['fecha'];
		$recomendacion = $_POST['recomendacion'];

		$query = mysqli_query($conection,"SELECT * FROM VacunasMascota WHERE NombreVacuna = '$nombre' AND IDMascota = '$id'");
		$result = mysqli_fetch_array($query);

		if($result > 0){
			$alert='<p class="msg_errorIDMascota =">La Vacuna Ha Sido Registrada Anteriormente A Este Paciente.</p>';
		}else{

			

			if(empty($_POST['recomendacion']))
			{

				$sql_update = mysqli_query($conection,"UPDATE VacunasMascota
					SET IDMascota = '$id', NombreVacuna = '$nombre', Aplicacion ='$aplica', Revacunacion ='$fecha'
					WHERE IDVacuna = $idVacuna");
			}else{
				$sql_update = mysqli_query($conection,"UPDATE VacunasMascota
					SET IDMascota = '$id', NombreVacuna = '$nombre', Aplicacion ='$aplica', Revacunacion ='$fecha', Recomendaciones ='$recomendacion'
					WHERE IDVacuna = $idVacuna");

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
	header('Location: lista_vacunas.php');
	mysqli_close($conection);
}
$idVac = $_GET['id'];

$sql= mysqli_query($conection,"SELECT IDVacuna, IDMascota, NombreVacuna, Aplicacion, Revacunacion, Recomendaciones FROM VacunasMascota");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
	header('Location: lista_vacunas.php');
}else{
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
			# code...
		$idVac  = $data['IDVacuna'];
		$id  = $data['IDMascota'];
		$nombre = $data['NombreVacuna'];
		$aplica = $data['Aplicacion'];
		$fecha = $data['Revacunacion'];
		$recomendacion  = $data['Recomendaciones'];
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
					<input type="hidden" name="idVacuna" value="<?php echo $idVac; ?>">
					<label for="nombre">ID del Paciente</label>
					<input type="text" name="id" id="id" placeholder="ID" value="<?php echo $id; ?>">
					<label for="nombre">Nombre de la Vacuna</label>
					<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
					<label for="enfermedad">Fecha de Aplicación</label>
					<input id="date" type="date" name="aplica" id="aplica" value="<?php echo $aplica; ?>">
					<label for="enfermedad">Fecha de Revacunacion</label>
					<input id="date" type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
					<label for="nombre">Recomendaciones</label>
					<input type="text" name="recomendacion" id="recomendacion" placeholder="Recomendaciones" value="<?php echo $recomendacion; ?>">
					<br>
					<input type="submit" value="Actualizar" class="btn_save">

				</form>


			</div>


		</section>
	</body>
	</html>