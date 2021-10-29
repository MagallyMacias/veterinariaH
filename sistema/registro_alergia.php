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

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $reaccion = $_POST['reaccion'];

        $query = mysqli_query($conection,"SELECT * FROM AlergiasMascota WHERE Alergia = '$nombre' AND IDMascota = '$id'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">La Alergia Ha Sido Registrada Anteriormente A Este Paciente.</p>';
        }else{

            
            $query_insert = mysqli_query($conection,"INSERT INTO AlergiasMascota (IDMascota, Alergia, Reaccion) VALUES('$id', '$nombre', '$reaccion')");
            if($query_insert){
                $alert='<p class="msg_save">Alergia Anexada Correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error Al Registrar Alergia.</p>';
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
    <title>Registro de Alergia</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Alergias</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">ID del Paciente</label>
                    <input type="text" name="id" id="id" placeholder="ID">
                    <label for="nombre">Nombre de la Alergia</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <label for="nombre">Reacción Ante la Alergia</label>
                    <input type="text" name="reaccion" id="reaccion" placeholder="Reacción">
                </center><br>
                <input type="submit" value="Agregar Vacuna" class="btn_save">

            </form>


        </div>


    </section>
</body>
</html>