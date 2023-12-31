 <?php
include("../../bd.php");
if (isset($_GET['txtID'])) {

     
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    // buscar imagen del portafolio
    $sentencia=$conexion->prepare("SELECT ser_icono FROM servicios WHERE ser_id=:ser_id");
    $sentencia->bindParam(":ser_id",$txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);


    if (isset($registro_imagen["ser_icono"])) {
        if (file_exists("../../../assets/img/servicios/".$registro_imagen["ser_icono"])) {
            unlink("../../../assets\img\servicios/".$registro_imagen["ser_icono"]);


            
        }
    }

    //BORRAR EL DICHO REGISTRO CON EL ID CORRESPONDIENTE 
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM servicios WHERE ser_id=:ser_id");
    $sentencia->bindParam(":ser_id",$txtID);
    $sentencia->execute();
}




//seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `servicios` ");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
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
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_servicios as $registros) { ?>
                        <tr class="">
                            <td scope="col" ><?php echo $registros['ser_id']; ?></td>
                            <td scope="col"><img width="50" src="../../../assets/img/servicios/<?php echo $registros['ser_icono']; ?>" /></td>
                            <td scope="col"><?php echo $registros ['ser_titulo'] ?></td>
                            <td scope="col"><?php echo $registros ['ser_descripcion'] ?></td>

                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ser_id']?>" role="button"" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ser_id']?>" role="button">Eliminar</a>
                                
                            
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<?php include("../../templates/footer.php"); ?>