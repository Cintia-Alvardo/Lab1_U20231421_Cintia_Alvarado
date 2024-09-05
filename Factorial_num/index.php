<?php
$mensajeResultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroIngresado = filter_input(INPUT_POST, 'numeroIngresado', FILTER_VALIDATE_INT);

    if ($numeroIngresado === false || $numeroIngresado < 0) {
        $mensajeResultado = "<div class='mensaje-error'>Error: Ingrese un número entero no negativo.</div>";
    } elseif ($numeroIngresado == 0 || $numeroIngresado == 1) {
        $mensajeResultado = "<div class='resultado'>El factorial de $numeroIngresado es 1.</div>";
    } else {
        $factorial = array_product(range(1, $numeroIngresado));
        $mensajeResultado = "<div class='resultado'>El factorial de $numeroIngresado es $factorial.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Factorial</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .contenedor {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            max-width: 360px;
            width: 100%;
            text-align: center;
        }
        .campo {
            margin: 25px 0;
        }
        label {
            display: block;
            margin-bottom: 12px;
            font-weight: bold;
            color: #333333;
        }
        input[type="number"] {
            width: calc(100% - 24px);
            padding: 12px;
            border-radius: 6px;
            border: 2px solid #dcdcdc;
            font-size: 18px;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #003d7a;
        }
        .mensaje-error {
            color: #dc3545;
            margin-top: 20px;
        }
        .resultado {
            margin-top: 20px;
            font-size: 20px;
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Calculadora de Factorial</h1>
        <form method="post" action="">
            <div class="campo">
                <label for="numeroIngresado">Número:</label>
                <input type="number" id="numeroIngresado" name="numeroIngresado" min="0" required>
            </div>
            <button type="submit">Calcular</button>
        </form>
        <?php
        if ($mensajeResultado) {
            echo $mensajeResultado;
        }
        ?>
    </div>
</body>
</html>
