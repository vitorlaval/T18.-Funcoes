
<?php

// Função para realizar os cálculos
function calcular($num1, $num2, $operacao) {

    switch ($operacao) {

        case "adicao":
            return $num1 + $num2;

        case "subtracao":
            return $num1 - $num2;

        case "multiplicacao":
            return $num1 * $num2;

        case "divisao":
            if ($num2 == 0) {
                return "Não é possível dividir por zero!";
            }
            return $num1 / $num2;

        default:
            return "Operação inválida!";
    }
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = (float) $_POST["num1"];
    $num2 = (float) $_POST["num2"];
    $operacao = $_POST["operacao"];

    $resultado = calcular($num1, $num2, $operacao);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Calculadora PHP</h1>

    <form method="POST">

        <input type="number" step="any" name="num1"
        placeholder="Primeiro número" required>

        <input type="number" step="any" name="num2"
        placeholder="Segundo número" required>

        <select name="operacao" required>
            <option value="adicao">Adição (+)</option>
            <option value="subtracao">Subtração (-)</option>
            <option value="multiplicacao">Multiplicação (*)</option>
            <option value="divisao">Divisão (/)</option>
        </select>

        <button type="submit">Calcular</button>

    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            Resultado:
            <?php
            if (is_numeric($resultado)) {
                echo number_format((float) $resultado, 2, ",", ".");
            } else {
                echo htmlspecialchars((string) $resultado);
            }
            ?>
        </div>
    <?php endif; ?>

    <a href="index.php">Voltar ao menu</a>

</div>

</body>
</html>
