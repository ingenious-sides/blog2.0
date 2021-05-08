<?php
    include 'functions/main-functions.php';

    $pages = scandir('pages/');                     /*va scanner la page*/
                                                   /*condition*/
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){      /*array = tableau = dossier ici le dossier pages*/ /* j'ai demandé de trouver toutes les extentions.php .'.php'pour les ouvrir*/
        /*echo "OK"; */
            $page = $_GET['page'];                /*c est bien la page à charger */
        }else{                                  /*dans le cas ou je me suis trompée dns nom page, il y a message erreur */
            $page = "error";
        }
    }else{
        $page = "home";                                       /* si pas d'erreur dans l'url renvoi uu affiche bien la page home par défaut */
    }

    $pages_functions = scandir('functions/');                     /*cela concernera la fonction scandir de functions */
    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--inclus depuis internet -->
       
        <!-- Import materialise.css -->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <title>Ingenious Sides - Blog</title>

        <!--let browser know website is optimized for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <?php
            include "body/topbar.php";
        ?>
        <div class="container">                                <!--on structure le site avec la balise html div class container -->
                                                <!-- attention! cette div class container sera fermée </div> dans la page post.php en ligne 10 -->
            <?php
                include 'pages/'.$page.'.php';                 /*on inclut la page qui se trouve dans le dossier pages et qui porte le nom de la variable .$page */
            ?>
        </div>


                                          <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>             <!--inclus depuis internet -->
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script> <!--script js accessible depuis partout-->
                <?php
            }

        ?>

    </body>
</html>