<?php
include("../../bd.php");
if (isset($_GET['txtID'])) {

    // 1 REcuperar los datos del ID correspondiente (selecionado)

    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM configuraciones WHERE con_id=:con_id");
    $sentencia->bindParam(":con_id", $txtID);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombreconfiguracion = $registro['nombreconfiguracion'];
    $valor = $registro['valor'];
}

// 2Recepcion de los datos del formulario 
if ($_POST) {
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
    $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

    $sentencia = $conexion->prepare("UPDATE configuraciones 
     SET 
     nombreconfiguracion=:nombreconfiguracion,
     valor=:valor
     WHERE con_id=:con_id");

    $sentencia->bindParam(":nombreconfiguracion", $nombreconfiguracion);
    $sentencia->bindParam(":valor", $valor);
    $sentencia->bindParam(":con_id", $txtID);
    $sentencia->execute();
    $mensaje = "Registro agregado con éxito...........";
    header("location:index.php?mensaje=", $mensaje);
}


include("../../templates/header.php");


?>

<div class="card">
    <div class="card-header">
        Editando la informacion de Configuracíon
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

            </div>

            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre Cnfiguración:</label>
                <input value="<?php echo $nombreconfiguracion; ?>" type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre Cnfiguración">

            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input value="<?php echo $valor; ?>" type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor">

            </div>


            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>

    <?php include("../../templates/footer.php"); ?>