<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');
$mode_edition =0;


if(isset($_GET['edit']) AND !empty($_GET['edit'])){
	$mode_edition =1;
	$edit_id= htmlspecialchars($_GET['edit']);
	$edit_article= $bdd->prepare('SELECT * FROM annonce WHERE id= ?');
	$edit_article->execute(array($edit_id));

	if($edit_article->rowCount() == 1){
         
         $edit_article= $edit_article->fetch();

	}else{
		die('Erreur: l\'article  n\'exise pas....');
	}
}

if(isset($_POST['article_titre'], $_POST['article_contenu'])){
   if (!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
         $article_titre = htmlspecialchars($_POST['article_titre']);
         $article_contenu = htmlspecialchars($_POST['article_contenu']);



if($mode_edition == 0) {
          $ins = $bdd->prepare('INSERT INTO annonce(titre, contenu, date_time_publication) VALUES (?, ?, NOW())');
           $ins->execute(array($article_titre, $article_contenu));
            $message = 'Votre article a bien étè posté';
      } else {
         $update = $bdd->prepare('UPDATE annonce SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($article_titre, $article_contenu, $edit_id));
         header('Location: article.php?id='.$edit_id);
         $message = 'Votre article a bien été mis à jour !';
      }

          
   	
   }else
   {
   	$erreur = 'Veuillez remplir tous les champs';
   }

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Rédaction / Edition</title>
	<meta charset="utf-8">
</head>
<body>
              <form method="POST">
              	
              	<input name="article_titre" type="text" placeholder="titre" <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['titre'] ?>"<?php } ?>>
              	<br>
              	<textarea name="article_contenu" placeholder="Contenu de l'article" >
              		<?php if($mode_edition == 1) { ?><?= 
      $edit_article['contenu'] ?><?php } ?>
              	</textarea>
              	<input type="submit" value="envoyer l'article">
              </form>
                 <br>
                 <?php if(isset($message))  { echo $message; } ?>
</body>
</html>