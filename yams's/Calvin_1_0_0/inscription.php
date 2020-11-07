<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');

if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail2 = htmlspecialchars($_POST['mail2']);
		$motdepasse = sha1($_POST['motdepasse']);
		$motdepasse2 = sha1($_POST['motdepasse2']);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$num_tel = htmlspecialchars($_POST['num_tel']);
		$num_appart = htmlspecialchars($_POST['num_appart']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2']) AND !empty($_POST['nom'])AND !empty($_POST['prenom']) AND !empty($_POST['num_tel'])AND !empty($_POST['num_appart']))
	{
		
		$pseudolength = strlen($pseudo);
		if($pseudolength <= 250)
		{
			if($mail == $mail2)
			{
				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				{
					
			        $reqmail= $bdd ->prepare("SELECT * FROM espace WHERE mail = ?");
			        $reqmail->execute(array($mail));
			        $mailexist = $reqmail->rowCount();

			        if($mailexist == 0)
			        { 
						if ($motdepasse == $motdepasse2) 
								{
		$insertmbr = $bdd ->prepare("INSERT INTO espace(pseudo, mail, motdepasse,nom ,prenom, num_tel, num_appart ) VALUES(?, ?, ?, ?, ?, ?, ?)");
		$insertmbr ->execute(array($pseudo, $mail, $motdepasse, $nom, $prenom, $num_tel, $num_appart));
									$erreur= "Votre compte a bien été creer! <a href=\"connexion.php\"> Me connecter</a>";
								}

					else
					 {
					 	$erreur = "vos mot de passe ne correspondent pas";
					 }
					}
				}
				else{
					$erreur = "Votre adresse mail n'est pas valide";
				}
			}

			else{
	      	$erreur= "vos addressse mail ne correspondent pas";
	            }
            
		}
	       else
		       {
			$erreur = "votre pseudo ne doit pas depasser 250 carracteres";
		        }
	    

}
else
{
	$erreur = "tous les champs doivent etre completer";
}


}


?>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Audio Post - Calvin</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
        <div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
      <header class="s-header s-header--opaque" style=" background-color: #032001d4;">
        <div class="s-header__logo">
            <a class="logo" href="index.html">
                <img src="images/icons/yams.png"  alt="Homepage">
            </a>
        </div>

        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <li><a href="index.html" title="">Acceuil</a></li>
                   <!-- <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                            <li><a href="category.html">Design</a></li>
                            <li><a href="category.html">Lifestyle</a></li>
                            <li><a href="category.html">Photography</a></li>
                            <li><a href="category.html">Vacation</a></li>
                            <li><a href="category.html">Work</a></li>
                            <li><a href="category.html">Health</a></li>
                            <li><a href="category.html">Family</a></li>
                            <li><a href="category.html">Relationship</a></li>
                        </ul> -->
                    </li>
                    <li class="has-children current">
                        <a href="#0" title="">Annonces</a>
                        <ul class="sub-menu">
                            <li><a href="single-video.php">Voir une annonce</a></li>
                            <li><a href="single-audio.php">Publiée une annonce</a></li>
                        </ul>
                    </li>
                    <li><a href="jeux/Chifoumi-master/Chifoumi-master/index.html" title="">Jeux</a></li>
                    <li><a href="about.html" title="">Chat</a></li>
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <div class="s-header__search">

            <div class="s-header__search-inner">
                <div class="row wide">

                    <form role="search" method="get" class="s-header__search-form" action="#">
                        <label>
                            <span class="h-screen-reader-text">Search for:</span>
                            <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="s-header__search-submit" value="Search"> 
                    </form>

                    <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

                </div> <!-- end row -->
            </div> <!-- s-header__search-inner -->

        </div> <!-- end s-header__search wrap -->   

        <a class="s-header__search-trigger" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
        </a>
          <a href="connexion.php"><img src="images\icons\compte.png" width="40"  ></a>


    </header> <!-- end s-header -->


<body>
<br>
 <div class="column large-8 intro" style="margin-left: auto; margin-right: auto;">
 	<h3>Inscription</h3>
 	<form method="POST" >
 		<table>
 			<!--nom-->
 				<tr>
       <td align="center"> <label for="nom"><b>Nom</b></label></td>
      <td>  <input type="text" placeholder="Entrez votre mot de passe"  name="nom" id="nom" class="s-header__search-submit"></td>
        
</tr>

             <!--prenom-->
<tr>
       <td align="center"> <label for="prenom"><b>Prénom</b></label></td>
      <td>  <input type="text" placeholder="Entrez votre mot de passe"  name="prenom" id="prenom" class="s-header__search-submit"></td>
        
</tr>
                <!--pseudo-->

<tr>
 		<td align="center">
 			<label for="pseudo"><b>Pseudo :</b></label>
 		</td>
       <td> 
       	<input type="text" name="pseudo" id="pseudo" class="s-header__search-submit" placeholder="Entrez votre pseudo" value="<?php if(isset($pseudo)){echo $pseudo;} ?>"></td>
   </tr>


                 <!--mail-->
   <tr>
        <td align="center"><label for="mail"><b>Mail :</b></label></td>
      <td> 
       <input type="email" name="mail" id="mail" placeholder="Entrez votre mail" class="s-header__search-submit" value="<?php if(isset($mail)){echo $mail;} ?>"></td>
      
    </tr>
                         <!--confirmation d'address mail-->
         <tr>
        <td align="center">
        	<label for="mail2"><b>Confirmation d'addresse mail :</b></label></td>
      <td> 
       <input type="email" name="mail2" id="mail2" placeholder="Entrez votre mail"  class="s-header__search-submit" value="<?php if(isset($mail2)){echo $mail2;} ?>"></td>
        
    </tr>


                        <!--mdp-->
       <tr>
       <td align="center"> <label for="motdepasse"><b>Mot de Passe</b></label></td>
      <td>  <input type="password" placeholder="Entrez votre mot de passe" class="s-header__search-submit" name="motdepasse" id="motdepasse"></td>
  </tr>

                          <!-- confirm mdp-->
      <tr>
       <td align="center"> <label for="motdepasse2"><b>Confirmer votre Mot de Passe</b></label></td>
      <td>  <input type="password" placeholder="Entrez votre mot de passe" class="s-header__search-submit" name="motdepasse2" id="motdepasse2"></td>
      
</tr>
     <!--numero tel-->
          <tr>
       <td align="center"> <label for="num_tel"><b>Numéros Tel</b></label></td>
      <td>  <input type="text" placeholder="Entrez votre num tel" class="s-header__search-submit"  name="num_tel" id="num_tel"></td>
        
</tr>
                           <!--numeros app-->
<tr>
       <td align="center"> <label for="num_appart"><b>Numéros d'Appart</b></label></td>
      <td>  <input type="text" placeholder="Entrez votre numero d'Appart" class="s-header__search-submit" name="num_appart" id="num_appart"></td>
        
</tr>



	<td align="center">
		<input type="submit" name="forminscription" value="je m'inscris" class="s-header__search-submit">
	</td>
</tr>
</table>

</form>
<?php
if(isset($erreur))
{
	echo '<font color="red">' .$erreur. "</font>";
}
?>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">

                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <h5>A propos du site</h5>

                    <p>
                   Vous avez marre de la solitude ? Yams's est là pour vous sortir de votre détresse:). C'est une plateforme qui va vous permettre à connaitre vos voisins, Partager des annonces comme des soirées ou autres, Jouer à des jeux, Chatter entre Vous et pleins d'autres fonctionnalités qu'on vous laisse découvrir;).
                    </p>

                </div> <!-- end s-footer__info -->

                <div class="column large-2 medium-3 tab-6 s-footer__site-links">

                    <h5>Site Links</h5>

                    <ul>
                        <li><a href="#0">About Us</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">FAQ</a></li>
                        <li><a href="#0">Terms</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>

                </div> <!-- end s-footer__site-links -->  

                <div class="column large-2 medium-3 tab-6 s-footer__social-links">

                    <h5>Follow Us</h5>

                    <ul>
                        <li><a href="#0">Twitter</a></li>
                        <li><a href="#0">Facebook</a></li>
                        <li><a href="#0">Dribbble</a></li>
                        <li><a href="#0">Pinterest</a></li>
                        <li><a href="#0">Instagram</a></li>
                    </ul>

                </div> <!-- end s-footer__social links --> 

                <div class="column large-3 medium-6 tab-12 s-footer__subscribe">

                    <h5>Sign Up for Newsletter</h5>

                    <p>Signup to get updates on articles, interviews and events.</p>

                    <div class="subscribe-form">
                
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required=""> 
                
                            <input type="submit" name="subscribe" value="subscribe" >
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>





                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div> <!-- end row -->

        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="column">
                    <div class="ss-copycenter">
                        <span>© Copycenter Calvin 2020</span> 
                        <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                    </div> <!-- end ss-copycenter -->
                </div>
            </div> 

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
                </a>
            </div> <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

   </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>