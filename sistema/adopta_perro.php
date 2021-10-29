<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Test Para Adoptar Tu Mascota Ideal</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register1">
			<center><h1><i class="fas fa-paw"></i><i class="fas fa-home"></i>Test Para Adoptar Tu Mascota Ideal</h1></center>
			<hr>
			<form action="" method="post">
				<div>
					<label>Tamaño de Tu Vivienda</label>
					<select id="p1">
						<option value="1">Chica</option>
						<option value="2">Mediana</option>
						<option value="3">Grande</option>
					</select>
					<label>Tiempo Disponible Para La Mascota</label>
					<select id="p2">
						<option value="2">Poco</option>
						<option value="4">Considerable</option>
						<option value="6">Mucho</option>
					</select>
					<label>Personas Con Las Que Convivirá La Mascota</label>
					<select id="p3">
						<option value="3">Adultos</option>
						<option value="6">Niños</option>
						<option value="9">Ambos</option>
					</select>
					<label>Ingreso Económico Para La Mascota</label>
					<select id="p4">
						<option value="4">Poco</option>
						<option value="8">Considerable</option>
						<option value="12">Mucho</option>
					</select>
					<label>Animales Con Los Que Convivirá La Mascota</label>
					<select id="p5">
						<option value="5">Perro</option>
						<option value="10">Gato</option>
						<option value="15">Otro</option>
						<option value="0">Ninguno</option>
					</select>
					<label>Motivo De Querer A La Mascota</label>
					<select id="p6">
						<option value="6">Compañia</option>
						<option value="12">Necesidad</option>
						<option value="18">Otro</option>
					</select>
					<label>¿Alergia a los Animales?</label>
					<select id="p7">
						<option value="7">Si</option>
						<option value="14">No</option>
						<option value="21">No Lo Se</option>
					</select>
					<label>Nivel de Paciencia Para Educar a la Mascota</label>
					<select id="p8">
						<option value="8">Poca</option>
						<option value="16">Suficiente</option>
						<option value="24">Mucha</option>
					</select>
					<label>¿Dispuesto a Hacer Cambios en Casa Por La Mascota? (P/E Cambiar Cosas de Lugar)</label>
					<select id="p9">
						<option value="9">Si</option>
						<option value="18">No</option>
						<option value="27">No Lo Se</option>
					</select>
					<label>¿Toma En Cuenta el Ruido de la Mascota?</label>
					<select id="p10">
						<option value="10">Si</option>
						<option value="20">No</option>
					</select>
					<br>
					<input type="button" onclick="sumar()" name="" value="Mascota Ideal Para Adoptar" class="btn_save">
				</form>

				<dir>
					<center><h2 id="resul"></h2>
						<br>
						<h3 id="resul2"></h3></center>
					</dir>
				</body>
				<script type="text/javascript">
					function sumar(){
						var p1 = parseFloat(document.getElementById("p1").value);
						var p2 = parseFloat(document.getElementById("p2").value);
						var p3 = parseFloat(document.getElementById("p3").value);
						var p4 = parseFloat(document.getElementById("p4").value);
						var p5 = parseFloat(document.getElementById("p5").value);
						var p6 = parseFloat(document.getElementById("p6").value);
						var p7 = parseFloat(document.getElementById("p7").value);
						var p8 = parseFloat(document.getElementById("p8").value);
						var p9 = parseFloat(document.getElementById("p9").value);
						var p10 = parseFloat(document.getElementById("p10").value);

						var re = (p1+p2+p3+p4+p5+p6+p7+p8+p9+p10);

						if (re==55) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/1.jpg" width="511.5" height="307" />');
						}else if (re==110) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/2.jpg" width="511.5" height="307" />');
						}else if (re==145) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/3.jpg" width="511.5" height="307" />');
						}else if (re==155) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/4.jpg" width="511.5" height="307" />');
						}else if (re==56) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/5.jpg" width="511.5" height="307" />');
						}else if (re==57) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/6.jpg" width="511.5" height="307" />');
						}else if (re==109) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/7.jpg" width="511.5" height="307" />');
						}else if (re==111) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/8.jpg" width="511.5" height="307" />');
						}else if (re==59) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/9.jpg" width="511.5" height="307" />');
						}else if (re==58) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/10.jpg" width="511.5" height="307" />');
						}else if (re==61) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/11.jpg" width="511.5" height="307" />');
						}else if (re==63) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/12.jpg" width="511.5" height="307" />');
						}else if (re==60) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/13.jpg" width="511.5" height="307" />');
						}else if (re==65) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/14.jpg" width="511.5" height="307" />');
						}else if (re==50) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/15.jpg" width="511.5" height="307" />');
						}else if (re==67) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/16.jpg" width="511.5" height="307" />');
						}else if (re==62) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/17.jpg" width="511.5" height="307" />');
						}else if (re==69) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/18.jpg" width="511.5" height="307" />');
						}else if (re==71) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/19.jpg" width="511.5" height="307" />');
						}else if (re==64) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/20.jpg" width="511.5" height="307" />');
						}else if (re==73) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/21.jpg" width="511.5" height="307" />');
						}else if (re==75) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/22.jpg" width="511.5" height="307" />');
						}else if (re==107) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/23.jpg" width="511.5" height="307" />');
						}else if (re==106) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/24.jpg" width="511.5" height="307" />');
						}else if (re==114) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/25.jpg" width="511.5" height="307" />');
						}else if (re==105) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/10.jpg" width="511.5" height="307" />');
						}else if (re==115) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/9.jpg" width="511.5" height="307" />');
						}else if (re==100) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/8.jpg" width="511.5" height="307" />');
						}else if (re==104) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/7.jpg" width="511.5" height="307" />');
						}else if (re==116) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/6.jpg" width="511.5" height="307" />');
						}else if (re==103) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/5.jpg" width="511.5" height="307" />');
						}else if (re==117) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/4.jpg" width="511.5" height="307" />');
						}else if (re==102) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/3.jpg" width="511.5" height="307" />');
						}else if (re==118) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/2.jpg" width="511.5" height="307" />');
						}else if (re==101) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/1.jpg" width="511.5" height="307" />');
						}else if (re==119) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/20.jpg" width="511.5" height="307" />');
						}else if (re==143) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/19.jpg" width="511.5" height="307" />');
						}else if (re==153) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/18.jpg" width="511.5" height="307" />');
						}else if (re==144) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/17.jpg" width="511.5" height="307" />');
						}else if (re==154) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/16.jpg" width="511.5" height="307" />');
						}else if (re==141) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/15.jpg" width="511.5" height="307" />');
						}else if (re==151) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/14.jpg" width="511.5" height="307" />');
						}else if (re==142) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/13.jpg" width="511.5" height="307" />');
						}else if (re==152) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/12.jpg" width="511.5" height="307" />');
						}else if (re==139) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/11.jpg" width="511.5" height="307" />');
						}else if (re==137) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/25.jpg" width="511.5" height="307" />');
						}else if (re==147) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/24.jpg" width="511.5" height="307" />');
						}else if (re==135) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/23.jpg" width="511.5" height="307" />');
						}else if (re==140) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/22.jpg" width="511.5" height="307" />');
						}else if (re==150) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/21.jpg" width="511.5" height="307" />');
						}else if (re==130) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/5.jpg" width="511.5" height="307" />');
						}else if (re==133) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/10.jpg" width="511.5" height="307" />');
						}else if (re==149) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/15.jpg" width="511.5" height="307" />');
						}else if (re==138) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/2.jpg" width="511.5" height="307" />');
						}else if (re==148) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/4.jpg" width="511.5" height="307" />');
						}else if (re==129) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/6.jpg" width="511.5" height="307" />');
						}else if (re==136) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/8.jpg" width="511.5" height="307" />');
						}else if (re==146) {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/12.jpg" width="511.5" height="307" />');
						}else {
							document.getElementById("resul").innerHTML = "Tu Mascota Ideal Es: ";
							document.getElementById("resul2").innerHTML=('<img id="resul2" src="img/Adopcion/X.jpg" width="511.5" height="307" />');
						}
					}
				</script>
			</div></form></section></div></section></body>
			</html>
