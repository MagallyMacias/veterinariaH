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
	<title>Lista de Mascotas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1><i class="fas fa-paw"></i>Lista de Mascotas</h1>
		<a href="registro_mascota.php" class="btn_new">Registrar Mascota</a>
		
		<form action="buscar_mascota.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Dueño</th>
					<th>Nombre</th>
					<th>Raza</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Tamaño</th>
					<th>Peso</th>
					<th>Acciones</th>
					
				</tr>
				<?php 
				
				$query = mysqli_query($conection,"SELECT m.IDMascota, u.Nombre, m.NombreMascota, m.RazaMascota, m.SexoMascota, m.EdadMascota, m.TamanoMascota, m.PesoMascota FROM Mascota m INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario");

				$result = mysqli_num_rows($query);
				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
						
						?>
						<center><tr>
							<td><?php echo $data["IDMascota"]; ?></td>
							<td><?php echo $data["Nombre"]; ?></td>
							<td><?php echo $data["NombreMascota"]; ?></td>
							<td><?php echo $data["RazaMascota"]; ?></td>
							<td><?php echo $data["SexoMascota"]; ?></td>
							<td><?php echo $data["EdadMascota"]; ?></td>
							<td><?php echo $data["TamanoMascota"]; ?></td>
							<td><?php echo $data['PesoMascota'] ?></td></center>
							<td></center>
								<a class="link_edit" href="editar_mascota.php?id=<?php echo $data["IDMascota"]; ?>"><i class="fas fa-edit"></i>Editar</a>

								<?php if($data["IDMascota"] != 0){ ?>
									|
									<a class="link_delete" href="eliminar_confirmar_mascota.php?id=<?php echo $data["IDMascota"]; ?>"><i class="fas fa-trash-alt"></i>Eliminar</a>
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