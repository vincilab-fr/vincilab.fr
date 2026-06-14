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
        .vl-header { border-bottom: 1px solid #e5e7eb; background: #fff; }
        .vl-header .inner { max-width: 1200px; margin: 0 auto; padding: 16px 40px; display: flex; justify-content: space-between; align-items: center; }
        .vl-logo { display: flex; align-items: center; gap: 8px; text-decoration: none; color: #111; font-weight: 600; font-size: 18px; }
        .vl-nav { display: flex; align-items: center; gap: 20px; }
        .vl-nav a.link { text-decoration: none; font-size: 16px; color: #4B5162; }
        .vl-nav a.link:hover { color: #387FF5; }
        .vl-btn-primary { padding: 10px 22px; background-color: #387FF5; border-radius: 5px; color: #fff; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; font-size: 14px; text-decoration: none; }
        .vl-btn-outline { padding: 10px 22px; background-color: transparent; border-radius: 5px; border: 1px solid #4B5162; color: #4B5162; cursor: pointer; font-family: 'Poppins', sans-serif; font-size: 14px; text-decoration: none; }
        .container { max-width: 1200px !important; padding-left: 40px !important; padding-right: 40px !important; }
    </style>
</head>
<body>
    <header class="vl-header">
        <div class="inner">
            <a href="/vincilab/public/admin" class="vl-logo">
                <img src="../images/logo/logo-vinci.png" alt="VinciLab" height="32">
                VinciLab
            </a>
            <div class="vl-nav">
                <a href="/vincilab/public/admin/projects" class="link">Projets</a>
                <a href="/vincilab/public/admin/users" class="link">Utilisateurs</a>
                <a href="/vincilab/public/logout" class="vl-btn-outline">Déconnexion</a>
            </div>
        </div>
    </header>

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
