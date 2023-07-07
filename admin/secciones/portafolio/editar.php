<?php 
include("../../bd.php"); 
 include("../../templates/header.php");
 
 if (isset($_GET['txtID'])) {
    //Recuperar los datos del Id correspondente base de datos
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM portafolio WHERE por_id=:por_id");
    $sentencia->bindParam(":por_id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $titulo=$registro['por_titulo'];
    $subtitulo=$registro['por_subtitulo'];
    $imagen=$registro['por_imagen'];
    $descripcion=$registro['por_descripcion'];
    $cliente=$registro['por_cliente'];
    $categoria=$registro['por_categoria'];
    $url=$registro['por_url'];
 }
 // Recepcion de los datos del formulario 
if ($_POST) {
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "";
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
    $url = (isset($_POST['url'])) ? $_POST['url'] : "";



    $sentencia=$conexion->prepare("UPDATE portafolio 
   SET 
   por_titulo=:por_titulo,
   por_subtitulo=:por_subtitulo,
   por_imagen=:por_imagen,
   por_descripcion=:por_descripcion,
   por_cliente=:por_cliente,
   por_categoria=:por_categoria,
   por_url=:por_url
   WHERE por_id=:por_id");

$sentencia->bindParam(":por_titulo", $titulo);
$sentencia->bindParam(":por_subtitulo", $subtitulo);
$sentencia->bindParam(":por_imagen", $imagen);
$sentencia->bindParam(":por_descripcion", $descripcion);
$sentencia->bindParam(":por_cliente", $cliente);
$sentencia->bindParam(":por_categoria", $categoria);
$sentencia->bindParam(":por_url", $url);
$sentencia->bindParam(":por_id",$txtID);
$sentencia->execute();



}
 ?>
Editar portafolio 


<div class="card">
  <div class="card-header">
   Editando la informacion de de Portafolo
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

     <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input readonly value="<?php echo $txtID;?>" type="text" 
        class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

      </div>


      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input value="<?php echo $titulo;?>" type="text" 
        class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">

      </div>

      <div class="mb-3">
        <label for="subtitulo" class="form-label">Subtitulo:</label>
        <input value="<?php echo $subtitulo;?>" type="text" 
        class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="subtitulo">

      </div>

      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input value="<?php echo $imagen;?>" type="file" 
        class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">

      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <input value="<?php echo $descripcion;?>" type="text" 
        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">

      </div>

      <div class="mb-3">
        <label for="cliente" class="form-label">Cliente:</label>
        <input value="<?php echo $cliente;?>" type="text" 
        class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="cliente">

      </div>

      <div class="mb-3">
        <label for="categoria" class="form-label">Categoria:</label>
        <input value="<?php echo $categoria;?>" type="text" 
        class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="categoria">

      </div>

      <div class="mb-3">
        <label for="url" class="form-label">Url:</label>
        <input value="<?php echo $url;?>" type="text" 
        class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="URL del proyecto">

      </div>

      <button type="submit" class="btn btn-success">Actualizar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">  Cancelar </a>

    </form> 

  </div>


</div>
<?php include("../../templates/footer.php");?>