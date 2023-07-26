<?php
include("../../bd.php");
if ($_POST) {

  //Recepcionamos los valores del formulario guardar datos en la bd
  $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
  $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";
  
  $sentencia=$conexion->prepare("INSERT INTO `configuraciones` (`con_id`, `nombreconfiguracion`, `valor`)
  VALUES (NULL, :nombreconfiguracion, :valor);");


  $sentencia->bindParam(":nombreconfiguracion", $nombreconfiguracion);
  $sentencia->bindParam(":valor", $valor);
  $sentencia->execute();
  $mensaje="Registro agregado con éxito...........";
    header("location:index.php?mensaje=",$mensaje);

}
include("../../templates/header.php");
?>
<div class="card">
  <div class="card-header">
    Producto del Configuracion
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

      <div class="mb-3">
        <label for="nombreconfiguracion" class="form-label">Nombre Cnfiguración:</label>
        <input type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="Nombre Cnfiguración">

      </div>

      <div class="mb-3">
        <label for="valor" class="form-label">Valor:</label>
        <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor">

      </div>
     
   
      <button type="submit" class="btn btn-success">Guardar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form> 

  </div>


</div>

<?php include("../../templates/footer.php"); ?>