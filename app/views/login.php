<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - VinciLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 420px;">
            <div class="text-center mb-4">
                <a href="/vincilab/public/"><img src="../images/logo/logo-vinci.png" alt="VinciLab" height="40"></a>
                <h1 class="h4 fw-semibold mt-3">Connexion</h1>
            </div>

            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php } ?>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php } ?>

            <form method="POST" action="/vincilab/public/login">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #387FF5; border-color: #387FF5;">Se connecter</button>
            </form>

            <p class="text-center text-muted mt-3 mb-0">
                Pas encore de compte ? <a href="/vincilab/public/register" style="color: #387FF5;">S'inscrire</a>
            </p>
        </div>
    </div>
</body>
</html>
