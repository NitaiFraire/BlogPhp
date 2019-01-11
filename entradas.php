<?php require_once 'includes/header.php'?>
    <?php require_once 'includes/lateral.php'?> 
        <div id="principal">
            <h1>Todas las entradas</h1>

            <?php
                $entradas = seleccionarEntradas($db);

                if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)):
            ?>
                <article class="entrada">
                    <a href="">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['categoria']. ' | '. $entrada['fecha']?></span>
                        <p><?= substr($entrada['descripcion'], 0, 180) . "..." ?></p>
                    </a>
                </article>
            <?php
                    endwhile;      
                endif; 
            ?>
        </div>
    <?php require_once 'includes/footer.php' ?>
</body>
</html>
