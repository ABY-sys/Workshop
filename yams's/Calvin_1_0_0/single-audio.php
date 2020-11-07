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
                <img src="images/icons/yams.png" alt="Homepage">
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


    <!-- content
    ================================================== -->
  <!--  <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry format-standard">

                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/80822997&color=%23dedede&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
                        </div>
                    </div>-->



<br><br>



 <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="column">

                    <h3>
                    Ajouter un article
                   
                    </h3>

                    <form  method="POST">
                        <fieldset>

                            <div class="form-field" style="margin-left: auto; margin-right: auto;">
                                <input name="article_titre"  class="h-full-width" placeholder="titre" type="text"> <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['titre'] ?>"<?php } ?>
                            </div>

                            <!--<div class="form-field">
                                <input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                            </div>-->

                            <div class="message form-field">
                                <textarea name="article_contenu"  class="h-full-width h-remove-bottom" placeholder="Your Message"></textarea> <?php if($mode_edition == 1) { ?><?= 
      $edit_article['contenu'] ?><?php } ?>
                            </div>

                            <br>
                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="envoyer l'article" type="submit">
                             <br>
                 <?php if(isset($message))  { echo $message; } ?>



                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->




















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
                    <div class="ss-copyright">
                        <span>© Copyright Calvin 2020</span> 
                        <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                    </div> <!-- end ss-copyright -->
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