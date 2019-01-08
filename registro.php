<?php

session_start();

if(isset($_POST)){
        
    // Recoger valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    // Array de errores
    $errores = array();

    // Validar datos antes de guardarlo en la base de datos

    // Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){

        $nombreValidado = true;
    }else{
        $nombreValidado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    // Apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){

        $apellidosValidado = true;
    }else{
        $apellidosValidado = false;
        $errores['apellidos'] = "Los apellidos no es valido";
    }

    // Email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){

        $emailValidado = true;
    }else{
        $emailValidado = false;
        $errores['email'] = "El email no es valido";
    }

    // Password
    if(!empty($email)){

        $passwordValidado = true;
    }else{
        $passwordValidado = false;
        $errores['password'] = "El password no es valido";
    }

    // verificar errores de registro

    $guardarUsuario = false;

    if(count($errores) == 0){

        $guardarUsuario = true;
        
    }else{
        $_SESSION['errores'] = $errores;
        header('Location: index.php');
    }
}

?>