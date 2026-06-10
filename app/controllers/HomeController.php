<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../interfaces/ProjetRepositoryInterface.php';

class HomeController extends Controller {

    private ProjetRepositoryInterface $projetRepository;

    public function __construct(ProjetRepositoryInterface $projetRepository) {
        $this->projetRepository = $projetRepository;
    }

    public function index(): void {
        $featuredProjects = $this->projetRepository->findFeatured();
        $this->view('home', ['featuredProjects' => $featuredProjects]);
    }
}
