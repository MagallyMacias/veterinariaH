<?php 

if(empty($_SESSION['active']))
{
	header('location: ../');
}
?>
<header>
	<div class="header">
		
		<div class="optionsBar">
			<p>San Martin Texmelucan, <?php echo fechaC(); ?></p>
			<span>|</span>
			<h3>Clinica Veterinaria Huellita</h3>
			<span>|</span>
			<h3>Bienvenido a Alebrije Usuario: </h3>
			<span class="user"><b><?php echo $_SESSION['nombre'].' - '.$_SESSION['rol']; ?></b></span>
			<img class="photouser" src="img/user.png" alt="Usuario">
			<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del Sistema" title="Salir"></a>
		</div>
	</div>
	<?php include "nav.php"; ?>
</header>