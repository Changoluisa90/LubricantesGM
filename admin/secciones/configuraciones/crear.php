<?php
include("../../bd.php");


if ($_POST) {

    //Recepcionamos los valores del formulario
    $nombreconfiguracion = (isset($_POST['nombreconfiguracion']['name'])) ? $_POST['nombreconfiguracion']['name'] : "";
    $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `configuraciones` (`con_id`,`con_Nombreconfiguracion`,`valor`)
        VALUES (NULL, :nombreconfiguracion, :valor);");
    $sentencia->bindParam(":nombreconfiguracion", $nombreconfiguracion);
    $sentencia->bindParam(":valor", $valor);
    $sentencia->execute();

    $mensaje = "Registro agregado con éxito...........";
    header("location:index.php?mensaje=", $mensaje);
}
include("../../templates/header.php");

?>

<div class="card">
    <div class="card-header">
        Crear Configuracíon
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre Configuraciónes:</label>
                <input type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre Configuraciónes">

            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor">

            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>}
    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../templates/footer.php"); ?>