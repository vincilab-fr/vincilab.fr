<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs - VinciLab Admin</title>
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
        <h1 class="h4 fw-semibold mb-4">Utilisateurs</h1>

        <div class="table-responsive">
            <table class="table table-bordered bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td>
                                <span class="badge <?php echo $user['role'] === 'admin' ? 'bg-primary' : 'bg-secondary'; ?>">
                                    <?php echo htmlspecialchars($user['role']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                            <td>
                                <?php if ($user['role'] !== 'admin') { ?>
                                    <form method="POST" action="/vincilab/public/admin/users/delete"
                                          onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
