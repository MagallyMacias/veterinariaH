<?php 
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}
include "../conexion.php";

if(!empty($_POST))
{
	if($_POST['idmascota'] == 1){
		header("location: lista_mascotas.php");
		mysqli_close($conection);
		exit;
	}
	$idmascota = $_POST['idmascota'];

	$query_delete = mysqli_query($conection,"DELETE FROM Mascota WHERE IDMascota = $idmascota ");
	mysqli_close($conection);
	if($query_delete){
		header("location: lista_mascotas.php");
	}else{
		echo "Error al Eliminar";
	}

}




if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
{
	header("location: lista_mascotas.php");
	mysqli_close($conection);
}else{

	$idmascota = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT m.NombreMascota, u.Nombre
		FROM Mascota m
		INNER JOIN
		Usuario u
		WHERE u.IDMascota = $idmascota ");
	
	mysqli_close($conection);
	$result = mysqli_num_rows($query);

	if($result > 0){
		while ($data = mysqli_fetch_array($query)) {
				# code...
			$nombre = $data['NombreMascota'];
			$nombreuser = $data['Nombre'];
		}
	}else{
		header("location: lista_mascotas.php");
	}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Mascota</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de Eliminar el Siguiente Registro?</h2>
			<p>Mascota: <span><?php echo $nombre; ?></span></p>
			<p>Dueño: <span><?php echo $nombreuser; ?></span></p>
			<form method="post" action="">
				<input type="hidden" name="idmascota" value="<?php echo $idmascota; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>