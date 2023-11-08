<?php include('commun/database.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
    <title>Inscription</title>
</head>
<body>
    <?php require 'commun/header.php'?>

    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <div class="container">
		<p class="fs-2 text-white text-center">Inscription</p>
        <div class="card mx-auto" style="width:40%;">
            <div class="card-body">
                <form method="post" action="inscription.php">
                    <?php include('errors.php'); ?>
                    <div class="mb-2">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-2">
                        <label for="password_1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password_1" name="password_1">
                    </div>
                    <div class="mb-2">
                        <label for="password_2" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_2" name="password_2">
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary" name="reg_user">S'inscrire</button>
                    </div>
                    <p class="text-center">
                        Déjà membre ? <a href="connexion.php">Connexion</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php require 'commun/footer.html'?>
</body>
</html>
