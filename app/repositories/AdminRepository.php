<?php

require_once __DIR__ . '/../interfaces/AdminRepositoryInterface.php';

class AdminRepository implements AdminRepositoryInterface {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findPendingProjects(): array {
        $stmt = $this->pdo->query("SELECT projects.*, users.name as author FROM projects JOIN users ON projects.user_id = users.id WHERE projects.status = 'pending' ORDER BY projects.created_at DESC");
        return $stmt->fetchAll();
    }

    public function findApprovedProjects(): array {
        $stmt = $this->pdo->query("SELECT projects.*, users.name as author FROM projects JOIN users ON projects.user_id = users.id WHERE projects.status = 'approved' ORDER BY projects.created_at DESC");
        return $stmt->fetchAll();
    }

    public function approveProject(int $id): bool {
        $stmt = $this->pdo->prepare("UPDATE projects SET status = 'approved' WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function rejectProject(int $id): bool {
        $stmt = $this->pdo->prepare("UPDATE projects SET status = 'rejected' WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function featureProject(int $id): bool {
        $stmt = $this->pdo->prepare("UPDATE projects SET featured = 1 WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function unfeatureProject(int $id): bool {
        $stmt = $this->pdo->prepare("UPDATE projects SET featured = 0 WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function findAllUsers(): array {
        $stmt = $this->pdo->query('SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function deleteUser(int $id): bool {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
