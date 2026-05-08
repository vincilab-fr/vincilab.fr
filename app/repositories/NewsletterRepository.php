<?php

require_once __DIR__ . '/../interfaces/NewsletterRepositoryInterface.php';

class NewsletterRepository implements NewsletterRepositoryInterface {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function subscribe(string $email): bool {
        $stmt = $this->pdo->prepare('INSERT INTO newsletter (email) VALUES (:email)');
        return $stmt->execute(['email' => $email]);
    }
}
