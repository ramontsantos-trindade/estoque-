<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli('localhost', 'root', '', 'estoque');
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    die('Erro ao conectar com o banco de dados. Verifique o arquivo conexao.php.');
}
