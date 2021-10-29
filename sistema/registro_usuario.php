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
    if(empty($_POST['nombre']) || empty($_POST['apepat']) ||empty($_POST['apemat']) || empty($_POST['edad']) || empty($_POST['correo']) || empty($_POST['clave']) || empty($_POST['rol']))
    {
        $alert='<p class="msg_error">Todos Los Campos Son Obligatorios.</p>';
    }else{

        $nombre = $_POST['nombre'];
        $apepat = $_POST['apepat'];
        $apemat = $_POST['apemat'];
        $edad  = $_POST['edad'];
        $email   = $_POST['correo'];
        $clave  = md5($_POST['clave']);
        $rol    = $_POST['rol'];

        $query = mysqli_query($conection,"SELECT * FROM Usuario WHERE CorreoUsuario = '$email'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El Correo O El Usuario Ya Existe.</p>';
        }else{

           $query_insert = mysqli_query($conection,"INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Edad, CorreoUsuario, Clave, rol) VALUES('$nombre', '$apepat', '$apemat', '$edad', '$email', '$clave', '$rol')");
           if($query_insert){
            $alert='<p class="msg_save">Usuario Creado Correctamente.</p>';
        }else{
            $alert='<p class="msg_error">Error Al Crear El Usuario.</p>';
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
            <center><h1><i class="fas fa-user-plus"></i>Registro de Usuario</h1></center>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <center>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <label for="nombre">Apellido Paterno</label>
                    <input type="text" name="apepat" id="apepat" placeholder="Apellido Paterno">
                    <label for="nombre">Apellido Materno</label>
                    <input type="text" name="apemat" id="apemat" placeholder="Apellido Materno">
                    <label for="nombre">Edad</label>
                    <input type="text" name="edad" id="edad" placeholder="Edad">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" placeholder="Correo">
                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave" placeholder="Contraseña">
                    <label for="rol">Tipo de Usuario</label>

                    <?php 

                    $query_rol = mysqli_query($conection,"SELECT * FROM Tipo");
                    mysqli_close($conection);
                    $result_rol = mysqli_num_rows($query_rol);

                    ?>

                    <select name="rol" id="rol">
                        <?php 
                        if($result_rol > 0)
                        {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                                ?>
                                <option value="<?php echo $rol["IDTipo"]; ?>"><?php echo $rol["rol"] ?></option>
                                <?php 
                                # code...
                            }
                            
                        }
                        ?>
                        <br>    
                        <br>  
                        <input type="submit" value="Registrar Usuario" class="btn_save">
                    </center>
                </form>


            </div>


        </section>
    </body>
    </html>