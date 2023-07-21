<?php
include("../../bd.php");
// crear registro 
if ($_POST) {
  $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
  $password=(isset($_POST['password']))?$_POST['password']:"";
  $correo=(isset($_POST['correo']))?$_POST['correo']:"";

  $sentencia=$conexion->prepare("INSERT INTO `usuarios` (`usu_id`,`usu_usuario`,`usu_password`,`usu_correo`)
    VALUES (NULL, :usuario, :password, :correo);");
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->execute();

   $mensaje="Registro agregado con éxito...........";
    header("location:index.php?mensaje=",$mensaje);
}

include("../../templates/header.php");

?>
crear usuario
<div class="card">
    <div class="card-header">
        crear usuarios
    </div>
    <div class="card-body">
    <form action="" method="post">
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre Usuario">
          
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password"
            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="password">
          
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
          <input type="email"
            class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="correo">
            
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        

</form>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php"); ?>