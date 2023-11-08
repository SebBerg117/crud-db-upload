<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'password';
$DATABASE_NAME = 'crud_db';

// conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros guardados</title>
</head>
<body>
    <?php
    // Verifica si el mensaje está establecido y lo muestra
    if (isset($_SESSION["mensaje"])) {
        echo "<h2>" . $_SESSION["mensaje"] . "</h2>";

        // Eliminar el mensaje de la sesión si ya no se necesita
        unset($_SESSION["mensaje"]);
    }
    ?>
    <h1>Actualmente estos son los datos guardados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Deporte</th>
            </tr>
        </thead>
        <tbody>
        <?php // Obtener los datos de la base de datos
            $sql = 'SELECT info_db.*, 
                        (SELECT info_deporte.deporte 
                        FROM info_deporte 
                        WHERE info_db.id_deporte = info_deporte.id) AS Deporte
                    FROM info_db;';
            $resultado = mysqli_query($conexion, $sql);

            // Recorrer los resultados de la consulta SQL
            foreach ($resultado as $registro) {
                echo '<tr>';
                echo '<td>' . $registro['id'] . '</td>';
                echo '<td>' . $registro['nombre'] . '</td>';
                echo '<td>' . $registro['apellido'] . '</td>';
                echo '<td>' . $registro['edad'] . '</td>';
                echo '<td>' . $registro['Deporte'] . '</td>';
                echo '</tr>';
            }
            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);

        ?>
        </tbody>
    </table>
</body>
</html>