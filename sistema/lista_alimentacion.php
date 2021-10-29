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
	<title>i class="fas fa-bone"></i>Lista de Alimentación</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1>Lista de Alimentación</h1>
		<a href="registro_alimentacion.php" class="btn_new">Agregar Alimentación</a>
		
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
					<th>Alimento Recomendado</th>
					<th>Cantidad</th>
					<th>No Recomendado</th>
					
				</tr></center>
				<?php 
				
				$query = mysqli_query($conection,"SELECT b.IDAlimento,  m.NombreMascota, u.Nombre, b.AlimentoRecomendado, b.Cantidad, b.AlimentosNoRecomendados FROM AlimentacionMascota b INNER JOIN Mascota m ON b.IDMascota = m.IDMascota INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario");

				$result = mysqli_num_rows($query);
				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
						
						?>
						<center><tr>
							<td><?php echo $data["IDAlimento"]; ?></td>
							<td><?php echo $data["NombreMascota"]; ?></td>
							<td><?php echo $data["Nombre"]; ?></td>
							<td><?php echo $data["AlimentoRecomendado"]; ?></td>
							<td><?php echo $data["Cantidad"]; ?></td>
							<td><?php echo $data["AlimentosNoRecomendados"]; ?></td>
						</tr></center>
						
						<?php 
					}

				}
				?>


			</table>
			
		</section>
	</body>
	</html>