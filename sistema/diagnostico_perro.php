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
		
		<div class="form_register2">
			<center><h1><i class="fas fa-stethoscope"></i>Test de Diagnostico de Enfermedades</h1></center>
			<hr>
			<form action="" method="post">
				<div>
					<h4 align="justify"> Para realizar este test selecciona los síntomas que tu mascota posee, de no saber o conocer alguno simplemente seleccione la opción de “ninguno de los anteriores y continúe con el siguiente, este diagnóstico se realiza a base de 1 o más síntomas no es recomendable seleccionar 3 ya que las enfermedades almacenadas en este sistema no contienen 3 de estos mismos, de la misma forma si su mascota posee alguna de estas enfermedades que diagnosticara el sistema no garantizamos al 100% que esto sea lo que posee su animal así que recomendamos que si desea visite la clínica veterinaria “Huellita” para tener un diagnostico mas exacto ya que estos solo son generales para emergencias, casos especiales etc. Por su atención gracias, Alebrije le desea buen día, tarde o noche.
					</h4>
					<br>
					<label>Síntomas Comunes</label>
					<select id="s1">
						<option value="1">Pérdida de Apetito y Adelgazamiento</option>
						<option value="2">Fiebre</option>
						<option value="3">Vómito</option>
						<option value="4">Pérdida de Pelo</option>
						<option value="5">Cojera</option>
						<option value="6">Heces Con Sangre</option>
						<option value="7">Tristeza y Apatía</option>
						<option value="8">Hemorragias Nasales</option>
						<option value="9">Rigidez y Limitación en los Movimientos</option>
						<option value="10">Tos</option>
						<option value="0">Ninguno de los Anteriores</option>
					</select>
					<label>Síntomas No Tan Comunes</label>
					<select id="s2">
						<option value="200">Salivación Exagerada</option>
						<option value="100">Diarrea</option>
						<option value="300">Encías Blanquecinas</option>
						<option value="400">Estreñimiento Duradero</option>
						<option value="500">Dolor en el Abdomen</option>
						<option value="600">Tics Nerviosos</option>
						<option value="700">Costras en la Piel o Heridas</option>
						<option value="0">Ninguno de los Anteriores</option>
					</select>
					<label>Síntomas Específicos</label>
					<select id="s3">
						<option value="1000">Crecimiento Anormal de las Uñas</option>
						<option value="2000">Mal Aliento o Halitosis Pronunciada</option>
						<option value="3000">Mocos en Nariz y Ojos</option>
						<option value="4000">Ojos Hundidos</option>
						<option value="5000">Aumento del Ritmo Cardiaco</option>
						<option value="6000">Obstrucción Intestinal</option>
						<option value="7000">Enrojecimiento e Inflamación de la Piel</option>
						<option value="800">Desmayos</option>
						<option value="900">Orina Oscura</option>
						<option value="10000">Dolor Articular</option>
						<option value="0">No Lo Se</option>
					</select>
					<br>
					<input type="button" onclick="sumar()" name="" value="Diagnóstico" class="btn_save">
				</form>

				<dir>
					<h2 align="justify" id="resul"></h2>
					<br>
					<p id="resul2"></p>
					<br>
					<p id="resul3"></p>
					<br>
					<p id="resul4"></p>
				</dir>
			</body>
			<script type="text/javascript">
				function sumar(){
					var s1 = parseFloat(document.getElementById("s1").value);
					var s2 = parseFloat(document.getElementById("s2").value);
					var s3 = parseFloat(document.getElementById("s3").value);

					var re = (s1+s2+s3);

					if (re==1000 || re==1004 || re==4 || re==1002 || re==1005 || re==5 || re==2100 || re==1009 || re==9 || re==280) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Leishmaniosis";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La leishmaniasis o leishmaniosis es una de las enfermedades más graves que puede desarrollar un perro. De hecho, si no se trata a tiempo, puede llegar a producir la muerte en muchos casos. Se transmite a través de la picadura del mosquito Leishmania infantum, que se convierte en portador después de picar a un perro enfermo de leishmaniasis.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>Consiste en antimoniales pentavalentes: metilglucamina y estibogluconato sódico, cesiastes, otros tales como la anfotericina B, la pentamidina y el ketoconazol. Se aplican durante varias semanas por vía oral o inyección. </p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Se recomienda encarecidamente utilizar pipetas, sprays y collares repelentes. También es conveniente instalar mosquiteros en la zona en la que duerman los perros, sobre todo si duermen en el exterior. Además, debes evitar, dentro de lo posible, los paseos nocturnos si resides en la zona mediterránea. Y, sobre todo, aplica a tu mascota una vacuna preventiva para disminuir las posibilidades de contagio.</p>');
					}else if (re==2000 || re==2200 || re==200 || re==2600 || re==600 || re==2700 || re==700) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Epilepsia Idiopática";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La epilepsia es una enfermedad que puede darse tanto en humanos como en perros. Se trata de una disfunción intracraneal que causa ataques tanto generalizados como focales. Los primeros son los más graves, ya que el perro pierde la consciencia y tiene convulsiones por todo el cuerpo. Los segundos, por el contrario, solo afectan a una zona muscular en concreto.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>Existen varias alternativas, y el veterinario será el que se encargue de recomendar un tratamiento adecuado para cada tipo de perro. Es importante tener en cuenta que la epilepsia no tiene cura, por lo que lo único que el dueño puede hacer es controlar al máximo estos ataques.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>No existe una prevención exacta para la Epilepsia Idiopática, ya que, como hemos señalado, no se sabe a ciencia cierta qué es lo que la está provocando. En cualquier caso, se pueden reducir o eliminar los ataques gracias al tratamiento que indique el veterinario.</p>');
					}else if (re==3000 || re==3010 || re==10 || re==3100 || re==3003 || re==3 || re==3007 || re==7 || re==3001 || re==3002 || re==3006 || re==3600) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Moquillo";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> El moquillo (o distemper) es una de las enfermedades más comunes, y a la vez peligrosas, en cachorros. Afecta a las vías respiratorias, sistema digestivo y sistema nervioso. Es muy contagioso y en los cachorros no vacunados puede llegar a ser letal. Esta enfermedad la causa el virus del moquillo, que está relacionado con el sarampión humano.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>En primer lugar, después de llevarlo al veterinario, debes aislar al perro del resto de mascotas. Hay que tener en cuenta que esta enfermedad no tiene cura, pero sí se pueden disminuir casi al completo sus efectos. Dentro del tratamiento que ordenará el veterinario probablemente se incluirán medicamentos expectorantes, fármacos inyectables y orales, suplementos alimenticios y vitaminas B.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>La forma más efectiva de prevenir el moquillo es la vacunación. Si tu perro recibe desde pequeño todas sus vacunas y vas regularmente al veterinario para cumplir con el calendario de vacunación, debería de ser inmune a esta enfermedad.</p>');
					}else if (re==4000 || re==4001 || re==4003 || re==4006 || re==4007 || re==4009 || re==4100) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Parvovirus";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> El parvovirus es provocada por un virus que afecta al sistema digestivo del animal y puede llegar a ser mortal, sobre todo en cachorros de tres meses o menos. La principal causa de la muerte es la deshidratación.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>El tratamiento puede incluir terapia de fluidos con isotónicos, transfusiones de sangre, antibióticos como la penicilina, vitamina B y fármacos antieméticos. También habrá que controlar la dieta del perro, ofreciéndole comida blanda y fácil de digerir como caldos y pollo hervido.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Existe una vacuna contra el parvovirus canino. Esta debe aplicarse cuanto antes mejor y es importante renovarla según establezca el calendario de vacunación. La vacuna reducirá enormemente el riesgo de contagio. Otras medidas que se pueden aplicar son mantener la higiene en el hogar del perro, desparasitarlo, evitar que ingiera heces de otros perros y evitar comprar los cachorros en tiendas, ya que sus instalaciones suelen ser insalubres y el hacinamiento de los animales puede hacer que proliferen los parásitos.</p>');
					}else if (re==5000 || re==5001 || re==5002 || re==5003 || re==5100 || re==100) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Mastitis";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La mastitis canina es una de las enfermedades más comunes en perras lactantes y, en menor medida, en perras no embarazadas. Es una infección de las mamas, causada por la bajada de defensas que sufre la madre después del parto de los cachorros. La bajada de defensas permite que los gérmenes estafilococos se instalen en la leche materna, provocando una infección muy dolorosa en las mamas de la perra.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>El tratamiento consistirá en administrar antibióticos para acabar con dicha infección y también será necesario aplicar compresas de agua caliente directamente en las mamas.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Para evitar que aparezca la mastitis y otras infecciones es importante limpiar las mamas de la perra con gasas húmedas de forma regular. También es buena idea intentar recortar, con cuidado, las uñas de los cachorros, ya que pueden causar heridas a la madre por donde pueden introducirse los gérmenes.</p>');
					}else if (re==6000 || re==6001 || re==6003 || re==6004 || re==6400 || re==6500 || re==400 || re==500) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Parásitos Intestinales";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> Los parásitos intestinales son organismos que se alimentan de otro ser vivo. En los perros los más frecuentes son los gusanos de varios tipos, que se instalan en los órganos internos. Lo más normal es que residan en el intestino, pero también pueden llegar a los pulmones e incluso al corazón. Los perros pueden contagiarse de estos parásitos de diversas formas: lamiendo y olfateando el suelo, a través de picaduras de mosquito, durante el embarazo a través de la placenta o la lactación y comiéndose a otro ser vivo portador del parásito (como una pulga).</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>El tratamiento consiste en la aplicación de antiparasitarios intestinales, siempre bajo supervisión del veterinario. Nunca suministres laxante u otros medicamentos digestivos a una mascota con parásitos, ya que lo único que conseguirás será destruir su flora bacteriana.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>La mejor previsión es desparasitar al perro cada tres meses, manteniéndolo protegido durante todo el año. Desde su primera revisión como cachorro se le debe realizar una desparasitación interna y externa, para asegurar su salud desde los primeros meses de vida.</p>');
					}else if (re==7000 || re==7001 || re==7004 || re==7300 || re==300 || re==7700) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Sarna";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La sarna es una enfermedad de la piel causada por varios tipos de ácaros. Generalmente se contagia de forma directa a partir de otro animal infectado. Existen varios tipos de sarna, pero independientemente de esto lo más importante es que acudas cuanto antes al veterinario para tratar sus síntomas a tiempo.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>Hay diferentes tipos de sarna y cada una se tratará de una manera, pero el tratamiento suele incluir medicamentos orales, tópicos y/o inyectables con selamectina, moxidectina, ivermectina y milbemicina oxima.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Para prevenir la sarna lo más importante es la higiene del animal y de su entorno. Lo ideal será bañarlo una vez al mes con un champú adecuado. Además, debes intentar que la zona donde vive esté limpia. También es importante que se cumpla su calendario de vacunación. Y, por supuesto, hay que evitar el contacto de nuestro perro con animales que puedan estar infectados de sarna.</p>');
					}else if (re==800 || re==801 || re==807 || re==808 || re==8 || re==810) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Dirofilariasis o Gusano del Corazón";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La Dilofilariasis canina o enfermedad del gusano del corazón es una enfermedad producida por un parásito llamado Dirofilaria immitis. Pasa de un huésped a otro a través de picaduras de mosquito. En el último estado de su ciclo de vida, este parásito reside en el corazón del huésped. Puede quedarse allí varios años, pero al final el huésped muere por un paro cardíaco. Es una enfermedad potencialmente mortal para aquellos perros infectados que no son tratados. De hecho, existe riesgo incluso para aquellos que sí que reciben tratamiento.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>El tratamiento suele durar varios meses. Normalmente lo primero es aplicar inyecciones para eliminar los gusanos adultos. Una vez ha funcionado, se le administra al perro una medicación para expulsar a las microfilarias y las larvas. Finalmente es necesario proporcionarle vitaminas y una alimentación que le ayuden a recuperar la salud.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Existen varios tratamientos preventivos, uno de ellos es la vacuna, que se aplica una vez al año, en la época de mayor actividad de los mosquitos. Antes de suministrarla es necesario realizar un estudio al perro para comprobar que no está enfermo. Si se le vacuna portando el gusano se le puede provocar una reacción anafiláctica y/o muerte en masa de los parásitos. Esto, a su vez, podría ocasionar graves problemas al animal, incluso su muerte.<br>La prevención se puede llevar también a cabo a partir de pastillas o comprimidos. Es necesario que el perro las tome una vez al mes vía oral. También existen pipetas que contienen el antiparasitario concreto para esta enfermedad.</p>');
					}else if (re==900 || re==901 || re==902 || re==903 || re==904 || re==1200 || re==1300 || re==300 || re==400) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Leptospirosis Canina o Tifus del Perro";
						document.getElementById("resul2").innerHTML= ('<p align="justify"> La leptospirosis canina es una enfermedad bacteriana causada por la bacteria leptosira que afecta principalmente a los perros. Es especialmente peligrosa porque es una zoonosis: esto quiere decir que puede contagiarse a las personas. Se contagia cuando una mucosa o una herida en la piel entra en contacto con agua contaminada por la orina de un animal infectado. Es importante detectarla a tiempo porque puede llegar a provocar la muerte. </p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>Al ser una enfermedad bacteriana, la leptospirosis puede ser tratada con antibióticos. También es necesario mantener al perro hidratado y controlar sus síntomas.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>El principal modo de prevenir esta enfermedad es la vacunación. Contacta el veterinario de "Huellita" para que te recomiende el mejor sistema para mantener sana a tu mascota. También es muy importante mantener limpio y desinfectado el entorno en el que se mueve habitualmente el animal.</p>');
					}else if (re==10000 || re==10005 || re==10007 || re==10009 || re==10600 || re==10700) {
						document.getElementById("resul").innerHTML = "La Enfermedad Podría Ser: Artritis o Artrosis";
						document.getElementById("resul2").innerHTML= ('<p align="justify">Tanto la artritis como la artrosis son enfermedades relacionadas con las articulaciones. Afectan sobre todo a perros ancianos. <br>En el caso de la artritis hablamos de una inflamación de las articulaciones, mientras que la artrosis tiene que ver con su envejecimiento y desgaste. En ambos casos el cartílago que las recubre va desapareciendo. Esto se traduce en un intenso dolor.<br>La artritis puede tener varias causas: una infección, un golpe, causas genéticas o la propia vejez. En este último caso se conoce a esta enfermedad como artritis degenerativa. En el caso de la artrosis es, como hemos dicho, un problema debido al envejecimiento y es crónico. </p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify"><b>Tratamiento: </b>La artritis es una enfermedad muy difícil de curar, pero sí que existen tratamientos para mejorar la calidad de vida de tu mascota. A continuación, te ofrecemos algunas de las soluciones más habituales: <br><ul><li><b>Fármacos: </b>Antibióticos, antiinflamatorios y analgésicos.</li><li><b>Suplementos Alimenticios: </b>Sulfato de condroitina, antioxidantes o ácidos grasos, como el Omega 3. Su función es proteger el cartílago y evitar que se deteriore más, y ayudar a su regeneración.</li><li><b>Cirugía: </b>En algunos casos el veterinario puede considerar que una operación es una buena solución para mejorar la situación de tu perro.</li></ul><br>Además, puedes combinar este tratamiento ofreciéndole a tu mascota una dieta equilibrada para evitar que engorde. También puedes ayudarle con algo de ejercicio moderado.<br>En el caso de la artrosis, además de los suplementos nutricionales que pueda indicarte tu veterinario, puedes aliviar el dolor de tu mascota con varias técnicas. Puedes aportar calor a las zonas con dolor utilizando bolsas de agua caliente o algo parecido. También puedes ayudar masajeando esas zonas con cuidado.</p>');
						document.getElementById("resul4").innerHTML= ('<p align="justify"><b>Prevención: </b>Es importante controlar el peso del animal y evitar en la medida de lo posible el sobrepeso. Además, es importante que haga ejercicio de forma moderada y evitar que se desgaste jugando con demasiada intensidad. También puedes ofrecerles complementos alimenticios, como el Omega 3.</p>');
					}else {
						document.getElementById("resul").innerHTML = "Los Síntomas Seleccionados No Corresponden A Ninguna Enfermedad Almacenada En Este Sistema ";
						document.getElementById("resul2").innerHTML= ('<p align="justify">La enfermedad no se encontró favor de llevar a tu mascota al veterinario o realizar una consulta en línea lo cual estará disponible próximamente.</p>');
						document.getElementById("resul3").innerHTML= ('<p align="justify">Esto se debe a que las enfermedades almacenadas en este sistema refieren a las mas comunes en este tipo de mascotas para brindar un diagnostico lo mas preciso en base a estas enfermedades, próximamente se agregaran más enfermedades, así como más síntomas para así ser aun mas precisos con los resultados, gracias.</p>')
					}
				}
			</script>
		</div></form></section></div></section></body>
		</html>
