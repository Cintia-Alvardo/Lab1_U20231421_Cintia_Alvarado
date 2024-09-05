<?php
// Función para contar vocales en un texto
function contarVocales($texto) {
    $texto = strtolower($texto);
    $conteoVocales = ['a' => 0, 'e' => 0, 'i' => 0, 'o' => 0, 'u' => 0];

    for ($i = 0; $i < strlen($texto); $i++) {
        $caracter = $texto[$i];
        if (array_key_exists($caracter, $conteoVocales)) {
            $conteoVocales[$caracter]++;
        }
    }

    return $conteoVocales;
}

$estadisticasVocales = [];
if (isset($_GET['entradaTexto'])) {
    $entradaUsuario = trim($_GET['entradaTexto']);
    $estadisticasVocales = contarVocales($entradaUsuario);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Vocales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contenedor {
            background-color: #ffffff;
            color: #333333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            margin-bottom: 15px;
            font-size: 22px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            width: calc(100% - 20px);
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            padding: 10px;
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .resultados {
            margin-top: 15px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #dddddd;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Contador de Vocales</h1>
        <form method="GET" action="">
            <label for="entradaTexto">Introduce tu texto:</label>
            <input type="text" id="entradaTexto" name="entradaTexto" required>
            <input type="submit" value="Contar Vocales">
        </form>

        <?php if (!empty($estadisticasVocales)): ?>
            <div class="resultados">
                <h2>Conteo de Vocales:</h2>
                <?php foreach ($estadisticasVocales as $vocal => $cantidad): ?>
                    <p><?php echo strtoupper($vocal) . ': ' . $cantidad; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> 
    </div>
</body>
</html>
