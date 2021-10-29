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
    if(empty($_POST['nombre']) || empty($_POST['enfermedad']) || empty($_POST['sintoma']) ||empty($_POST['id']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $nombre = $_POST['nombre'];
        $enfermedad = $_POST['enfermedad'];
        $sintoma = $_POST['sintoma'];
        $id = $_POST['id'];

        $query = mysqli_query($conection,"SELECT * FROM EnfermedadesMascotas WHERE NombreEnfermedad = '$nombre' AND IDMascota = 'id'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">La Enfermedad Ha Sido Registrada Anteriormente a Este Paciente.</p>';
        }else{

           $query_insert = mysqli_query($conection,"INSERT INTO EnfermedadesMascotas (NombreEnfermedad, SintomaEnfermedad, TipoEnfermedad, IDMascota) VALUES('$nombre', '$sintoma', '$enfermedad', '$id')");
           if($query_insert){
            $alert='<p class="msg_save">Enfermedad Anexada Correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error Al Registrar Enfermedad.</p>';
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
    <title>Registro de Enfermedad</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Enfermedad</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">Nombre de la Enfermedad</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <label for="nombre">Sintomas</label>
                    <input type="text" name="sintoma" id="sintoma" placeholder="Sintomas">
                    <label for="enfermedad">Tipo de Enfermedad</label>
                    <select name="enfermedad" id="enfermedad">
                        <option value="Tratable">Tratable</option>
                        <option value="Grave">Grave</option>
                    </select>
                    <label for="nombre">ID de la Mascota</label>
                    <input type="text" name="id" id="id" placeholder="ID">
                    <br>
                    
                    <input type="submit" value="Agregar Enfermedad" class="btn_save">
                </center>
            </form>


        </div>


    </section>
</body>
</html>