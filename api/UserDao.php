<?php
// UserDAO.php

include_once('conn.php');

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = (new DBConnection())->getConnection();
        // Criação da tabela, caso não exista
        $this->db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT)");
    }

    // Método para inserir um usuário
    public function insertUser($name) {
        $stmt = $this->db->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindValue(':name', $name);
        return $stmt->execute();
    }

    // Método para obter todos os usuários
    public function getAllUsers() {
        $result = $this->db->query("SELECT * FROM users");
        $users = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $users[] = $row;
        }
        return $users;
    }
}
?>
