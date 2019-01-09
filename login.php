<?php 

// Iniciar sesión y conexion a la db
require_once 'includes/conexion.php';

// Recoger los datos del formulario
if(isset($_POST)){

    // Borrar sesion de error antiguo
    if(isset($_SESSION['error_login'])){

        session_unset($_SESSION['error_login']);
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta par acomprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){

        $usuario = mysqli_fetch_assoc($login);


        // Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if($verify){

            // Utilizar una sesión para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;

        }else{

            // Si algo falla envian sesión con el fallo
            $_SESSION['error_login'] = "Error al iniciar sesión";
        }
        
    }else{

        // menseja de error
        $_SESSION['error_login'] = "Error al iniciar sesión";
    }

}

// Redirigir al index
header('Location: index.php');
?>