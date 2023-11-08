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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$id_deporte = $_POST['id_deporte'];

// Preparar la consulta SQL
$sql = 'UPDATE info_db SET nombre = ?, apellido = ?, edad = ?, id_deporte = ? WHERE id = ?';
$stmt = $conexion->prepare($sql);
// Vincular los parámetros
$stmt->bind_param('sssii', $nombre, $apellido, $edad, $id_deporte, $id);
// Ejecutar la consulta
$stmt->execute();
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
$_SESSION["mensaje"] = "Se ha actualizado correctamente el registro";
// Redirigir al usuario a la página de lectura de registros
header('Location: read.php');
?>
