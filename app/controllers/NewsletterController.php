<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../interfaces/NewsletterRepositoryInterface.php';

class NewsletterController extends Controller {

    private NewsletterRepositoryInterface $newsletterRepository;

    public function __construct(NewsletterRepositoryInterface $newsletterRepository) {
        $this->newsletterRepository = $newsletterRepository;
    }

    public function subscribe(): void {
        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
        } else {
            $email = '';
        }

        $emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$emailValide) {
            $_SESSION['error'] = 'Email invalide';
            $this->redirect('/vincilab/public/');
            return;
        }

        $inscrit = $this->newsletterRepository->subscribe($email);

        if ($inscrit) {
            $_SESSION['success'] = 'Inscription newsletter réussie';
        } else {
            $_SESSION['error'] = 'Erreur lors de l\'inscription';
        }

        $this->redirect('/vincilab/public/');
    }
}
