<?php 
include("../../bd.php");
if ($_POST) {
 
//Recepcionamos los valores del formulario
  $icono= (isset($_FILES['icono']['name'])) ? $_FILES['icono']['name'] : "";
 // $icono=(isset($_POST['icono']))?$_POST['icono']:"";
  $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
  $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

  // imagen 
  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($icono!="")? $fecha_imagen->getTimestamp()."_".$icono:"";
  $tmp_imagen=$_FILES["icono"]["tmp_name"];

  if ($tmp_imagen!="") {
   move_uploaded_file($tmp_imagen,"../../../assets/img/servicios/".$nombre_archivo_imagen);
  }

   $sentencia=$conexion->prepare("INSERT INTO `servicios` (`ser_id`,`ser_icono`,`ser_titulo`,`ser_descripcion`)
    VALUES (NULL, :icono, :titulo, :descripcion);");
    $sentencia->bindParam(":icono",$nombre_archivo_imagen);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->execute();

   $mensaje="Registro agregado con éxito...........";
    header("location:index.php?mensaje=",$mensaje);
}
include("../../templates/header.php");
?>

crear servicios 

<div class="card">
    <div class="card-header">
        Crear Servicios
    </div>
    <div class="card-body">
       <form action="" enctype="multipart/form-data" method="post">

        <div class="mb-3">
          <label for="icono" class="form-label">Icono:</label>
          <input type="file"
            class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono">
          
        </div>
    
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
         
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción:</label>
          <input type="text"
            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
         
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
       </form>


    </div>
    <div class="card-footer text-muted">
      
    

    </div>
</div>
<?php include("../../templates/footer.php");?>