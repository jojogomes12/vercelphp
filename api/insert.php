<?php
// Inclui o arquivo de conexão
require_once 'conn.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);  // Captura o valor do campo 'name'

    // Insere os dados no banco de dados
    try {
        $stmt = $db->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindValue(':name', $name);
        $stmt->execute();

        echo "Dados inseridos com sucesso!<br>";
    } catch (Exception $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

// Exibe os dados inseridos
$result = $db->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados na Tabela Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-voltar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn-voltar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Dados na tabela users:</h2>
    
    <!-- Tabela para exibir os dados -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Imprimindo os dados da tabela dentro da tabela HTML
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Botão Voltar -->
    <a href="javascript:history.back()" class="btn-voltar">Voltar</a>
</body>
</html>
