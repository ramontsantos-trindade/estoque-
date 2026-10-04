<?php
function validarProduto($nome, $categoria, $preco, $quantidade, $validade)
{
    $erros = [];

    if (strlen($nome) < 2 || strlen($nome) > 100) {
        $erros[] = 'O nome deve ter entre 2 e 100 caracteres.';
    }
    if ($categoria === '') {
        $erros[] = 'Informe a categoria.';
    }
    if (!is_numeric($preco) || $preco < 0) {
        $erros[] = 'O preço deve ser um número maior ou igual a zero.';
    }
    if (filter_var($quantidade, FILTER_VALIDATE_INT) === false || $quantidade < 0) {
        $erros[] = 'A quantidade deve ser um número inteiro maior ou igual a zero.';
    }
    $d = DateTime::createFromFormat('Y-m-d', $validade);
    if (!$d || $d->format('Y-m-d') !== $validade) {
        $erros[] = 'Informe uma data de validade válida.';
    }

    return $erros;
}
