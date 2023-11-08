<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'password';
$DATABASE_NAME = 'crud_db';

// conexion a la base de datos
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Obtener los datos del formulario
$id = $_POST['id'];

// Preparar la consulta SQL
$sql = 'DELETE FROM info_db WHERE `info_db`.`id` = ?';
$stmt = $conexion->prepare($sql);

// Vincular los parámetros
$stmt->bind_param('i',  $id);

// Ejecutar la consulta
$stmt->execute();

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir al usuario a la página de lectura de registros
$_SESSION["mensaje"] = "Se ha borrado correctamente el registro";
header('Location: read.php');
?>
