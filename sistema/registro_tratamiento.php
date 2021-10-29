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
    if(empty($_POST['idmas']) || empty($_POST['idenfe']) || empty($_POST['comprimidos']) || empty($_POST['suero']) || empty($_POST['inyectable']) || empty($_POST['internacion']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $idmas = $_POST['idmas'];
        $idenfe = $_POST['idenfe'];
        $comprimidos = $_POST['comprimidos'];
        $suero = $_POST['suero'];
        $inyectable = $_POST['inyectable'];
        $internacion = $_POST['internacion'];

        $query = mysqli_query($conection,"SELECT * FROM Tratamiento WHERE IDMascota  = '$idmas' AND IDEnfermedad = '$idenfe'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El Tratamiento Ya Se Ha Registrado Anteriormente.</p>';
        }else{

           $query_insert = mysqli_query($conection,"INSERT INTO Tratamiento (IDMascota, IDEnfermedad, Comprimidos, Suero, Inyectable, Cuidado, Internacion) VALUES('$idmas', '$idenfe', '$comprimidos', '$suero', '$inyectable', '$internacion')");
           if($query_insert){
            $alert='<p class="msg_save">Tratamiento Registrado Correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error Al Registrar El Tratamiento.</p>';
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
    <title>Registro de Tratamiento</title>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        
        <div class="form_register">
            <center><h1><i class="fas fa-plus-square"></i>Registro de Tratamiento</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="idmas">ID de la Mascota</label>
                    <input type="text" name="idmas" id="idmas" placeholder="ID">
                    <label for="idenfe">ID de la Enfermedad</label>
                    <input type="text" name="idenfe" id="idenfe" placeholder="ID">
                    <label for="comprimidos">Comprimidos</label>
                    <input type="text" name="comprimidos" id="comprimidos" placeholder="Comprimidos">
                    <label for="suero">Suero</label>
                    <input type="text" name="suero" id="suero" placeholder="Suero">
                    <label for="inyectable">Inyectable</label>
                    <input type="text" name="inyectable" id="inyectable" placeholder="Inyectable">
                    <label for="internacion">Internacion</label>
                    <select name="internacion" id="internacion">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select></center><br>
                    <input type="submit" value="Registrar Tratamiento" class="btn_save">

                </form>


            </div>


        </section>
    </body>
    </html>