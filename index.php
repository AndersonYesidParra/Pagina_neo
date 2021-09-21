<?php

    $error_log = false;

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["ingreso"])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        require_once('conexion.php');

        $con = new Conexion();

        

        $sql = "SELECT COUNT(*) FROM usuario WHERE nombreUsuario = '{$usuario}' AND contrasenaUsuario = '{$password}'";        

        $c = $con->getConexion();        

        try{
            $ps = $c->prepare($sql);
            $ps->execute();

            $data = $ps->fetchAll();
            
            if($data[0][0] > 0){
                header('Location: usuarios.php');
            }else{
                // print("Ingrese los datos nuevamente");
                global $error_log;
                $error_log = true;
            }

        }catch (PDOException $ex){
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    
    <title>Login</title>
</head>
<body>

    <div class="container vh-100">
        <div class="row h-100 d-flex align-items-center">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Login</h2>
                                          
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" require>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" require>
                            </div>
                            <div class="d-flex justify-content-center">                                
                                <input type="submit" class="btn btn-info" value="Entrar" name="ingreso" >
                                <a href="crearUsuario.php" class="btn btn-success ml-1">Crear</a>
                            </div>
                        </div>
                        <div id="mensajeErrorDatos" class="alert alert-warning mx-2 d-none" role="alert">
                            Ingrese los datos nuevamente
                        </div>
                        <?php
                            if($error_log && isset($_POST["ingreso"])){
                               unset($_POST["ingreso"]);
                               echo "<script>";
                               echo "let alerta = document.getElementById('mensajeErrorDatos');";
                               echo "alerta.classList.remove('d-none');";
                               echo "setTimeout(()=>{";
                               echo "alerta.classList.add('d-none');";
                               echo "},3000);";                              
                               echo "</script>";                               
                            }
                        ?>
                    </div>
                </form>                                    
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
</body>
</html>