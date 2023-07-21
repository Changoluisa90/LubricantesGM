<?php
include("../../bd.php");
include("../../templates/header.php");

if (isset($_GET['txtID'])) {

    //2BORRAR  DICHO REGISTRO CON EL ID CORRESPONDIENTE desde el formulario
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM usuarios WHERE usu_id=:usu_id");
    $sentencia->bindParam(":usu_id",$txtID);
    $sentencia->execute();
}


//1seleccionar registros baase de datos
$sentencia = $conexion->prepare("SELECT * FROM `usuarios` ");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>
    <div class="card-body">
    <div class="table-responsive-sm">
    <table class="table table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña </th>
                <th scope="col">Correo </th>
                <th scope="col">Acciones </th>

            </tr>
        </thead>
        <tbody>
        <?php foreach ($lista_usuarios as $registros) { ?>
                        <tr class="">
                            <td><?php echo $registros['usu_id']; ?></td>
                            <td><?php echo $registros ['usu_usuario'] ?></td>
                            <td><?php echo $registros ['usu_password'] ?></td>
                            <td><?php echo $registros ['usu_correo'] ?></td>

                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['usu_id']?>" role="button"" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['usu_id']?>" role="button">Eliminar</a>
                                
                            
                            </td>
                        </tr>
                    <?php } ?>
        </tbody>
    </table>
</div>

    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>





<?php include("../../templates/footer.php"); ?>