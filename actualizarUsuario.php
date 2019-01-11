<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';

    // Recoger valores del formulario de actualizaion
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
 
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


    // verificar errores de registro

    $guardarUsuario = false;

    if(count($errores) == 0){

        $usuario = $_SESSION['usuario'];
        $guardarUsuario = true;

        // Comprobar email
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
        $issetEmail = mysqli_query($db, $sql);
        $issetUser = mysqli_fetch_assoc($issetEmail);

        if($issetUser['id'] == $usuario['id'] || empty($issetUser)){

            // actualizar usuario en la db
            $sql = "UPDATE usuarios SET ".
             "nombre = '$nombre', ".
             "apellidos = '$apellidos', ".
             "email = '$email' ".
             "WHERE id = " .$usuario['id'];
    
            $guardar = mysqli_query($db, $sql);
    
            if($guardar){
    
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "La actualizacion se ha completado con éxito";
    
            }else{
    
                $_SESSION['errores']['general'] = "Fallo al actualizar";
            }

        }else{

            $_SESSION['errores']['general'] = "Email ya existente";
        }


    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: misDatos.php');

?>