
<?php

// 1) Função para somar dois números
function somar($num1, $num2) {
    return $num1 + $num2;
}

// 2) Função para calcular a média de três números
function calcularMedia($num1, $num2, $num3) {
    return ($num1 + $num2 + $num3) / 3;
}

// 3) Função para verificar se é par ou ímpar
function verificarParImpar($numero) {
    if ($numero % 2 == 0) {
        return "Par";
    } else {
        return "Ímpar";
    }
}

// 4) Função para calcular o fatorial
function calcularFatorial($numero) {
    $fatorial = 1;

    for ($i = 1; $i <= $numero; $i++) {
        $fatorial *= $i;
    }

    return $fatorial;
}

// 5) Função para calcular o desconto
function calcularDesconto($valor, $porcentagem) {
    $desconto = $valor * ($porcentagem / 100);

    return $valor - $desconto;
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["somar"])) {
        $resultado = "Resultado da soma: " .
        somar($_POST["num1"], $_POST["num2"]);
    }

    if (isset($_POST["media"])) {
        $resultado = "Média: " .
        calcularMedia($_POST["num3"], $_POST["num4"], $_POST["num5"]);
    }

    if (isset($_POST["parimpar"])) {
        $resultado = "O número é: " .
        verificarParImpar($_POST["numero"]);
    }

    if (isset($_POST["fatorial"])) {
        $numero = (int) $_POST["fatorial_num"];

        if ($numero < 0) {
            $resultado = "Digite um número positivo.";
        } else {
            $resultado = "Fatorial: " .
            calcularFatorial($numero);
        }
    }

    if (isset($_POST["desconto"])) {
        $valor = (float) $_POST["valor"];
        $porcentagem = (float) $_POST["porcentagem"];

        if ($valor < 0 || $porcentagem < 0 || $porcentagem > 100) {
            $resultado = "Digite valores válidos para o desconto.";
        } else {
            $resultado = "Valor final da compra: R$ " .
            number_format(calcularDesconto($valor, $porcentagem), 2, ",", ".");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercícios de Funções</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Exercícios de Funções PHP</h1>

    <h2>1 - Soma de dois números</h2>
    <form method="POST">
        <input type="number" step="any" name="num1" placeholder="Primeiro número" required>
        <input type="number" step="any" name="num2" placeholder="Segundo número" required>
        <button type="submit" name="somar">Somar</button>
    </form>

    <h2>2 - Média de três números</h2>
    <form method="POST">
        <input type="number" step="any" name="num3" placeholder="Primeiro número" required>
        <input type="number" step="any" name="num4" placeholder="Segundo número" required>
        <input type="number" step="any" name="num5" placeholder="Terceiro número" required>
        <button type="submit" name="media">Calcular média</button>
    </form>

    <h2>3 - Par ou ímpar</h2>
    <form method="POST">
        <input type="number" name="numero" placeholder="Digite um número" required>
        <button type="submit" name="parimpar">Verificar</button>
    </form>

    <h2>4 - Fatorial de um número</h2>
    <form method="POST">
        <input type="number" min="0" name="fatorial_num" placeholder="Digite um número" required>
        <button type="submit" name="fatorial">Calcular fatorial</button>
    </form>

    <h2>5 - Desconto de uma compra</h2>
    <form method="POST">
        <input type="number" step="any" min="0" name="valor" placeholder="Valor da compra" required>
        <input type="number" step="any" min="0" max="100" name="porcentagem" placeholder="Desconto em %" required>
        <button type="submit" name="desconto">Calcular desconto</button>
    </form>

    <?php if ($resultado != ""): ?>
        <div class="resultado">
            <?php echo htmlspecialchars($resultado); ?>
        </div>
    <?php endif; ?>

    <a href="index.php">Voltar ao menu</a>

</div>

</body>
</html>
