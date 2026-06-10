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
    </style>
</head>
<body>
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="/vincilab/public/"><img src="../images/logo/logo-vinci.png" alt="VinciLab" height="40"></a>
            <a href="/vincilab/public/projet/soumettre" class="btn btn-primary" style="background-color: #387FF5; border-color: #387FF5;">Soumettre un projet</a>
        </div>

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
                                <td><a href="<?php echo htmlspecialchars($projet['github_link']); ?>" target="_blank">Voir</a></td>
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
</body>
</html>
