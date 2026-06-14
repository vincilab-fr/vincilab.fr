<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes projets - VinciLab</title>
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
            <a href="/vincilab/public/" class="vl-logo">
                <img src="../images/logo/logo-vinci.png" alt="VinciLab" height="32">
                VinciLab
            </a>
            <div class="vl-nav">
                <a href="/vincilab/public/projet/soumettre" class="vl-btn-primary">Soumettre un projet</a>
                <a href="/vincilab/public/logout" class="vl-btn-outline">Déconnexion</a>
            </div>
        </div>
    </header>

    <div class="container py-5">

        <h1 class="h4 fw-semibold mb-4">Mes projets</h1>

        <?php if (empty($projets)) { ?>
            <p class="text-muted">Vous n'avez pas encore soumis de projet.</p>
            <a href="/vincilab/public/projet/soumettre" class="btn btn-primary mt-2" style="background-color: #387FF5; border-color: #387FF5;">Soumettre mon premier projet</a>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>GitHub</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projets as $projet) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($projet['title']); ?></td>
                                <td><?php echo htmlspecialchars($projet['description'] ?? ''); ?></td>
                                <td><a href="<?php echo htmlspecialchars($projet['github_link']); ?>" target="_blank" class="btn btn-outline-secondary btn-sm">GitHub</a></td>
                                <td>
                                    <?php if ($projet['status'] === 'approved') { ?>
                                        <span class="badge bg-success">Approuvé</span>
                                    <?php } elseif ($projet['status'] === 'rejected') { ?>
                                        <span class="badge bg-danger">Rejeté</span>
                                    <?php } else { ?>
                                        <span class="badge bg-warning text-dark">En attente</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form method="POST" action="/vincilab/public/mes-projets/supprimer"
                                          onsubmit="return confirm('Supprimer ce projet ?')">
                                        <input type="hidden" name="id" value="<?php echo $projet['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
