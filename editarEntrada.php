<?php 
        require_once 'includes/redireccion.php';
        require_once 'includes/conexion.php';
        require_once 'includes/helpers.php';
 
        $entradaActual = getEntrada($db, $_GET['id']);
        
        if(!isset($entradaActual['id'])){

            header('Location: index.php');
        }

        require_once 'includes/header.php';
        require_once 'includes/lateral.php'; 
?>

<div id="principal">
    <h1>Editar entrada</h1>
    <p>Edita tu entrada <?=$entradaActual['titulo']?></p>
    <br>
    <form action="guardarEntrada.php?editar=<?=$entradaActual['id']?>" method="POST">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" value="<?=$entradaActual['titulo']?>">
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'titulo') : ''; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php
                 $categorias = seleccionarConsultas($db);

                 if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):    
            ?>
                    <option value="<?= $categoria['id']?>"
                    <?= ($categoria['id'] == $entradaActual['categoria_id']) ? 'selected="selected"' : '' ?>
                    >
                        <?= $categoria['nombre'] ?>
                    </option>
                    <?php
                    endwhile;
                endif;
                ?>
        </select>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'categoria') : ''; ?>

        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion" id="" cols="60" rows="10"><?=$entradaActual['descripcion']?></textarea>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'descripcion') : ''; ?>

        <input type="submit" value="Editar!">
    </form>
</div>
    <?php
         borrarErrores();
         require_once 'includes/footer.php'; 
     ?>