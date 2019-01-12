<?php      
        if(!isset($_POST['buscar'])){

            header('Location: index.php');
        }

        require_once 'includes/header.php';
        require_once 'includes/lateral.php'; 
?>
        <div id="principal">


            <h1>Busqueda de <?= $_POST['buscar']?></h1>

            <?php
                $entradas = seleccionarEntradas($db, null, null, $_POST['buscar']);

                if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                    while($entrada = mysqli_fetch_assoc($entradas)):
            ?>
                <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['categoria']. ' | '. $entrada['fecha']?></span>
                        <p><?= substr($entrada['descripcion'], 0, 180) . "..." ?></p>
                    </a>
                </article>
            <?php
                    endwhile;      
                else:
            ?>
            <div class="alerta">
                <p>No hay entradas en esta categoria =(</p>
            </div>
                <?php endif; ?>
        </div>
    <?php require_once 'includes/footer.php' ?>
</body>
</html>