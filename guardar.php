<?php
// ====== CAPTURA DE DATOS DEL FORMULARIO ======
$nombre_post = $_POST["camponombre"] ?? '';
$comentario_post = $_POST["campocomentario"] ?? '';

// Validación simple
if (empty($nombre_post) || empty($comentario_post)) {
    die("<h2 style='color:red;'>Error: Debes completar todos los campos.</h2>");
}

// ====== CONEXIÓN A MySQL (InfinityFree) ======
$conexion = mysqli_connect(
    "sql302.infinityfree.com",
    "if0_40475212",
    "kim08011",
    "if0_40475212_pruebaeliane"
);

// Verificar conexión
if (!$conexion) {
    die(
        "<h2>Error: No se pudo conectar a MySQL.</h2>" .
        "<p>Error N°: " . mysqli_connect_errno() . "</p>" .
        "<p>Descripción: " . mysqli_connect_error() . "</p>"
    );
}

// ====== INSERTAR REGISTRO ======
$sql = "INSERT INTO china1 (nombre, comentario) VALUES ('$nombre_post', '$comentario_post')";

$mensaje = "";
if (mysqli_query($conexion, $sql)) {
    $mensaje = "<h2 style='color:lightgreen;'>✔ Registro insertado exitosamente</h2>";
} else {
    $mensaje = "<h2 style='color:red;'>Error al insertar registro</h2>" .
               "<p>" . mysqli_error($conexion) . "</p>";
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <style>
        body{
            background:#111;
            color:white;
            font-family: Arial;
            text-align:center;
            padding-top:40px;
        }
        .card{
            background:rgba(128,0,0,0.6);
            width:50%;
            margin:auto;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 15px black;
        }
        a{
            color:yellow;
            font-size:20px;
            text-decoration:none;
            transition:.3s;
        }
        a:hover{
            color:red;
        }
    </style>
</head>

<body>

<div class="card">
    <?php echo $mensaje; ?>

    <h1>¡Felicidades, <?php echo htmlspecialchars($nombre_post); ?>!</h1>

    <p>Te has registrado exitosamente. Estos son tus datos:</p>

    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre_post); ?></p>
    <p><strong>Comentario:</strong> <?php echo htmlspecialchars($comentario_post); ?></p>

    <br>
    <a href="listado.php">Ir al listado</a>
</div>

</body>
</html>
