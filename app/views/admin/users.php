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
        .vl-header { border-bottom: 1px solid #e5e7eb; background: #fff; }
        .vl-header .inner { max-width: 1200px; margin: 0 auto; padding: 16px 40px; display: flex; justify-content: space-between; align-items: center; }
        .vl-logo { display: flex; align-items: center; gap: 8px; text-decoration: none; color: #111; font-weight: 600; font-size: 18px; }
        .vl-nav { display: flex; align-items: center; gap: 20px; }
        .vl-nav a.link { text-decoration: none; font-size: 16px; color: #4B5162; }
        .vl-nav a.link:hover { color: #387FF5; }
        .vl-btn-outline { padding: 10px 22px; background-color: transparent; border-radius: 5px; border: 1px solid #4B5162; color: #4B5162; font-family: 'Poppins', sans-serif; font-size: 14px; text-decoration: none; }
        .container { max-width: 1200px !important; padding-left: 40px !important; padding-right: 40px !important; }
    </style>
</head>
<body>
    <header class="vl-header">
        <div class="inner">
            <a href="/vincilab/public/admin" class="vl-logo">
                <img src="../../images/logo/logo-vinci.png" alt="VinciLab" height="32">
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
