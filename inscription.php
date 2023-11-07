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

	<div class="header">
  		<h2>Inscription</h2>
  	</div>
    
    <form method="post" action="inscription.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nom d'utilisateur</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmer le mot de passe</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">S'inscrire</button>
  	</div>
  	<p>
  		Déjà membre ? <a href="connexion.php">Connexion</a>
  	</p>
  </form>

    <?php require 'commun/footer.html'?>
</body>
</html>