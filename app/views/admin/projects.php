<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets - VinciLab Admin</title>
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

        <h2 class="h5 fw-semibold mb-3">Projets en attente</h2>
        <?php if (empty($pending)) { ?>
            <p class="text-muted">Aucun projet en attente.</p>
        <?php } else { ?>
            <div class="table-responsive mb-5">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>GitHub</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pending as $project) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($project['title']); ?></td>
                                <td><?php echo htmlspecialchars($project['author']); ?></td>
                                <td><a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank">Voir</a></td>
                                <td><?php echo htmlspecialchars($project['created_at']); ?></td>
                                <td class="d-flex gap-2">
                                    <form method="POST" action="/vincilab/public/admin/projects/approve">
                                        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                        <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                                    </form>
                                    <form method="POST" action="/vincilab/public/admin/projects/reject">
                                        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <h2 class="h5 fw-semibold mb-3">Projets approuvés</h2>
        <?php if (empty($approved)) { ?>
            <p class="text-muted">Aucun projet approuvé.</p>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-bordered bg-white shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>GitHub</th>
                            <th>À la une</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($approved as $project) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($project['title']); ?></td>
                                <td><?php echo htmlspecialchars($project['author']); ?></td>
                                <td><a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank">Voir</a></td>
                                <td>
                                    <?php if ($project['featured']) { ?>
                                        <span class="badge bg-success">Oui</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary">Non</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($project['featured']) { ?>
                                        <form method="POST" action="/vincilab/public/admin/projects/unfeature">
                                            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                            <button type="submit" class="btn btn-outline-secondary btn-sm">Retirer de la une</button>
                                        </form>
                                    <?php } else { ?>
                                        <form method="POST" action="/vincilab/public/admin/projects/feature">
                                            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm">Mettre à la une</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

    </div>
</body>
</html>
