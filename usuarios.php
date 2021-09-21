<?php
    require_once('conexion.php');

    $usuarios;
    $con = new Conexion();

    $c = $con->getConexion();
    $sql = "SELECT usuario.idUsuario, usuario.nombreUsuario, usuario.contrasenaUsuario, usuario.correoUsuario, rol.nombreRol FROM usuario
    INNER JOIN rol ON rol.idRol = usuario.idRol";

    try{
        $ps = $c->prepare($sql);        
        $ps->execute();
        $data = $ps->fetchAll();        
        global $usuarios;
        $usuarios = $data;
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    
    <title>Usuarios</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="mb-2">
                    <h1 class="d-inline">Usuarios</h1>
                    <a href="crearUsuario.php" class="btn btn-sm btn-success ml-1 mb-3">Crear usuario</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php
                                foreach($usuarios as $user){
                                    ?>
                                        <tr>
                                            <td scope="col"><?php echo $user["idUsuario"] ?></td>
                                            <td scope="col"><?php echo $user["nombreUsuario"] ?></td>
                                            <td scope="col"><?php echo $user["correoUsuario"] ?></td>
                                            <td scope="col"><?php echo $user["nombreRol"] ?></td>
                                            <td scope="col">
                                                <a href="editarUsuario.php?user=<?php echo $user["idUsuario"] ?>" class="text-info">Editar</a> | <a class="text-danger" href="eliminarUsuario.php?user=<?php echo $user["idUsuario"] ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>                        
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="index.php" class="btn btn-danger">Salir</a>                
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>