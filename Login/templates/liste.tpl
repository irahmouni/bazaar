<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste utilisateurs</title>
</head>
<body>

    {foreach from=$utilisateur item=user}
    <tr>
    <td>{$user["nom"]}</td>
    <td>{$user["num_carte"]}</td>
    <td>{$user["lib_categ"]}</td>
    <td>{$user["date_carte"]}</td>
    <td>{$user["mt_caution"]}</td>
    </tr>
    {/foreach}

{if isset($login)}
    <a href="Deconnexion.php">Se déconnecter</a>

</body>
</html>