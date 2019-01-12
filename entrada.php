<?php 
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
                <a href="entrada.php?id=<?=$entrada['id']?>"></a>
                <h1><?= $entradaActual['titulo']?></h1>
                <h2><?= $entradaActual['categoria']?></h2>
                <h4><?= $entradaActual['fecha']?> | <?= $entradaActual['usuario'] ?></h4>
                <p><?= $entradaActual['descripcion']?></p>

        <?php if($_SESSION['usuario'] && $_SESSION['usuario']['id'] == $entradaActual['usuario_id']): ?>
            <a href="editarEntrada.php?id=<?=$entradaActual['id']?>" class="boton boton-crear">Editar entrada</a>
            <a href="borrarEntrada.php?id=<?=$entradaActual['id']?>" class="boton boton-cerrar">Eliminar entrada</a>
        <?php endif;?>
        </div>
    <?php require_once 'includes/footer.php' ?>
</body>
</html>