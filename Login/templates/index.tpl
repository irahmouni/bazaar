<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Je me connect</title>
</head>
<body>

   {if !isset($login)}
<form method="post" action="index.php">
            
<input type="text" name="login" required placeholder="Votre login">
<input type="password" name="mdp" required placeholder="Votre mot de passe">
<input type="submit" name="submit" value="Connecter">
</form>

    {else}
<a href="Deconnexion.php">Se déconnecter</a>

</body>
</html>

