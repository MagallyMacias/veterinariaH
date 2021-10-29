<?php 
session_start();
if($_SESSION['rol'] != 1 & 2)
{
	header("location: ./");
}

include "../conexion.php";	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Enfermedades</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

		$busqueda = strtolower($_REQUEST['busqueda']);
		if(empty($busqueda))
		{
			header("location: lista_enfermedades.php");
			mysqli_close($conection);
		}


		?>
		
		<h1>Lista de Enfermedades</h1>
		<a href="registro_usuario.php" class="btn_new">Agregar Enfermedad</a>
		
		<form action="buscar_enfermedad.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Nombre de la Enfermedad</th>
				<th>Paciente</th>
				<th>Dueño</th>
				<th>Sintomas</th>
				<th>Tipo de Enfermedad</th>
				<th>Acciones</th>
			</tr>
			<?php 


			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as prueba FROM EnfermedadesMascotas 
				WHERE IDEnfermedad LIKE '%$busqueda%' OR 
				NombreEnfermedad LIKE '%$busqueda%' OR 
				SintomaEnfermedad LIKE '%$busqueda%' OR 
				TipoEnfermedad LIKE '%$busqueda%' OR 
				IDMascota LIKE '%$busqueda%'");

			$result_register = mysqli_fetch_array($sql_registe);

			$query = mysqli_query($conection,"SELECT e.IDEnfermedad, e.NombreEnfermedad, m.NombreMascota, u.Nombre, e.SintomaEnfermedad, e.TipoEnfermedad FROM EnfermedadesMascotas e INNER JOIN Mascota m ON e.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario
				WHERE 
				(   e.IDEnfermedad LIKE '%$busqueda%' OR 
				e.NombreEnfermedad LIKE '%$busqueda%' OR
				m.NombreMascota LIKE '%$busqueda%' OR 
				u.Nombre LIKE '%$busqueda%' OR 
				e.SintomaEnfermedad LIKE '%$busqueda%' OR 
				e.TipoEnfermedad LIKE '%$busqueda%')");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
					?>
					<center><tr>
						<td><?php echo $data["IDEnfermedad"]; ?></td>
						<td><?php echo $data["NombreEnfermedad"]; ?></td>
						<td><?php echo $data["NombreMascota"]; ?></td>
						<td><?php echo $data["Nombre"]; ?></td>
						<td><?php echo $data["SintomaEnfermedad"]; ?></td>
						<td><?php echo $data["TipoEnfermedad"]; ?></td>
						<td>
							<a class="link_edit" href="editar_enfermedad.php?id=<?php echo $data["IDEnfermedad"]; ?>">Editar</a>

							<?php if($data["IDEnfermedad"] != 0){ ?>
								|
								<a class="link_delete" href="eliminar_confirmar_enfermedad.php?id=<?php echo $data["IDEnfermedad"]; ?>">Eliminar</a>
							<?php } ?>
							
						</td>
					</tr></center>
					
					<?php 
				}

			}
			?>


		</table>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>