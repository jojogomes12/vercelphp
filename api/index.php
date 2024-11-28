<?php
try {
    // Caminho absoluto para o banco de dados
    $db = new SQLite3('/tmp/meubanco.db');  // Altere o caminho conforme necessário

    // Criação da tabela, se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT)");

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);  // Captura o valor do campo 'name'

        // Insere os dados no banco de dados
        $stmt = $db->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindValue(':name', $name);
        $stmt->execute();

        echo "Dados inseridos com sucesso!<br>";
    }

    // Consultando os dados inseridos
    $result = $db->query("SELECT * FROM users");

    // Imprimindo os dados da tabela
    echo "<h2>Dados na tabela users:</h2>";
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "ID: " . $row['id'] . " - Nome: " . $row['name'] . "<br>";
    }
} catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com SQLite</title>
</head>
<body>
    <h1>Inserir Nome no Banco de Dados</h1>
    <form method="POST" action="">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
