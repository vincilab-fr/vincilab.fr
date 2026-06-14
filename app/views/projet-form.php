<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre un projet - VinciLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 560px;">
            <div class="text-center mb-4">
                <a href="/vincilab/public/"><img src="../../images/logo/logo-vinci.png" alt="VinciLab" height="40"></a>
                <h1 class="h4 fw-semibold mt-3">Soumettre un projet</h1>
            </div>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php } ?>

            <form method="POST" action="/vincilab/public/projet/soumettre">
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lien GitHub</label>
                    <input type="url" name="github_link" class="form-control" placeholder="https://github.com/..." required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Lien Démo <span class="text-muted">(optionnel)</span></label>
                    <input type="url" name="demo_link" class="form-control" placeholder="https://...">
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #387FF5; border-color: #387FF5;">Soumettre</button>
            </form>

            <p class="text-center text-muted mt-3 mb-0">
                <a href="/vincilab/public/" style="color: #387FF5;">← Retour à l'accueil</a>
            </p>
        </div>
    </div>
</body>
</html>
