<?php 

    require_once 'includes/conexion.php';

    session_start();

    if(isset($_SESSION['usuario']) && isset($_GET['id'])){

        $entradaId = $_GET['id'];
        $usuarioId = $_SESSION['usuario']['id'];

        $sql = "DELETE FROM entradas WHERE usuario_id = $usuarioId AND id = $entradaId";
        mysqli_query($db, $sql);
    }

    header('Location: index.php');

?>