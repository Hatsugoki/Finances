<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion</title>

    <style>
        body {
            background: linear-gradient(135deg, #d4f7d0, #a3e7b3);
            min-height: 100vh;
        }

        .login-wrapper {
            margin-top: 90px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-body {
            padding: 2rem;
        }

        h3 {
            color: #198754;
            font-weight: 700;
        }

        .btn-success {
            background-color: #198754;
            border: none;
            transition: background-color 0.2s;
        }

        .btn-success:hover {
            background-color: #157347;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }

        .alert-danger {
            background-color: #ffe0e0;
            color: #b52d2d;
            border: none;
        }
    </style>
</head>

<body>
    <?php include '../inc/header-page.php'; ?>

    <div class="container login-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Connexion</h3>
                        <form action="../inc/traitement-login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre identifiant" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100 mt-2">Se connecter</button>

                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-danger text-center mt-3">
                                    Identifiants incorrects.
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
