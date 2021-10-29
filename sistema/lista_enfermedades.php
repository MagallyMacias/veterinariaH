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
		
		<h1><i class="fas fa-dog"></i>Lista de Enfermedades</h1>
		<a href="registro_enfermedad.php" class="btn_new">Registrar Enfermedad</a>
		
		<form action="buscar_enfermedad.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Nombre de la Enfermedad</th>
					<th>Paciente</th>
					<th>Dueño</th>
					<th>Sintomas</th>
					<th>Tipo de Enfermedad</th>
					<th>Acciones</th>
					
				</tr></center>
				<?php 
				
				$query = mysqli_query($conection,"SELECT e.IDEnfermedad, e.NombreEnfermedad, m.NombreMascota, u.Nombre, e.SintomaEnfermedad, e.TipoEnfermedad FROM EnfermedadesMascotas e INNER JOIN Mascota m ON e.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario");

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
								<a class="link_edit" href="editar_enfermedad.php?id=<?php echo $data["IDEnfermedad"]; ?>"><i class="fas fa-edit"></i>Editar</a>

								<?php if($data["IDEnfermedad"] != 0){ ?>
									|
									<a class="link_delete" href="eliminar_confirmar_enfermedad.php?id=<?php echo $data["IDEnfermedad"]; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a>
								<?php } ?>
								
							</td>
						</tr></center>
						
						<?php 
					}

				}
				?>


			</table>
			
		</section>
	</body>
	</html>