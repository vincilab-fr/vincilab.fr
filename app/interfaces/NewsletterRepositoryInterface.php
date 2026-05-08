<?php

interface NewsletterRepositoryInterface {
    public function subscribe(string $email): bool;
}
