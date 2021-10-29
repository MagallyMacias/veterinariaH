<?php 
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}
include "../conexion.php";

if(!empty($_POST))
{
	if($_POST['idenfermedad'] == 1){
		header("location: lista_enfermedades.php");
		mysqli_close($conection);
		exit;
	}
	$idenfermedad = $_POST['idenfermedad'];

	$query_delete = mysqli_query($conection,"DELETE FROM  EnfermedadesMascotas WHERE IDEnfermedad = $idenfermedad ");
	mysqli_close($conection);
	if($query_delete){
		header("location: lista_enfermedades.php");
	}else{
		echo "Error al Eliminar";
	}

}




if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
{
	header("location: lista_enfermedades.php");
	mysqli_close($conection);
}else{

	$idenfermedad = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT m.NombreMascota, e.NombreEnfermedad
		FROM EnfermedadesMascotas e
		INNER JOIN
		Mascota m
		WHERE e.IDEnfermedad = $idenfermedad ");
	
	mysqli_close($conection);
	$result = mysqli_num_rows($query);

	if($result > 0){
		while ($data = mysqli_fetch_array($query)) {
				# code...
			$nombre = $data['NombreMascota'];
			$enfermedad = $data['NombreEnfermedad'];
		}
	}else{
		header("location: lista_enfermedades.php");
	}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de Eliminar el Siguiente Registro?</h2>
			<p>Paciente: <span><?php echo $nombre; ?></span></p>
			<p>Enfermedad: <span><?php echo $enfermedad; ?></span></p>
			<form method="post" action="">
				<input type="hidden" name="idenfermedad" value="<?php echo $idenfermedad; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>