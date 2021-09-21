<?php

        require_once('conexion.php');
        $con = new Conexion();
        $c = $con->getConexion();

    $user;
    if($_SERVER["REQUEST_METHOD"]=="POST"){        
        $nombre = $_POST["nombreUsuario"];
        $correo = $_POST["correoUsuario"];
        $rol = $_POST["rolUsuario"];
        $pass = $_POST["passwordUsuario"];

        $sql = "INSERT INTO  usuario (nombreUsuario, contrasenaUsuario, correoUsuario, idRol)  VALUE ('{$nombre}', '{$pass}', '{$correo}', {$rol})";

        try{
        $ps = $c->prepare($sql);        
        $ps->execute();
        header("location: usuarios.php");
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <div class="container vh-100 mt-3">
        <div class="row h-100 ">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                    <h2 class="card-title">Editar</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nombreUsuario">Nombre de usuario</label>
                            <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="correoUsuario">Correo</label>
                            <input type="email" id="correoUsuario" name="correoUsuario" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="rolUsuario">Rol</label>
                            <select name="rolUsuario" id="rolUsuario" class="form-control">
                                <option value="1">Adminitrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Vendedor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="passwordUsuario">Contraseña</label>
                            <input type="password" id="passwordUsuario" name="passwordUsuario" class="form-control" require>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="Guardar" name="Guardar" class="btn btn-info">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>