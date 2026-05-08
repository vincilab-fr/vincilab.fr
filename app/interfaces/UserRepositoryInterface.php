<?php

interface UserRepositoryInterface {
    public function findByEmail(string $email): array|false;
    public function create(string $name, string $email, string $password): bool;
}
