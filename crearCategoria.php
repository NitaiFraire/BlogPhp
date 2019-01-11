<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/lateral.php' ?>


<div id="principal">
    <h1>Crear categoría</h1>

    <p>Añade nuevas categorias al blog para mayor diversidad.</p>
    <br>
    <form action="guardarCategoria.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="">

        <input type="submit" value="Crear!">
    </form>
</div>

<?php require_once 'includes/footer.php' ?>