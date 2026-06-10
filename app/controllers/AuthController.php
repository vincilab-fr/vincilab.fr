<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../interfaces/UserRepositoryInterface.php';

class AuthController extends Controller {

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function loginForm(): void {
        $this->view('login');
    }

    public function login(): void {
        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
        } else {
            $email = '';
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $password = '';
        }

        if (!empty($email) && !empty($password)) {
            $user = $this->userRepository->findByEmail($email);

            if (!$user) {
                $_SESSION['error'] = 'Email ou mot de passe incorrect';
                $this->redirect('/vincilab/public/login');
                return;
            }

            $passwordCorrect = password_verify($password, $user['password']);

            if (!$passwordCorrect) {
                $_SESSION['error'] = 'Email ou mot de passe incorrect';
                $this->redirect('/vincilab/public/login');
                return;
            }

            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name']  = $user['name'];
            $_SESSION['user_role']  = $user['role'];

            if ($user['role'] === 'admin') {
                $this->redirect('/vincilab/public/admin');
            } else {
                $this->redirect('/vincilab/public/');
            }
        } else {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            $this->redirect('/vincilab/public/login');
        }
    }

    public function registerForm(): void {
        $this->view('register');
    }

    public function register(): void {
        if (isset($_POST['name'])) {
            $name = trim($_POST['name']);
        } else {
            $name = '';
        }

        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
        } else {
            $email = '';
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $password = '';
        }

        if (!empty($email) && !empty($password) && !empty($name)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Adresse email invalide';
                $this->redirect('/vincilab/public/register');
                return;
            }

            if (strlen($password) < 8) {
                $_SESSION['error'] = 'Le mot de passe doit contenir au moins 8 caractères';
                $this->redirect('/vincilab/public/register');
                return;
            }

            $existingUser = $this->userRepository->findByEmail($email);

            if ($existingUser) {
                $_SESSION['error'] = 'Cet email est déjà utilisé';
                $this->redirect('/vincilab/public/register');
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $created = $this->userRepository->create($name, $email, $hashedPassword);

            if ($created) {
                $_SESSION['success'] = 'Inscription réussie, connectez-vous';
                $this->redirect('/vincilab/public/login');
            } else {
                $_SESSION['error'] = 'Erreur lors de l\'inscription';
                $this->redirect('/vincilab/public/register');
            }
        } else {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            $this->redirect('/vincilab/public/register');
        }
    }

    public function logout(): void {
        session_unset();
        session_destroy();
        $this->redirect('/vincilab/public/login');
    }
}
