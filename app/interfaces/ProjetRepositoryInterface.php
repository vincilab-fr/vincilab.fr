<?php

interface ProjetRepositoryInterface {
    public function create(string $title, string $description, string $github_link, int $user_id): bool;
    public function findAll(): array;
}
