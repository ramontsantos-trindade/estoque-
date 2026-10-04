<?php
require 'conexao.php';
require 'validar.php';

$erros = [];
$nome = $categoria = $descricao = $preco = $quantidade = $validade = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome       = trim($_POST['nome'] ?? '');
    $categoria  = trim($_POST['categoria'] ?? '');
    $descricao  = trim($_POST['descricao'] ?? '');
    $preco      = str_replace(',', '.', trim($_POST['preco'] ?? ''));
    $quantidade = trim($_POST['quantidade'] ?? '');
    $validade   = trim($_POST['data_validade'] ?? '');

    $erros = validarProduto($nome, $categoria, $preco, $quantidade, $validade);

    if (empty($erros)) {
        try {
            $stmt = $conn->prepare(
                'INSERT INTO produtos (nome, categoria, descricao, preco, quantidade, data_validade)
                 VALUES (?, ?, ?, ?, ?, ?)'
            );
            $stmt->bind_param('sssdis', $nome, $categoria, $descricao, $preco, $quantidade, $validade);
            $stmt->execute();

            header('Location: index.php?msg=' . urlencode('Produto cadastrado com sucesso!'));
            exit;
        } catch (mysqli_sql_exception $e) {
            $erros[] = 'Erro ao salvar o produto. Tente novamente.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar produto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h1>Cadastrar produto</h1>

    <?php foreach ($erros as $erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endforeach; ?>

    <form method="post">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>">

        <label>Categoria</label>
        <input type="text" name="categoria" value="<?= htmlspecialchars($categoria) ?>">

        <label>Descrição</label>
        <textarea name="descricao"><?= htmlspecialchars($descricao) ?></textarea>

        <label>Preço (ex: 12,50)</label>
        <input type="text" name="preco" value="<?= htmlspecialchars($preco) ?>">

        <label>Quantidade em estoque</label>
        <input type="number" name="quantidade" min="0" value="<?= htmlspecialchars($quantidade) ?>">

        <label>Data de validade</label>
        <input type="date" name="data_validade" value="<?= htmlspecialchars($validade) ?>">

        <button type="submit" class="botao">Salvar</button>
        <a href="index.php">Cancelar</a>
    </form>
</div>
</body>
</html>
