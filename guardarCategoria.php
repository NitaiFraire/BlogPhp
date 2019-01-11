<?php 

if(isset($_POST)){

    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    $errores = array();

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){

        $nombreValido = true;
    }else{

        $nombreValido = false;
        $errores['nombre'] = "Nombre erroneo, intenta otra vez.";
    }

    if(count($errores) == 0){

        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql); 
    }
}
header ('Location: index.php');


?>