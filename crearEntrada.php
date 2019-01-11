<?php 

    require_once 'includes/redireccion.php';
    require_once 'includes/header.php';
    require_once 'includes/lateral.php';

?>

<div id="principal">
    <h1>Crear entrada</h1>
    <p>¿Que hay de nuevo en el mundo gamer?</p>
    <br>
    <form action="guardarEntrada.php" method="POST">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'titulo') : ''; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php
                 $categorias = seleccionarConsultas($db);

                 if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):    
            ?>
                    <option value="<?= $categoria['id']?>">
                        <?= $categoria['nombre'] ?>
                    </option>
                    <?php
                    endwhile;
                endif;
                ?>
        </select>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'categoria') : ''; ?>

        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion" id="" cols="60" rows="10"></textarea>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'descripcion') : ''; ?>

        <input type="submit" value="Crear!">
    </form>
    <?php borrarErrores(); ?>
</div>


<?php require_once 'includes/footer.php'; ?>
