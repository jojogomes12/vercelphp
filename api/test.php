<?php
// Definindo o nome do banco de dados SQLite
$dbName = 'meubanco.db';

// Verificando se o banco de dados já existe
if (!file_exists($dbName)) {
    // Criação do banco de dados SQLite
    $db = new SQLite3($dbName);
    
    // Criando a tabela 'usuarios' caso não exista
    $query = "CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL
    )";
    
    // Executando a criação da tabela
    $db->exec($query);
    
    echo "Banco de dados criado com sucesso!<br>";
} else {
    echo "Banco de dados já existe.<br>";
}

// Conectando ao banco de dados SQLite
$db = new SQLite3($dbName);

// Inserindo dados na tabela
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    // Inserindo um novo usuário na tabela
    $query = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    if ($db->exec($query)) {
        echo "Usuário '$nome' inserido com sucesso!<br>";
    } else {
        echo "Erro ao inserir usuário.<br>";
    }
}

// Consultando e exibindo os dados
echo "<h2>Usuários Cadastrados:</h2>";
$query = "SELECT * FROM usuarios";
$results = $db->query($query);

// Exibindo os dados cadastrados
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>";
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['nome'] . "</td>
            <td>" . $row['email'] . "</td>
          </tr>";
}
echo "</table>";

// Fechando a conexão com o banco de dados
$db->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados SQLite em PHP</title>
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>
    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
