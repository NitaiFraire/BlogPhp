<?php 

$server = "localhost";
$userName = "root";
$password = "";
$database = "blog";

$db = mysqli_connect($server, $userName, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar sesion
if(!isset($_SESSION)){

    session_start();
}

?>