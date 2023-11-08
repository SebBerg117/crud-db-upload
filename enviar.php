<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'password';
$DATABASE_NAME = 'crud_db';

// conexion a la base de datos
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$id_deporte = $_POST['id_deporte'];


// Insertar los datos en la base de datos
$sql = 'INSERT INTO info_db (nombre, apellido, edad, id_deporte) VALUES (?, ?, ?, ?)';
$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssii', $nombre, $apellido, $edad,$id_deporte);
$stmt->execute();

// Redirigir al usuario a la página de lectura de registros
$_SESSION["mensaje"] = "Se ha agregado correctamente el registro";
header('Location: read.php');

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
