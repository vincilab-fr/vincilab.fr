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

    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
