<?php
try {
    // Caminho absoluto para o banco de dados
    $db = new SQLite3('/tmp/meubanco.db');  // Altere o caminho conforme necessário

    // Criação da tabela, se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT)");
    echo "Conexao bem sucedida";
    // Retorna a conexão para ser utilizada em outros arquivos
    return $db;
} catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}
?>
