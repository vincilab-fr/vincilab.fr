<?php

require_once __DIR__ . '/../interfaces/ProjetRepositoryInterface.php';

class ProjetRepository implements ProjetRepositoryInterface {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(string $title, string $description, string $github_link, int $user_id): bool {
        $stmt = $this->pdo->prepare(
            'INSERT INTO projects (title, description, github_link, user_id) VALUES (:title, :description, :github_link, :user_id)'
        );
        return $stmt->execute([
            'title'       => $title,
            'description' => $description,
            'github_link' => $github_link,
            'user_id'     => $user_id,
        ]);
    }

    public function findAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM projects ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }
}
