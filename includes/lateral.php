<?php require_once 'includes/helpers.php' ?>
<aside id="sidebar">
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <form action="login.php" method="POST">
                <label for="email">E-mail</label>
                <input type="email" name="email">

                 <label for="password">Password</label>
                 <input type="password" name="password">

                <input type="submit" value="Entrar">
            </form>
        </div>

        <div id="registro" class="bloque">
            <h3>Registrate</h3>
             <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                    <label for="email">E-mail</label>
                    <input type="email" name="email">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
    
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '';?>
    
                    <input type="submit" value="Resgistrar" name="submit">
            </form>
            <?php borrarErrores(); ?>
        </div>
</aside>