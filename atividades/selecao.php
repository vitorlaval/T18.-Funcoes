
<?php

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $sexo = $_POST["sexo"];
    $idade = (int) $_POST["idade"];

    if ($sexo == "feminino" && $idade < 25 && $idade >= 0) {
        $mensagem = "ACEITA";
    } else {
        $mensagem = "NÃO ACEITA";
    }

    $resultado = $nome . " - " . $mensagem;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificação de Aceitação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Verificação de Aceitação</h1>

    <form method="POST">

        <input type="text" name="nome"
        placeholder="Digite seu nome" required>

        <select name="sexo" required>
            <option value="">Selecione o sexo</option>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
        </select>

        <input type="number" name="idade" min="0"
        placeholder="Digite sua idade" required>

        <button type="submit">Verificar</button>

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
