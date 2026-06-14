<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets - VinciLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand" href="/vincilab/public/">
                <img src="../images/logo/logo-vinci.png" alt="VinciLab" height="36">
            </a>
            <div class="d-flex gap-2 align-items-center">
                <a href="/vincilab/public/projets" class="nav-link text-dark">Projets</a>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <a href="/vincilab/public/mes-projets" class="nav-link text-dark">Mes projets</a>
                    <a href="/vincilab/public/projet/soumettre" class="btn btn-primary btn-sm" style="background-color: #387FF5; border-color: #387FF5;">Soumettre</a>
                    <a href="/vincilab/public/logout" class="btn btn-outline-secondary btn-sm">Déconnexion</a>
                <?php } else { ?>
                    <a href="/vincilab/public/login" class="btn btn-outline-secondary btn-sm">Se connecter</a>
                    <a href="/vincilab/public/register" class="btn btn-primary btn-sm" style="background-color: #387FF5; border-color: #387FF5;">S'inscrire</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        <h1 class="h4 fw-semibold mb-4">Projets</h1>

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php } ?>

        <?php if (empty($projets)) { ?>
            <p class="text-muted">Aucun projet pour l'instant.</p>
        <?php } else { ?>
            <div class="row g-4">
                <?php foreach ($projets as $projet) { ?>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold"><?php echo htmlspecialchars($projet['title']); ?></h5>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($projet['description']); ?></p>
                            </div>
                            <div class="card-footer bg-white border-0 pb-3">
                                <a href="<?php echo htmlspecialchars($projet['github_link']); ?>" target="_blank" class="btn btn-outline-secondary btn-sm">Code</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

    <footer class="border-top bg-white mt-auto py-5">
        <div class="container d-flex justify-content-between align-items-start flex-wrap gap-4">
            <a href="/vincilab/public/" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                <img src="../images/logo/logo-vinci.png" alt="VinciLab" height="32">
                <span class="fw-semibold">VinciLab</span>
            </a>
            <div>
                <p class="fw-semibold mb-3" style="color: #387FF5;">Ressources</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">GitHub</a></li>
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">Contact</a></li>
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">Copyright</a></li>
                </ul>
            </div>
            <div>
                <p class="fw-semibold mb-3" style="color: #387FF5;">Légal</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">Mentions légales</a></li>
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">CGU</a></li>
                    <li class="mb-2"><a href="" class="text-muted text-decoration-none">Politique de confidentialité</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
