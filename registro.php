<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){

        session_start();
    }
        
    // Recoger valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array de errores
    $errores = array();

    // Validar datos antes de guardarlo en la base de datos

    // Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){

        $nombreValidado = true;
    }else{
        $nombreValidado = false;
        $errores['nombre'] = "Nombre invalido";
    }

    // Apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){

        $apellidosValidado = true;
    }else{
        $apellidosValidado = false;
        $errores['apellidos'] = "Apellidos invalidos";
    }

    // Email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){

        $emailValidado = true;
    }else{
        $emailValidado = false;
        $errores['email'] = "E-mail invalido";
    }

    // Password
    if(!empty($password)){

        $passwordValidado = true;
    }else{
        $passwordValidado = false;
        $errores['password'] = "Password invalido";
    }

    // verificar errores de registro

    $guardarUsuario = false;

    if(count($errores) == 0){

        $guardarUsuario = true;

        // cifrar contraseña
        $passwordCifrada = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        // insetar usuario en la db
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$passwordCifrada', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        if($guardar){

            $_SESSION['completado'] = "El registro se ha completado con éxito";

        }else{

            $_SESSION['errores']['general'] = "Fallo al guardar usuario";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');

?>