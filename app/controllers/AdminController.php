<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../interfaces/AdminRepositoryInterface.php';

class AdminController extends Controller {

    private AdminRepositoryInterface $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository) {
        $this->adminRepository = $adminRepository;
    }

    private function requireAdmin(): void {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            $this->redirect('/vincilab/public/login');
        }
    }

    public function dashboard(): void {
        $this->requireAdmin();
        $this->view('admin/dashboard');
    }

    public function projects(): void {
        $this->requireAdmin();
        $pending  = $this->adminRepository->findPendingProjects();
        $approved = $this->adminRepository->findApprovedProjects();
        $this->view('admin/projects', ['pending' => $pending, 'approved' => $approved]);
    }

    public function approveProject(): void {
        $this->requireAdmin();
        $id = (int) $_POST['id'];
        $this->adminRepository->approveProject($id);
        $this->redirect('/vincilab/public/admin/projects');
    }

    public function rejectProject(): void {
        $this->requireAdmin();
        $id = (int) $_POST['id'];
        $this->adminRepository->rejectProject($id);
        $this->redirect('/vincilab/public/admin/projects');
    }

    public function users(): void {
        $this->requireAdmin();
        $users = $this->adminRepository->findAllUsers();
        $this->view('admin/users', ['users' => $users]);
    }

    public function deleteUser(): void {
        $this->requireAdmin();
        $id = (int) $_POST['id'];
        $this->adminRepository->deleteUser($id);
        $this->redirect('/vincilab/public/admin/users');
    }

    public function featureProject(): void {
        $this->requireAdmin();
        $id = (int) $_POST['id'];
        $this->adminRepository->featureProject($id);
        $this->redirect('/vincilab/public/admin/projects');
    }

    public function unfeatureProject(): void {
        $this->requireAdmin();
        $id = (int) $_POST['id'];
        $this->adminRepository->unfeatureProject($id);
        $this->redirect('/vincilab/public/admin/projects');
    }
}
