<?php 
session_start();
if($_SESSION['rol'] != 1)
{
    header("location: ./");
}

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['id']) || empty($_POST['nombre']) ||empty($_POST['reaccion']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $idalergia = $_POST['idalergia'];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $reaccion = $_POST['reaccion'];

        $query = mysqli_query($conection,"SELECT * FROM AlergiasMascota WHERE Alergia = '$nombre' AND IDMascota = '$id'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">La Alergia Ha Sido Registrada Anteriormente A Este Paciente.</p>';
        }else{


            

            if(empty($_POST['recomendacion']))
            {

               $sql_update = mysqli_query($conection,"UPDATE VacunasMascota
                SET IDMascota = '$id', NombreVacuna = '$nombre', Aplicacion ='$aplica', Revacunacion ='$fecha'
                WHERE IDVacuna = $idVacuna");
           }else{
               $sql_update = mysqli_query($conection,"UPDATE VacunasMascota
                SET IDMascota = '$id', NombreVacuna = '$nombre', Aplicacion ='$aplica', Revacunacion ='$fecha', Recomendaciones ='$recomendacion'
                WHERE IDVacuna = $idVacuna");

           }

           if($sql_update){
               $alert='<p class="msg_save">Información Actualizada Correctamente.</p>';
           }else{
               $alert='<p class="msg_error">Error Al Actualizar Información.</p>';
           }

       }


   }
}

	//Mostrar Datos
if(empty($_GET['id']))
{
  header('Location: lista_vacunas.php');
  mysqli_close($conection);
}
$idVac = $_GET['id'];

$sql= mysqli_query($conection,"SELECT IDVacuna, IDMascota, NombreVacuna, Aplicacion, Revacunacion, Recomendaciones FROM VacunasMascota");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
  header('Location: lista_vacunas.php');
}else{
  $option = '';
  while ($data = mysqli_fetch_array($sql)) {
			# code...
    $idVac  = $data['IDVacuna'];
    $id  = $data['IDMascota'];
    $nombre = $data['NombreVacuna'];
    $aplica = $data['Aplicacion'];
    $fecha = $data['Revacunacion'];
    $recomendacion  = $data['Recomendaciones'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
  <title>Actulización de Información</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1>Actulización de Información</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <input type="hidden" name="idalergia" value="<?php echo $idalergia; ?>">
                <label for="nombre">ID del Paciente</label>
                <input type="text" name="id" id="id" placeholder="ID">
                <label for="nombre">Nombre de la Alergia</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <label for="nombre">Reacción Ante la Alergia</label>
                <input type="text" name="reaccion" id="reaccion" placeholder="Reacción">
                <input type="submit" value="Actualizar" class="btn_save">

            </form>


        </div>


    </section>
</body>
</html>