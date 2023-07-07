<?php 
include("../../templates/header.php");
include("../../bd.php");

//seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `portafolio` ");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

Listar portafolio  mostar 

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>

    </div>
    <div class="card-body">
<div class="table-responsive-sm">
    <table class="table table  ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Subtitulo </th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cliente</th>
                <th scope="col">Categoria</th>
                <th scope="col">Url</th>
                <th scope="col">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($lista_portafolio as $registros) { ?>
            <tr class="">
                <td scope="col"><?php echo $registros['por_id']; ?></td>
                <td scope="col"><?php echo $registros ['por_titulo'] ?></td>
                <td scope="col"><?php echo $registros ['por_subtitulo'] ?> </td>
                <td scope="col"><?php echo $registros['por_imagen']; ?></td>
                <td scope="col"><?php echo $registros['por_descripcion']; ?></td>
                <td scope="col"><?php echo $registros['por_cliente']; ?></td>
                <td scope="col"><?php echo $registros['por_categoria']; ?></td>
                <td scope="col"><?php echo $registros['por_url']; ?></td>
                <td scope="col">Acciones</td>
                <td>
                 <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['por_id']?>" role="button"" role="button">Editar</a>
                                |
                 <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['por_id']?>" role="button">Eliminar</a>
                                
                            
                </td>
            </tr>
            <?php } ?>
        </tbody>

        
    </table>
</div>

    </div>
    
      
    </div>

<?php include("../../templates/footer.php");?>
