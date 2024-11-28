<?php
try {
    // Caminho absoluto para o banco de dados
    $db = new SQLite3('/tmp/meubanco.db');  // Altere o caminho conforme necessário

    // Criação da tabela, se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT)");

    // Inserção de dados
    $stmt = $db->prepare("INSERT INTO users (name) VALUES (:name)");
    $stmt->bindValue(':name', 'João');
    $stmt->execute();

    echo "Banco de dados e dados inseridos com sucesso!<br>";

    // Consultando os dados inseridos
    $result = $db->query("SELECT * FROM users");
    
    // Imprimindo os dados da tabela
    echo "Dados na tabela users:<br>";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . "<br>";
    }
} catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
