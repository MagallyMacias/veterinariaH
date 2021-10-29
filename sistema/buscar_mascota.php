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
	<title>Lista de Usuarios</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

		$busqueda = strtolower($_REQUEST['busqueda']);
		if(empty($busqueda))
		{
			header("location: lista_mascotas.php");
			mysqli_close($conection);
		}


		?>
		
		<h1>Lista de Mascotas</h1>
		<a href="registro_mascota.php" class="btn_new">Agregar Mascota</a>
		
		<form action="buscar_mascota.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<center><tr>
				<th>ID</th>
				<th>Dueño</th>
				<th>Nombre</th>
				<th>Raza</th>
				<th>Sexo</th>
				<th>Edad</th>
				<th>Tamaño</th>
				<th>Peso</th>
				<th>Acciones</th>
			</tr></center>
			<?php 


			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as prueba FROM Mascota 
				WHERE IDMascota LIKE '%$busqueda%' OR  
				NombreMascota LIKE '%$busqueda%' OR
				IDUsuario LIKE '%$busqueda%' OR 
				RazaMascota LIKE '%$busqueda%' OR 
				SexoMascota LIKE '%$busqueda%' OR 
				EdadMascota LIKE '%$busqueda%' OR
				TamanoMascota LIKE '%$busqueda%' OR
				PesoMascota LIKE '%$busqueda%'");

			$result_register = mysqli_fetch_array($sql_registe);

			$query = mysqli_query($conection,"SELECT m.IDMascota, m.NombreMascota, u.Nombre, m.RazaMascota, m.SexoMascota, m.EdadMascota, m.TamanoMascota, m.PesoMascota FROM Mascota m INNER JOIN Usuario u ON m.IDUsuario = u.IDUsuario 
				WHERE 
				(  m.IDMascota LIKE '%$busqueda%' OR 
				m.NombreMascota LIKE '%$busqueda%' OR
				u.Nombre LIKE '%$busqueda%' OR 
				m.RazaMascota LIKE '%$busqueda%' OR
				m.SexoMascota LIKE '%$busqueda%' OR 
				m.EdadMascota LIKE '%$busqueda%' OR 
				m.TamanoMascota LIKE '%$busqueda%' OR 
				m.PesoMascota LIKE '%$busqueda%' )");
			mysqli_close($conection);
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
						<td>
							<a class="link_edit" href="editar_mascota.php?id=<?php echo $data["IDMascota"]; ?>">Editar</a>

							<?php if($data["IDMascota"] != 0){ ?>
								|
								<a class="link_delete" href="eliminar_confirmar_mascota.php?id=<?php echo $data["IDMascota"]; ?>">Eliminar</a>
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