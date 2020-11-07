<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');
if (isset($_GET['id'])AND $_GET['id']> 0)
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM espace WHERE id =?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Profil</title>
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

        <div class="logo">
            <a class="logo" href="index.html"><br><br>
                <img src="images\icons\yams.png" width="200" alt="Homepage">
            </a>
        </div>

        <div class="row s-header__navigation" >

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>
                <ul class="s-header__nav">
                    <li class="current"><a href="index.html" title="">Acceuil</a></li>
                    <!--<li class="has-children">
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
                        </ul>
                    </li> -->
                    <li class="has-children">
                        <a href="#0" title="">Annonces</a>
                        <ul class="sub-menu">
                            <li><a href="single-video.php">Voir une annonce</a></li>
                            <li><a href="single-audio.php">Publier une annonce</a></li>
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
 <div align="center">
 	<h3>Profil de <?php echo $userinfo['pseudo']; ?></h3>
 	<br><br>

  <?php
if(!empty($userinfo['avatar']))
{


?>
<img src="images/avatars/<?php echo $userinfo['avatar']; ?>" width="150">
<?php
}
?>


  <br>
 <p class="h-full-width"> Pseudo =  <?php echo $userinfo['pseudo']; ?></p>

 <p> Mail = <?php echo $userinfo['mail']; ?></p>
 
 <p class="h-full-width"> Prenom = <?php echo $userinfo['prenom']; ?></p>
  
  <p class="h-full-width"> Nom= <?php echo $userinfo['nom'];?></p>
  
<p class="h-full-width">  Numero tel =<?php echo $userinfo['num_tel'];?></p>

<p class="h-full-width">  Numero Appartement= <?php echo $userinfo['num_appart'];?></p>

  




<?php
if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
{
  ?>
  <a href="edition_profil.php">Editer mon profil</a>
    <a href="deconnexion.php">se deconnecter</a>
  <?php
}
?>
</div>

 <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
<?php
}
?>

