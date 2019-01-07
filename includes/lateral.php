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

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="">

                    <label for="email">E-mail</label>
                    <input type="email" name="email">
    
                    <label for="password">Password</label>
                    <input type="password" name="password">
    
                    <input type="submit" value="Resgistrar">
            </form>
        </div>
</aside>