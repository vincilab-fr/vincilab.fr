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
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="/vincilab/public/"><img src="../images/logo/logo-vinci.png" alt="VinciLab" height="40"></a>
            <a href="/vincilab/public/projet/soumettre" class="btn btn-primary" style="background-color: #387FF5; border-color: #387FF5;">Soumettre un projet</a>
        </div>

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
</body>
</html>
