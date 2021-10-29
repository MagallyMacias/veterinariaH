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
			header("location: lista_usuarios.php");
			mysqli_close($conection);
		}


		?>
		
		<h1>Lista de Usuarios</h1>
		<a href="registro_usuario.php" class="btn_new">Crear Usuario</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Edad</th>
				<th>Correo</th>
				<th>Rol</th>
				<th>Acciones</th>
			</tr>
			<?php 


			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as prueba FROM Usuario 
				WHERE IDUsuario LIKE '%$busqueda%' OR 
				Nombre LIKE '%$busqueda%' OR 
				ApellidoPaterno LIKE '%$busqueda%' OR 
				ApellidoMaterno LIKE '%$busqueda%' OR 
				Edad LIKE '%$busqueda%' OR
				CorreoUsuario LIKE '%$busqueda%' OR
				rol LIKE '%$busqueda%'");

			$result_register = mysqli_fetch_array($sql_registe);

			$query = mysqli_query($conection,"SELECT u.IDUsuario, u.Nombre, u.ApellidoPaterno, u.ApellidoMaterno, u.Edad, u.CorreoUsuario, r.rol FROM Usuario u INNER JOIN Tipo r ON u.rol = r.IDTipo 
				WHERE 
				( u.IDUsuario LIKE '%$busqueda%' OR 
				u.Nombre LIKE '%$busqueda%' OR 
				u.ApellidoPaterno LIKE '%$busqueda%' OR
				u.ApellidoMaterno LIKE '%$busqueda%' OR 
				u.Edad LIKE '%$busqueda%' OR 
				u.CorreoUsuario LIKE '%$busqueda%' OR 
				r.rol    LIKE  '%$busqueda%' )");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
					?>
					<center><tr>
						<td><?php echo $data["IDUsuario"]; ?></td>
						<td><?php echo $data["Nombre"]; ?></td>
						<td><?php echo $data["ApellidoPaterno"]; ?></td>
						<td><?php echo $data["ApellidoMaterno"]; ?></td>
						<td><?php echo $data["Edad"]; ?></td>
						<td><?php echo $data["CorreoUsuario"]; ?></td>
						<td><?php echo $data['rol'] ?></td>
						<td>
							<a class="link_edit" href="editar_usuario.php?id=<?php echo $data["IDUsuario"]; ?>">Editar</a>

							<?php if($data["IDUsuario"] != 0){ ?>
								|
								<a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["IDUsuario"]; ?>">Eliminar</a>
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