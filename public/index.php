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
require '../app/interfaces/AdminRepositoryInterface.php';

// Repositories
require '../app/repositories/UserRepository.php';
require '../app/repositories/ProjetRepository.php';
require '../app/repositories/NewsletterRepository.php';
require '../app/repositories/AdminRepository.php';

// Controllers
require '../app/controllers/HomeController.php';
require '../app/controllers/AuthController.php';
require '../app/controllers/ProjetController.php';
require '../app/controllers/NewsletterController.php';
require '../app/controllers/AdminController.php';

// Construction des dépendances 
// PDO 
$pdo = Database::getInstance();

// Repositories (reçoivent PDO)
$userRepository       = new UserRepository($pdo);
$projetRepository     = new ProjetRepository($pdo);
$newsletterRepository = new NewsletterRepository($pdo);
$adminRepository      = new AdminRepository($pdo);

// Controllers (reçoivent leur repository)
$homeController       = new HomeController($projetRepository);
$authController       = new AuthController($userRepository);
$projetController     = new ProjetController($projetRepository);
$newsletterController = new NewsletterController($newsletterRepository);
$adminController      = new AdminController($adminRepository);

// Router ---
require '../router.php';
