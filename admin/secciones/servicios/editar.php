 <?php
include("../../bd.php"); 

if (isset($_GET['txtID'])) {

 // REcuperar los datos del ID correspondiente (selecionado)
  
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
  
  $sentencia=$conexion->prepare("SELECT * FROM servicios WHERE ser_id=:ser_id");
  $sentencia->bindParam(":ser_id",$txtID);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $icono=$registro['ser_icono'];
  $titulo=$registro['ser_titulo'];
  $descripcion=$registro['ser_descripcion'];
}
   // Recepcion de los datos del formulario 
if ($_POST) {
  //print_r($_POST);

  $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
  //$icono=(isset($_POST['icono']))?$_POST['icono']:"";
  $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
  $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

   $sentencia=$conexion->prepare("UPDATE servicios 
   SET 
   ser_icono=:ser_icono,
   ser_titulo=:ser_titulo,
   ser_descripcion=:ser_descripcion 
   WHERE ser_id=:ser_id");

$sentencia->bindParam(":ser_icono",$icono);
$sentencia->bindParam(":ser_titulo", $titulo);
$sentencia->bindParam(":ser_descripcion", $descripcion);
$sentencia->bindParam(":ser_id",$txtID);
$sentencia->execute();
$mensaje="Registro modificado con éxito.";
header("location:index.php?mensaje=",$mensaje);

//EDITAR IMAGEN Y BORRAR DE LA CARPETA 
if ($_FILES['icono']['tmp_name'] != "") {
  $icono = (isset($_FILES['icono']['name'])) ? $_FILES['icono']['name'] : "";
  $fecha_imagen = new DateTime();
  $nombre_archivo_imagen = ($icono !="")?$fecha_imagen->getTimestamp() . "_" . $icono : "";
  $tmp_imagen = $_FILES["icono"]["tmp_name"];
  move_uploaded_file($tmp_imagen, "../../../assets/img/servicios/" . $nombre_archivo_imagen);
  //borrado de archivo anterior imagen
  $sentencia=$conexion->prepare("SELECT ser_icono FROM servicios WHERE ser_id=:ser_id");
  $sentencia->bindParam(":ser_id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);


  if (isset($registro_imagen["ser_icono"])) {
      if (file_exists("../../../assets/img/servicios/".$registro_imagen["ser_icono"])) {
          unlink("../../../assets\img\servicios/".$registro_imagen["ser_icono"]);


          
      }
  }

  $sentencia = $conexion->prepare("UPDATE servicios SET ser_icono=:ser_icono WHERE ser_id=:ser_id");
  $sentencia->bindParam(":ser_icono", $nombre_archivo_imagen);
  $sentencia->bindParam(":ser_id", $txtID);
  $sentencia->execute();    
 
}

}

include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
        Editando la informacion de Servicios 
    </div>
    <div class="card-body">
       <form action="" enctype="multipart/form-data" method="post">
         
       <div class="mb-3">
         <label for="txtID" class="form-label">ID:</label>
         <input readonly value="<?php echo $txtID;?>" type="text"
           class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
          
       </div>
       <div class="mb-3">
         <label for="icono" class="form-label">Icono:</label>
         <img width="50" src="../../../assets/img/servicios/<?php echo $icono; ?>" />
         <input type="file" class="form-control" name="icono" id="icono" placeholder="icono" aria-describedby="fileHelpId">
       </div>


        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input value="<?php echo $titulo;?>" type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
         
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción:</label>
          <input  value="<?php echo $descripcion;?>" type="text"

            class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
         
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">  Cancelar </a>
        
       </form>


    </div>
    <div class="card-footer text-muted">
      
    

    </div>
</div>
<?php include("../../templates/footer.php");?>