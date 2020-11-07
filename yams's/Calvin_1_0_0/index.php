<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');

$annonce = $bdd->query('SELECT * FROM annonce ORDER BY date_time_publication DESC');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
</head>
<body>
	<ul>
		<?php while($a = $annonce->fetch()) { ?>
             	<li><a href="article.php?id=<?= $a['id']?><?= $a['titre'] ?>"></a><a href="redaction.php?edit=<?=$a['id']?>">Modifier</a> | <a href="supprimer.php?id=<?=$a['id']?>">Supprimer</a></li>
       <?php }  ?></ul>
       <ul></ul>

</body>
</html>