<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../interfaces/ProjetRepositoryInterface.php';

class ProjetController extends Controller {

    private ProjetRepositoryInterface $projetRepository;

    public function __construct(ProjetRepositoryInterface $projetRepository) {
        $this->projetRepository = $projetRepository;
    }

    public function submitForm(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/vincilab/public/login');
            return;
        }

        $this->view('projet-form');
    }

    public function submit(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/vincilab/public/login');
            return;
        }

        if (isset($_POST['title'])) {
            $title = trim($_POST['title']);
        } else {
            $title = '';
        }

        if (isset($_POST['description'])) {
            $description = trim($_POST['description']);
        } else {
            $description = '';
        }

        if (isset($_POST['github_link'])) {
            $github_link = trim($_POST['github_link']);
        } else {
            $github_link = '';
        }

        if (isset($_POST['demo_link'])) {
            $demo_link = trim($_POST['demo_link']);
        } else {
            $demo_link = '';
        }

        if ($title === '') {
            $_SESSION['error'] = 'Le titre est obligatoire';
            $this->redirect('/vincilab/public/projet/soumettre');
            return;
        }

        $user_id = $_SESSION['user_id'];
        $cree = $this->projetRepository->create($title, $description, $github_link, $demo_link, $user_id);

        if ($cree) {
            $_SESSION['success'] = 'Projet soumis avec succès';
            $this->redirect('/vincilab/public/projets');
        } else {
            $_SESSION['error'] = 'Erreur lors de la soumission';
            $this->redirect('/vincilab/public/projet/soumettre');
        }
    }

    public function list(): void {
        $projets = $this->projetRepository->findAll();
        $this->view('projets', ['projets' => $projets]);
    }

    public function myProjects(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/vincilab/public/login');
            return;
        }
        $projets = $this->projetRepository->findByUserId($_SESSION['user_id']);
        $this->view('mes-projets', ['projets' => $projets]);
    }

    public function deleteProject(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/vincilab/public/login');
            return;
        }
        $id = (int) $_POST['id'];
        $this->projetRepository->deleteById($id, $_SESSION['user_id']);
        $this->redirect('/vincilab/public/mes-projets');
    }
}
