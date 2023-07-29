<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {

  // 1 REcuperar los datos del ID correspondiente (selecionado)

  $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

  $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE usu_id=:usu_id");
  $sentencia->bindParam(":usu_id", $txtID);
  $sentencia->execute();

  $registro = $sentencia->fetch(PDO::FETCH_LAZY);
  $usuario = $registro['usu_usuario'];
  $password = $registro['usu_password'];
  $correo = $registro['usu_correo'];
}

// 2Recepcion de los datos del formulario 
if ($_POST) {
  print_r($_POST);

  $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
  $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
  $password = (isset($_POST['password'])) ? $_POST['password'] : "";
  $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";

  $sentencia = $conexion->prepare("UPDATE usuarios
     SET 
     usu_usuario=:usu_usuario,
     usu_password=:usu_password,
     usu_correo=:usu_correo 
     WHERE usu_id=:usu_id");

  $sentencia->bindParam(":usu_usuario", $usuario);
  $sentencia->bindParam(":usu_password", $password);
  $sentencia->bindParam(":usu_correo", $correo);
  $sentencia->bindParam(":usu_id", $txtID);
  $sentencia->execute();
  $mensaje = "Registro modificado con éxito.";
  header("location:index.php?mensaje=", $mensaje);
}
include("../../templates/header.php");


?>
Editar usuario
<div class="card">
  <div class="card-header">
    Editar Usuarios
  </div>
  <div class="card-body">
    <form action="" method="post">

      <div class="mb-3">
        <label for="txtID" class="form-label">ID</label>
        <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

      </div>

      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="usuario" value="<?php echo $usuario; ?>" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">

      </div>


      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" value="<?php echo $password; ?>" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="password">

      </div>


      <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" value="<?php echo $correo; ?>" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="correo">

      </div>
      <!-- Direccionar -->
      <button type="submit" class="btn btn-success">Actualizar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>
<?php include("../../templates/footer.php"); ?>