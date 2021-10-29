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
		
		<h1><i class="fas fa-allergies"></i>Lista de Alergias</h1>
		<a href="registro_alergia.php" class="btn_new">Registrar Alergia</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		<center><br>
			<table>
				<tr>
					<th>ID</th>
					<th>Paciente</th>
					<th>Dueño</th>
					<th>Alergia</th>
					<th>Reacción</th>
					
				</tr><center>
					<?php 
					
					$query = mysqli_query($conection,"SELECT a.IDAlergia, m.NombreMascota, u.Nombre, a.Alergia, a.Reaccion FROM AlergiasMascota a INNER JOIN Mascota m ON a.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario");

					$result = mysqli_num_rows($query);
					if($result > 0){

						while ($data = mysqli_fetch_array($query)) {
							
							?>
							<tr>
								<td><?php echo $data["IDAlergia"]; ?></td>
								<td><?php echo $data["NombreMascota"]; ?></td>
								<td><?php echo $data["Nombre"]; ?></td>
								<td><?php echo $data["Alergia"]; ?></td>
								<td><?php echo $data["Reaccion"]; ?></td>
								
							</tr></center>
							
							<?php 
						}

					}
					?>


				</table>
				
			</section>
		</body>
		</html>