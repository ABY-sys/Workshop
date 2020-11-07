<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espacemembre','root','');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM annonce WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $contenu = $article['contenu'];
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Appuie encore sur l\'url tu verra!');
}
?>

<!DOCTYPE html>
   <html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Calvin</title>
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
                <img src="images/logo.svg" alt="Homepage">
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
                        </ul>
                    </li>-->
                    <li class="has-children">
                        <a href="#0" title="">Annonces</a>
                        <ul class="sub-menu">
                            <li><a href="single-video.php">Voir une annonce</a></li>
                            <li><a href="single-audio.php">Publiée une annonce</a></li>
                        </ul>
                    </li>
                    <li><a href="jeux/Chifoumi-master/Chifoumi-master/index.html" title="">Jeux</a></li>
                    <li class="current"><a href="about.html" title="">Chat</a></li>
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


   




 <div class="column large-8 intro" style="margin-left: auto; margin-right: auto;">

 <h1 class="s-hero__slide-text"> Annonces Publiée</h1>

   
   <h1><?= $titre ?></h1>
   <p><?= $contenu ?></p>

</div>






                     <!-- end s-content__media -->

                    <!--<div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post">Hey, This Is An Audio Post.</h1>
                    </div>--> <!-- end s-content__entry-header -->

                   <div class="s-content__primary">

                        <div class="s-content__entry-content">

                            
                          
    
                  

                                
                            
    
                        
                         
                        </div> <!-- end s-entry__entry-content -->

                     <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                <div class="author-avatar">
                                    <img class="avatar" src="images/avatars/user-06.jpg" alt="">
                                </div>
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                   ////////////////////////////////////////// <a href="#0">John Doe</a>
                                </div>
                            </div>

                            <div class="meta-bottom">
                                
                                <div class="entry-cat-links meta-blk">
                                    <div class="cat-links">
                                        <span>In</span> 
                                        <a href="#0">Frontend</a>
                                        <a href="#0">Design</a>
                                        <a href="#0">Work</a>
                                    </div>

                                    <span>On</span>
                                    Oct 5, 2020
                                </div>

                                <div class="entry-tags meta-blk">
                                    <span class="tagtext">Tags</span>
                                    <a href="#">orci</a>
                                    <a href="#">lectus</a>
                                    <a href="#">varius</a>
                                    <a href="#">turpis</a>
                                </div>

                            </div>

                        </div> <!-- s-content__entry-meta -->

                     

                   < </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

           </div> <!-- end column -->
       </div><!-- end row -->


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="column large-12">

                    <h3>5 Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Itachi Uchiha</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Oct 05, 2020</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->

                        <li class="thread-alt depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">John Doe</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Oct 05, 2020</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                                urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                                tantas semper delicatissimi.</p>
                                </div>

                            </div>

                            <ul class="children">

                                <li class="depth-2 comment">

                                    <div class="comment__avatar">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                                    </div>

                                    <div class="comment__content">

                                        <div class="comment__info">
                                            <div class="comment__author">Kakashi Hatake</div>

                                            <div class="comment__meta">
                                                <div class="comment__time">Oct 05, 2020</div>
                                                <div class="comment__reply">
                                                    <a class="comment-reply-link" href="#0">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment__text">
                                            <p>Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                                            cursus a sit amet mauris</p>
                                        </div>

                                    </div>

                                    <ul class="children">

                                        <li class="depth-3 comment">

                                            <div class="comment__avatar">
                                                <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                                            </div>

                                            <div class="comment__content">

                                                <div class="comment__info">
                                                    <div class="comment__author">John Doe</div>

                                                    <div class="comment__meta">
                                                        <div class="comment__time">Oct 04, 2020</div>
                                                        <div class="comment__reply">
                                                            <a class="comment-reply-link" href="#0">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment__text">
                                                <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                                etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                                </div>

                                            </div>

                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </li> <!-- end comment level 1 -->

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Shikamaru Nara</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Oct 03, 2020</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                                </div>

                            </div>

                        </li>  <!-- end comment level 1 -->

                    </ol>
                    <!-- END commentlist -->

                </div> <!-- end col-full -->
            </div> <!-- end comments -->


            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="column">

                    <h3>
                    Add Comment 
                    <span>Your email address will not be published.</span>
                    </h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>

                            <div class="form-field">
                                <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                            </div>

                            <div class="message form-field">
                                <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                            </div>

                            <br>
                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->


    </section> <!-- end s-content -->






    <!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">

                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <h5>Apropos du site</h5>

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