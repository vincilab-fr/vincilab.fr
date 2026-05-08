<?php

require_once __DIR__ . '/../interfaces/UserRepositoryInterface.php';

class UserRepository implements UserRepositoryInterface {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): array|false {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function create(string $name, string $email, string $password): bool {
        $stmt = $this->pdo->prepare(
            'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)'
        );
        return $stmt->execute([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);
    }
}
