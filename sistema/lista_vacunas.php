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
	<title>Lista de Vacunas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1><i class="fas fa-syringe"></i>Lista de Vacunas</h1>
		<a href="registro_vacuna.php" class="btn_new">Registrar Vacuna</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Paciente</th>
					<th>Dueño</th>
					<th>Vacuna</th>
					<th>Fecha de Aplicacion</th>
					<th>Fecha de Revacunacion</th>
					<th>Recomendaciones</th>
					<th>Acciones</th>
					
				</tr></center>
				<?php 
				
				$query = mysqli_query($conection,"SELECT v.IDVacuna, m.NombreMascota, u.Nombre, v.NombreVacuna, v.Aplicacion, v.Revacunacion, v.Recomendaciones  FROM VacunasMascota v INNER JOIN Mascota m ON v.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario");

				$result = mysqli_num_rows($query);
				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
						
						?>
						<center><tr>
							<td><?php echo $data["IDVacuna"]; ?></td>
							<td><?php echo $data["NombreMascota"]; ?></td>
							<td><?php echo $data["Nombre"]; ?></td>
							<td><?php echo $data["NombreVacuna"]; ?></td>
							<td><?php echo $data["Aplicacion"]; ?></td>
							<td><?php echo $data["Revacunacion"]; ?></td>
							<td><?php echo $data["Recomendaciones"]; ?></td>
							
							<td>
								<a class="link_edit" href="editar_vacuna.php?id=<?php echo $data["IDVacuna"]; ?>"><i class="fas fa-edit"></i>Editar</a>

								<?php if($data["IDVacuna"] != 0){ ?>
									|
									<a class="link_delete" href="eliminar_confirmar_vacuna.php?id=<?php echo $data["IDVacuna"]; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a>
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