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
	<title>Lista de Tratamientos</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1><i class="fas fa-plus-square"></i>Lista de Tratamientos</h1>
		<a href="registro_tratamiento.php" class="btn_new">Agregar Tratamiento</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Dueño</th>
					<th>Paciente</th>
					<th>Enfermedad</th>
					<th>Comprimidos</th>
					<th>Suero</th>
					<th>Inyectable</th>
					<th>Internado</th>
					
				</tr></center>
				<?php 
				
				$query = mysqli_query($conection,"SELECT t.IDTratamiento, u.Nombre, m.NombreMascota, e.NombreEnfermedad, t.Comprimidos, t.Suero, t.Inyectable, t.Internacion FROM Tratamiento t INNER JOIN Mascota m ON t.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario INNER JOIN EnfermedadesMascotas e ON t.IDEnfermedad = e.IDEnfermedad");

				$result = mysqli_num_rows($query);
				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
						
						?>
						<center><tr>
							<td><?php echo $data["IDTratamiento"]; ?></td>
							<td><?php echo $data["Nombre"]; ?></td>
							<td><?php echo $data["NombreMascota"]; ?></td>
							<td><?php echo $data["NombreEnfermedad"]; ?></td>
							<td><?php echo $data["Comprimidos"]; ?></td>
							<td><?php echo $data["Suero"]; ?></td>
							<td><?php echo $data['Inyectable'] ?></td>
							<td><?php echo $data['Internacion'] ?></td>
							
						</tr></center>
						
						<?php 
					}

				}
				?>


			</table>
			
		</section>
	</body>
	</html>