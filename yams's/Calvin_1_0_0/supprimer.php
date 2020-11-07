<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	
	$suppr_id= htmlspecialchars($_GET['id']);
	
 $suppr =$bdd->prepare('DELETE FROM annonce WHERE id=?');
	$suppr->execute(array($suppr_id));
	header('Location:single-video.php');
}

?>