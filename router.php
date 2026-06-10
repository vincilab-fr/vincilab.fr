<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/vincilab/public';
$request  = str_replace($basePath, '', $request);
$request  = str_replace('/index.php', '', $request);

$method = $_SERVER['REQUEST_METHOD'];
$route  = $method . ' ' . $request;

switch ($route) {
    case 'GET /':
        $homeController->index();
        break;

    case 'GET /login':
        $authController->loginForm();
        break;

    case 'POST /login':
        $authController->login();
        break;

    case 'GET /register':
        $authController->registerForm();
        break;

    case 'POST /register':
        $authController->register();
        break;

    case 'GET /logout':
    case 'POST /logout':
        $authController->logout();
        break;

    case 'POST /newsletter':
        $newsletterController->subscribe();
        break;

    case 'GET /projet/soumettre':
        $projetController->submitForm();
        break;

    case 'POST /projet/soumettre':
        $projetController->submit();
        break;

    case 'GET /projets':
        $projetController->list();
        break;

    case 'GET /mes-projets':
        $projetController->myProjects();
        break;

    case 'POST /mes-projets/supprimer':
        $projetController->deleteProject();
        break;

    case 'GET /admin':
    case 'GET /admin/':
        $adminController->dashboard();
        break;

    case 'GET /admin/projects':
        $adminController->projects();
        break;

    case 'POST /admin/projects/approve':
        $adminController->approveProject();
        break;

    case 'POST /admin/projects/reject':
        $adminController->rejectProject();
        break;

    case 'POST /admin/projects/feature':
        $adminController->featureProject();
        break;

    case 'POST /admin/projects/unfeature':
        $adminController->unfeatureProject();
        break;

    case 'GET /admin/users':
        $adminController->users();
        break;

    case 'POST /admin/users/delete':
        $adminController->deleteUser();
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
