<?php
include("../../bd.php");

//seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `configuraciones` ");
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");

?>
Listar Configuracíon
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear Configuraciones </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de la Configración </th>
                        <th scope="col">valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_configuraciones as $registros) { ?>
                        <tr class="">
                            <td scope="col"><?php echo $registros['con_id']; ?></td>
                            <td scope="col"><?php echo $registros['nombreconfiguracion']; ?></td>
                            <td scope="col"><?php echo $registros['valor']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['con_id'] ?>" role="button"" role=" button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['con_id'] ?>" role="button">Eliminar</a>


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