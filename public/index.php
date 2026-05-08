<?php

session_start();

// Core
require '../app/config/config.php';
require '../app/core/Database.php';
require '../app/core/Controller.php';

// Interfaces
require '../app/interfaces/UserRepositoryInterface.php';
require '../app/interfaces/ProjetRepositoryInterface.php';
require '../app/interfaces/NewsletterRepositoryInterface.php';

// Repositories
require '../app/repositories/UserRepository.php';
require '../app/repositories/ProjetRepository.php';
require '../app/repositories/NewsletterRepository.php';

// Controllers
require '../app/controllers/HomeController.php';
require '../app/controllers/AuthController.php';
require '../app/controllers/ProjetController.php';
require '../app/controllers/NewsletterController.php';

// Construction des dépendances 
// PDO 
$pdo = Database::getInstance();

// Repositories (reçoivent PDO)
$userRepository       = new UserRepository($pdo);
$projetRepository     = new ProjetRepository($pdo);
$newsletterRepository = new NewsletterRepository($pdo);

// Controllers (reçoivent leur repository)
$homeController       = new HomeController();
$authController       = new AuthController($userRepository);
$projetController     = new ProjetController($projetRepository);
$newsletterController = new NewsletterController($newsletterRepository);

// Router ---
require '../router.php';
