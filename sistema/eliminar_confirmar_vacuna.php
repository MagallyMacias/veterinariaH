<?php 
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}
include "../conexion.php";

if(!empty($_POST))
{
	if($_POST['idvacuna'] == 1){
		header("location: lista_mascotas.php");
		mysqli_close($conection);
		exit;
	}
	$idvacuna = $_POST['idvacuna'];

	$query_delete = mysqli_query($conection,"DELETE FROM VacunasMascota WHERE IDVacuna = $idvacuna ");
	mysqli_close($conection);
	if($query_delete){
		header("location: lista_vacunas.php");
	}else{
		echo "Error al Eliminar";
	}

}




if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
{
	header("location: lista_vacunas.php");
	mysqli_close($conection);
}else{

	$idvacuna = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT v.NombreVacuna, m.NombreMascota
		FROM VacunasMascota v
		INNER JOIN
		Mascota m
		WHERE v.IDVacuna = $idvacuna ");
	
	mysqli_close($conection);
	$result = mysqli_num_rows($query);

	if($result > 0){
		while ($data = mysqli_fetch_array($query)) {
				# code...
			$nombre = $data['NombreVacuna'];
			$nombremas = $data['NombreMascota'];
		}
	}else{
		header("location: lista_vacunas.php");
	}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Información</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de Eliminar el Siguiente Registro?</h2>
			<p>Vacuna: <span><?php echo $nombre; ?></span></p>
			<p>Dueño: <span><?php echo $nombremas; ?></span></p>
			<form method="post" action="">
				<input type="hidden" name="idvacuna" value="<?php echo $idvacuna; ?>">
				<a href="lista_vacunas.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>