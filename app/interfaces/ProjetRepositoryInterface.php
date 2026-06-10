<?php

interface ProjetRepositoryInterface {
    public function create(string $title, string $description, string $github_link, string $demo_link, int $user_id): bool;
    public function findAll(): array;
    public function findFeatured(): array;
    public function findByUserId(int $user_id): array;
    public function deleteById(int $id, int $user_id): bool;
}
