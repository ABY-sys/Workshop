<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');
if(isset($_SESSION['id']))
{
      $requser = $bdd->prepare('SELECT * FROM espace WHERE id =?');
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();

      //pseudo
      if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND $_POST['pseudo'] != $user['pseudo'])
      {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $insertpseudo =  $bdd->prepare('UPDATE espace SET pseudo = ? WHERE id =?');
        $insertpseudo->execute(array($pseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }

      //email
      if(isset($_POST['mail']) AND !empty($_POST['mail']) AND $_POST['mail'] != $user['mail'])
      {
        $mail = htmlspecialchars($_POST['mail']);
        $insertmail =  $bdd->prepare('UPDATE espace SET pseudo = ? WHERE id =?');
        $insertmail->execute(array($mail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }

       //nom
      if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $user['nom'])
      {
        $nom = htmlspecialchars($_POST['nom']);
        $insertnom =  $bdd->prepare('UPDATE espace SET nom = ? WHERE id =?');
        $insertnom->execute(array($nom, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }
      //prenom
      if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $user['prenom'])
      {
        $prenom = htmlspecialchars($_POST['prenom']);
        $insertprenom =  $bdd->prepare('UPDATE espace SET prenom = ? WHERE id =?');
        $insertprenom->execute(array($prenom, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }


      //num_tel
      if(isset($_POST['num_tel']) AND !empty($_POST['num_tel']) AND $_POST['num_tel'] != $user['num_tel'])
      {
        $num_tel = htmlspecialchars($_POST['num_tel']);
        $insertnum_tel =  $bdd->prepare('UPDATE espace SET num_tel = ? WHERE id =?');
        $insertnum_tel->execute(array($num_tel, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }
      //num_appart
      if(isset($_POST['num_appart']) AND !empty($_POST['num_appart']) AND $_POST['num_appart'] != $user['num_appart'])
      {
        $num_appart = htmlspecialchars($_POST['num_appart']);
        $insertnum_appart =  $bdd->prepare('UPDATE espace SET num_appart = ? WHERE id =?');
        $insertnum_appart->execute(array($num_appart, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
      }

      //mot de passe
      if(isset($_POST['motdepasse1']) AND isset($_POST['motdepasse2']) AND !empty($_POST['motdepasse2']))
      {

        $motdepasse1 = sha1($_POST['motdepasse1']);
        $motdepasse2 = sha1($_POST['motdepasse2']);

        if($motdepasse1 == $motdepasse2)

           {
               $insertmotdepasse = $bdd->prepare('UPDATE espace SET motdepasse = ? WHERE id = ? ');
               $insertmotdepasse->execute(array($motdepasse1, $_SESSION['id']));
                header('Location: profil.php?id='.$_SESSION['id']);
           }

            else
            {
              $msg = "vos deux mot de passe ne correspondent pas!";
            }

       }

      if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
      {
        $tailleMax = 2097152;
        $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['avatar']['size'] <= $tailleMax)
        {
           $extensionUpload = strtolower(substr(strchr($_FILES['avatar']['name'], '.'), 1));
           if(in_array($extensionUpload, $extensionValide))
           {
              $chemin ="images/avatars/".$_SESSION['id'].".".$extensionUpload;
              $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
              if($resultat)
              {
                   $updateavatar = $bdd->prepare('UPDATE espace SET avatar= :avatar WHERE id = :id');
                   $updateavatar->execute(array(

                        'avatar'=> $_SESSION['id'].".".$extensionUpload,
                        'id' => $_SESSION['id']
                   ));
                     header('Location: profil.php?id='.$_SESSION['id']);
              }
              else
              {
                $msg =" erreur durant l'importation de votre photo de profil";
              }
           }
           else{
            $msg = "votre photo de profil doit etre au format jpg, gif, png ou jpeg";
           }
        }
        else
        {
          $msg = "Votre photo de profil ne doit depasser de 2Mo! ";
        }
      }
       /*if(isset($_POST['pseudo'] )AND$_POST['pseudo'] == $user['pseudo'])
       {
         header('Location: profile.php?id='.$_SESSION['id']);
       }*/
      

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Edition du Profil</title>
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

  <br><br>
 <div align="center">
  <h2>Edition de mon profil</h2>
  <br><br>
 <form method="POST" action="" enctype="multipart/form-data">

 <label>Nom:</label>
   <input type="text" name="nom" placeholder="pseudo" value="<?php echo $user['nom']; ?>" ><br><br>


 <label>Prénom:</label>
   <input type="text" name="prenom" placeholder="pseudo" value="<?php echo $user['prenom']; ?>" ><br><br>


  <label>Pseudo:</label>
   <input type="text" name="pseudo" placeholder="pseudo" value="<?php echo $user['pseudo']; ?>" ><br><br>

   <label>Mail:</label>
   <input type="email" name="mail" placeholder="mail" value="<?php echo $user['mail']; ?>"><br><br>

    <label>Mot de passe:</label>
   <input type="password" name="motdepasse1" placeholder="motdepasse"><br><br>

  <label>Confirmation du mot de passe:</label>
   <input type="password" name="motdepasse2" placeholder="confirmation motdepasse"><br><br>

  <label>Numeros de telephone:</label>
   <input type="text" name="num_tel" placeholder="numeros de tel"><br><br>

  <label>Numeros Appartement:</label>
   <input type="text" name="num_appart" placeholder="numeros d'Appartement"><br><br>
   
  
  
  <label> Avatar:</label>
   <input type="file" name="avatar">
   
   <input type="submit" value="mettre à jour mon profil"><br><br>
 </form>
 <?php if(isset($msg)) {echo $msg;}?>
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
else
{
  header("Location: connexion.php");
}
?>