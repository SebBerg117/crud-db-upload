<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un registro</title>
</head>
<body>
    <h1>Ingrese los datos para crear un registro</h1>
    <form action="enviar.php" method="post">
            <label for="Name">Nombre</label>
            <input type="text" id="Nombre" name="nombre" required/>
            <label for="Name">Apellidos</label>
            <input type="text" id="Apellidos" name="apellido" required/>
            <label for="Name">Edad</label>
            <input type="text" id="Edad" name="edad" required/>
            <label for="Name">Deporte</label>
            <select name="id_deporte" id="id_deporte" required> 
                <option value="">Selecciona</option>
                <option value=1>Futbol</option>
                <option value=2>Basquet</option>
                <option value=3>Beísbol</option>
            </select>
            <input type="submit" value="Crear">
        </form>
</body>
</html>
