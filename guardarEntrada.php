<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    $errores = array();

    if(empty($titulo)){

        $errores['titulo'] = "titulo invalido";
    }

    if(empty($descripcion)){

        $errores['descripcion'] = "descripcion invalida";
    }

    if(empty($categoria) && !is_numeric($categoria)){

        $errores['categoria'] = "categoria invalida";
    }


    if(count($errores) == 0){

        if(isset($_GET['editar'])){

            $entradaId = $_GET['editar'];
            $usuarioId = $_SESSION['usuario']['id'];

            $sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = $categoria ".
                    "WHERE id = $entradaId AND usuario_id = $usuarioId";
        }else{

            $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }


        $guardar = mysqli_query($db, $sql);

        header('Location: index.php');

    }else{

        $_SESSION['erroresEntrada'] = $errores;

        if(isset($_GET['editar'])){

            header('Location: editarEntrada.php?id='.$_GET['editar']);
        }else{

            header('Location: crearEntrada.php');
        }
    }

}


?>