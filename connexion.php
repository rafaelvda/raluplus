<?php include('commun/database.php') ?>

<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : false;
    echo $action;
    if ($action == 'destroy') {
        session_destroy();
        header("Location: http://localhost/raluplus/index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
    <title>Connexion</title>
</head>
<body>
    <?php require 'commun/header.php'?>
    
    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <div class="container">
		<div class="card-header">
            <h2 class="text-center">Connexion</h2>
        </div>
        <div class="card mx-auto" style="width:40%;">
            <div class="card-body">
                <form method="post" action="connexion.php">
                    <?php include('errors.php'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="login_user">Se connecter</button>
                    </div>
                    <p class="text-center">
                        Pas encore membre ? <a href="inscription.php">Inscription</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

	<div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <?php require 'commun/footer.html'?>
</body>
</html>
