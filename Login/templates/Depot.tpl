<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><h1>Faire un depot</h1></title>
</head>
<body>

<form method="post" action="EffectuerDepot.php">
  
<input type="number" name="montant" min="1" max="500" required value="1">

<select name="carte" required>
{foreach from=$utilisateur item=user}
<option value={$user["num_carte"]}>{$user["nom"]}</option>
{/foreach}
</select>

<input type="submit" name="submit" value="Effectuer le dépôt">
</form>

{if isset($login)}
    <a href="Deconnexion.php">Se déconnecter</a>
</body>
</html>