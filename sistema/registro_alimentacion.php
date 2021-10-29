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
    if(empty($_POST['id']) || empty($_POST['alimento']) || empty($_POST['cantidad']) || empty($_POST['alino']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $id = $_POST['id'];
        $alimento = $_POST['alimento'];
        $cantidad = $_POST['cantidad'];
        $alino = $_POST['alino'];

        $query = mysqli_query($conection,"SELECT * FROM AlimentacionMascota WHERE IDMascota  = '$id' AND AlimentoRecomendado = '$alimento'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">La Alimentación Ya Se Ha Registrado Anteriormente.</p>';
        }else{

           $query_insert = mysqli_query($conection,"INSERT INTO AlimentacionMascota (IDMascota, AlimentoRecomendado, Cantidad, AlimentosNoRecomendados) VALUES('$id', '$alimento', '$cantidad', '$alino')");
           if($query_insert){
            $alert='<p class="msg_save">Alimentación Registrada Correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error Al Registrar Alimentación.</p>';
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
    <title>Registro de Alimentación</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Alimentación</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">ID de la Mascota</label>
                    <input type="text" name="id" id="id" placeholder="ID">
                    <label for="alimento">Alimento Recomendado</label>
                    <input type="text" name="alimento" id="alimento" placeholder="Alimento">
                    <label for="nombre">Cantidad (Por Dia) [Solo Cifra kg]</label>
                    <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
                    <label for="peso">Alimento No Recomendado</label>
                    <input type="text" name="alino" id="alino" placeholder="Alimento">
                </center> <br>
                <input type="submit" value="Agregar Alimentación" class="btn_save">

            </form>


        </div>


    </section>
</body>
</html>