<?php require_once 'includes/helpers.php' ?>
<aside id="sidebar">
        <div id="buscador" class="bloque">
            <h3>Buscador</h3>

            <form action="buscar.php" method="POST">
                <input type="text" name="buscar">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <?php if(isset($_SESSION['usuario'])): ?>
            <div id="usuario-logueado" class="bloque">
                <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '. $_SESSION['usuario']['apellidos'];?></h3>
                <a href="crearEntrada.php" class="boton boton-crear">Crear entradas</a>
                <a href="crearCategoria.php" class="boton boton-crear">Crear categoria</a>
                <a href="misDatos.php" class="boton ">Mis datos</a>
                <a href="includes/cerrar.php" class="boton boton-cerrar">Cerrar sesión</a>
            </div>
        <?php endif; ?> 
        <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="bloque">
            <h3>Identificate</h3>

            <?php if(isset($_SESSION['error_login'])): ?>
                <div id="usuario-logueado" class="alertaError">
                    <?= $_SESSION['error_login'];?>
                </div>
            <?php endif; ?>

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

            <!-- Mostrar errores -->
            <?php if(isset($_SESSION['completado'])): ?>

                    <div class="alerta alertaExito">
                      <?= $_SESSION['completado'] ?>
                    </div>

            <?php elseif(isset($_SESSION['errores']['general'])): ?>

                    <div class="alertaError">
                      <?= $_SESSION['errores']['general'] ?>
                    </div>

            <?php endif; ?>



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
    <?php endif; ?>
</aside>