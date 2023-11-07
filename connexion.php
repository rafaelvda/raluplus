<?php include('commun/database.php') ?>

<?php
	$action = isset($_GET["action"]) ? $_GET["action"] : false;
	echo $action;
	if($action == 'destroy'){
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

    <div class="header">
  	    <h2>Connexion</h2>
    </div>

    <form method="post" action="connexion.php">
  	    <?php include('errors.php'); ?>
  	    <div class="input-group">
  		    <label>Nom d'utilisateur</label>
  		    <input type="text" name="username" >
  	    </div>
  	    <div class="input-group">
  		    <label>Mot de passe</label>
  		    <input type="password" name="password">
  	    </div>
  	    <div class="input-group">
  		    <button type="submit" class="btn" name="login_user">Se connecter</button>
  	    </div>
  	    <p>
  		    Pas encore membre ? <a href="inscription.php">Inscription</a>
  	    </p>
    </form>

    <?php require 'commun/footer.html'?>
</body>
</html>