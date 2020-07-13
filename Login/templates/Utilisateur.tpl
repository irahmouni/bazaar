<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<title>Inscription</title>
</head>
<body>

<form method="post" action="InscrireUtilisateur.php">

<input type="text" name="nom" required placeholder="Le nom de l'utilisateur">
<input type="submit" name="submit" value="Inscrire l'utilisateur">
</form>

{if isset($login)}
<a href="Deconnexion.php">Se déconnecter</a>

</body>
</html>

