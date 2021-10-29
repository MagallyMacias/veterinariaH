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
    if(empty($_POST['id']) || empty($_POST['nombre']) ||empty($_POST['aplica']) ||empty($_POST['fecha']) || empty($_POST['recomendacion']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $aplica = $_POST['aplica'];
        $fecha = $_POST['fecha'];
        $recomendacion = $_POST['recomendacion'];

        $query = mysqli_query($conection,"SELECT * FROM VacunasMascota WHERE NombreVacuna = '$nombre' AND IDMascota = '$id'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_errorIDMascota =">La Vacuna Ha Sido Registrada Anteriormente A Este Paciente.</p>';
        }else{

            
            $query_insert = mysqli_query($conection,"INSERT INTO VacunasMascota (IDMascota, NombreVacuna, Aplicacion, Revacunacion, Recomendaciones) VALUES('$id', '$nombre', '$aplica','$fecha', '$recomendacion')");
            if($query_insert){
                $alert='<p class="msg_save">Vacuna Anexada Correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error Al Registrar Vacuna.</p>';
            }

        }


    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
    <title>Registro de Vacuna</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Vacuna</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">ID del Paciente</label>
                    <input type="text" name="id" id="id" placeholder="ID">
                    <label for="nombre">Nombre de la Vacuna</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <label for="enfermedad">Fecha de Aplicación</label>
                    <input id="date" type="date" name="aplica" id="aplica" value="2019-05-01">
                    <label for="enfermedad">Fecha de Revacunacion</label>
                    <input id="date" type="date" name="fecha" id="fecha" value="2020-05-01">
                    <label for="nombre">Recomendaciones</label>
                    <input type="text" name="recomendacion" id="recomendacion" placeholder="Recomendaciones">
                </center><br>
                <input type="submit" value="Agregar Vacuna" class="btn_save">

            </form>


        </div>


    </section>
</body>
</html>