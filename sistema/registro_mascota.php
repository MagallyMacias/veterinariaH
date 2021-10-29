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
    if(empty($_POST['nombre']) || empty($_POST['idusuario']) || empty($_POST['raza']) || empty($_POST['sexo']) || empty($_POST['edad']) || empty($_POST['tamano']) || empty($_POST['peso']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $nombre = $_POST['nombre'];
        $idusuario = $_POST['idusuario'];
        $raza = $_POST['raza'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $tamano  = $_POST['tamano'];
        $peso = $_POST['peso'];

        $query = mysqli_query($conection,"SELECT * FROM Mascota WHERE IDUsuario  = '$idusuario' AND NombreMascota = '$nombre'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">La Mascota Ya Se Ha Registrado Anteriormente.</p>';
        }else{

           $query_insert = mysqli_query($conection,"INSERT INTO Mascota (NombreMascota, IDUsuario, RazaMascota, SexoMascota, EdadMascota, TamanoMascota, PesoMascota) VALUES('$nombre', '$idusuario', '$raza', '$sexo', '$edad', '$tamano', '$peso')");
           if($query_insert){
            $alert='<p class="msg_save">Mascota Registrada Correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error Al Registrar La Mascota.</p>';
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
    <title>Registro Usuario</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Mascota</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">Nombre de la Mascota </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <label for="idusuario">ID del Dueño</label>
                    <input type="text" name="idusuario" id="idusuario" placeholder="ID">
                    <label for="nombre">Raza</label>
                    <input type="text" name="raza" id="raza" placeholder="Raza">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                    <label for="nombre">Edad (Solo Cifra)</label>
                    <input type="text" name="edad" id="edad" placeholder="Edad">
                    <label for="tamano">Tamaño (Solo Cifra cm)</label>
                    <input type="text" name="tamano" id="tamano" placeholder="Tamaño">
                    <label for="peso">Peso (Solo Cifra kg)</label>
                    <input type="text" name="peso" id="peso" placeholder="Peso">
                    <br>
                    <input type="submit" value="Registrar Mascota" class="btn_save">

                </form>
            </center>

        </div>


    </section>
</body>
</html>