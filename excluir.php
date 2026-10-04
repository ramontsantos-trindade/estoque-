<?php
require 'conexao.php';

$id = (int) ($_GET['id'] ?? 0);

try {
    $stmt = $conn->prepare('DELETE FROM produtos WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $msg = $stmt->affected_rows > 0 ? 'Produto excluído com sucesso!' : 'Produto não encontrado.';
} catch (mysqli_sql_exception $e) {
    $msg = 'Erro ao excluir o produto.';
}

header('Location: index.php?msg=' . urlencode($msg));
exit;

