<?php

interface AdminRepositoryInterface {
    public function findPendingProjects(): array;
    public function findApprovedProjects(): array;
    public function approveProject(int $id): bool;
    public function rejectProject(int $id): bool;
    public function featureProject(int $id): bool;
    public function unfeatureProject(int $id): bool;
    public function findAllUsers(): array;
    public function deleteUser(int $id): bool;
}
