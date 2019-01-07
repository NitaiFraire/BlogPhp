<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="assets/css/app.css"/>
</head>
<body>
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
                Blog de videojuegos 
            </a>
        </div>
        <nav id="menu">
           <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="">Categoria 1</a></li>
                <li><a href="">Categoria 2</a></li>
                <li><a href="">Categoria 3</a></li>
                <li><a href="">Categoria 4</a></li>
                <li><a href="">Sobre mí</a></li>
                <li><a href="">Contacto</a></li>
           </ul> 
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="contenedor">
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
        <div id="principal">
            <h1>Ultimas entradas</h1>
            <a href="">
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati totam quos sequi sit reprehenderit ipsa debitis aliquid laudantium possimus, vitae esse placeat mollitia ipsam consectetur voluptatibus dolor, pariatur corporis quisquam?</p>
                </article>
            </a>
            <a href="">
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati totam quos sequi sit reprehenderit ipsa debitis aliquid laudantium possimus, vitae esse placeat mollitia ipsam consectetur voluptatibus dolor, pariatur corporis quisquam?</p>
                </article>
            </a>
            <a href="">
                <article class="entrada">
                    <h2>Titulo de mi entrada</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati totam quos sequi sit reprehenderit ipsa debitis aliquid laudantium possimus, vitae esse placeat mollitia ipsam consectetur voluptatibus dolor, pariatur corporis quisquam?</p>
                </article>
            </a>
            <div id="verTodas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div>
        <div class="clerfix"></div>
    </div>
    <footer id="pie">
        <p>Developed by n3T6i &copy; 2018</p>
    </footer>
</body>
</html>