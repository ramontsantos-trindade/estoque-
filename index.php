<?php
require 'conexao.php';

$mensagem = $_GET['msg'] ?? '';

try {
    $resultado = $conn->query('SELECT * FROM produtos ORDER BY nome');
} catch (mysqli_sql_exception $e) {
    die('Erro ao listar os produtos.');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Estoque</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h1>Gestão de Estoque</h1>

    <?php if ($mensagem): ?>
        <p class="sucesso"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <a class="botao" href="cadastrar.php">+ Novo produto</a>

    <table>
        <tr>
            <th>Nome</th><th>Categoria</th><th>Descrição</th>
            <th>Preço</th><th>Qtd.</th><th>Validade</th><th>Ações</th>
        </tr>
        <?php while ($p = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= htmlspecialchars($p['categoria']) ?></td>
            <td><?= htmlspecialchars($p['descricao']) ?></td>
            <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td><?= $p['quantidade'] ?></td>
            <td><?= date('d/m/Y', strtotime($p['data_validade'])) ?></td>
            <td>
                <a href="editar.php?id=<?= $p['id'] ?>">Editar</a> |
                <a href="excluir.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('Deseja excluir este produto?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
