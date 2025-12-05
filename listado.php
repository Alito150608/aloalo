<?php
// Conexión a MySQL
$conexion = mysqli_connect(
    "sql302.infinityfree.com",
    "if0_40475212",
    "kim08011",
    "if0_40475212_pruebaeliane"
);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener registros
$sql = "SELECT * FROM china1 ORDER BY id DESC";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Listado de Visitas</title>
<style>
    body{
        background:#111;
        color:white;
        font-family:Arial;
        text-align:center;
        padding-top:20px;
    }

    table{
        width:80%;
        margin:auto;
        border-collapse:collapse;
        background:rgba(128,0,0,0.7);
    }

    th, td{
        border:1px solid #fff;
        padding:10px;
        font-size:18px;
    }

    th{
        background:#800000;
    }

    a{
        color:yellow;
        text-decoration:none;
    }
</style>
</head>
<body>

<h1>📜 Libro de Visitas</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Comentario</th>
    </tr>

    <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td><?= $fila["id"] ?></td>
        <td><?= htmlspecialchars($fila["nombre"]) ?></td>
        <td><?= htmlspecialchars($fila["comentario"]) ?></td>
    </tr>
    <?php } ?>

</table>

<br><br>
<a href="index.html">⬅ Volver al Inicio</a>

</body>
</html>

<?php mysqli_close($conexion); ?>
