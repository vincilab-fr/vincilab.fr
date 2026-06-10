<?php

require_once __DIR__ . '/../interfaces/ProjetRepositoryInterface.php';

class ProjetRepository implements ProjetRepositoryInterface {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(string $title, string $description, string $github_link, string $demo_link, int $user_id): bool {
        $stmt = $this->pdo->prepare(
            'INSERT INTO projects (title, description, github_link, demo_link, user_id) VALUES (:title, :description, :github_link, :demo_link, :user_id)'
        );
        return $stmt->execute([
            'title'       => $title,
            'description' => $description,
            'github_link' => $github_link,
            'demo_link'   => $demo_link ?: null,
            'user_id'     => $user_id,
        ]);
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM projects WHERE status = 'approved' ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function findFeatured(): array {
        $stmt = $this->pdo->query("SELECT * FROM projects WHERE status = 'approved' AND featured = 1 ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function findByUserId(int $user_id): array {
        $stmt = $this->pdo->prepare('SELECT * FROM projects WHERE user_id = :user_id ORDER BY created_at DESC');
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll();
    }

    public function deleteById(int $id, int $user_id): bool {
        $stmt = $this->pdo->prepare('DELETE FROM projects WHERE id = :id AND user_id = :user_id');
        return $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
