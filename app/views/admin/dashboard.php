<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - VinciLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #387FF5;">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="/vincilab/public/admin">VinciLab Admin</a>
            <div class="d-flex gap-3">
                <a href="/vincilab/public/admin/projects" class="btn btn-light btn-sm">Projets</a>
                <a href="/vincilab/public/admin/users" class="btn btn-light btn-sm">Utilisateurs</a>
                <a href="/vincilab/public/logout" class="btn btn-outline-light btn-sm">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="h4 fw-semibold mb-4">Tableau de bord</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <a href="/vincilab/public/admin/projects" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-semibold">Projets en attente</h5>
                            <p class="text-muted">Valider ou rejeter les projets soumis par les développeurs.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="/vincilab/public/admin/users" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-semibold">Utilisateurs</h5>
                            <p class="text-muted">Consulter et gérer les comptes utilisateurs.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
