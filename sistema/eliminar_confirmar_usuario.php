<?php 
session_start();
if($_SESSION['rol'] != 1)
{
	header("location: ./");
}
include "../conexion.php";

if(!empty($_POST))
{
	if($_POST['idusuario'] == 1){
		header("location: lista_usuarios.php");
		mysqli_close($conection);
		exit;
	}
	$idusuario = $_POST['idusuario'];

	$query_delete = mysqli_query($conection,"DELETE FROM Usuario WHERE IDUsuario = $idusuario ");
	mysqli_close($conection);
	if($query_delete){
		header("location: lista_usuarios.php");
	}else{
		echo "Error al Eliminar";
	}

}




if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
{
	header("location: lista_usuarios.php");
	mysqli_close($conection);
}else{

	$idusuario = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT u.Nombre, u.CorreoUsuario, r.rol
		FROM Usuario u
		INNER JOIN
		Tipo r
		ON u.rol = r.IDTipo
		WHERE u.IDUsuario = $idusuario ");
	
	mysqli_close($conection);
	$result = mysqli_num_rows($query);

	if($result > 0){
		while ($data = mysqli_fetch_array($query)) {
				# code...
			$nombre = $data['Nombre'];
			$correo = $data['CorreoUsuario'];
			$rol = $data['rol'];
		}
	}else{
		header("location: lista_usuarios.php");
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
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Correo: <span><?php echo $correo; ?></span></p>
			<p>Tipo de Usuario: <span><?php echo $rol; ?></span></p>
			<form method="post" action="">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>