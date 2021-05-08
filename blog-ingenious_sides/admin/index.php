<?php
include '../functions/main-functions.php';

$pages = scandir('pages/');
if(isset($_GET['page']) && !empty($_GET['page'])){
    if(in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = "error";
    }
}else{
    $page = "dashboard";
}

$pages_functions = scandir('functions/');
if(in_array($page.'.func.php',$pages_functions)){
    include 'functions/'.$page.'.func.php';
}

?>


<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <title>Ingenious Sides - Blog | Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<?php

/*CONDITION qui va vérifier que la page ouverte est différente de la page Login car c'est une des  pages du répertoire admin qui doit rester etre accessible à n'importe qui */
if($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])){  /* si la session n est pas active et est différente de login alors je redirige vers la page login*/
    header("Location:index.php?page=login");    /*url de redirection vers la page login*/
}



include "body/topbar.php";
?>
<div class="container">
    <?php
    include 'pages/'.$page.'.php';
    ?>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <!--via internet -->
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<?php
$pages_js = scandir('js/');
if(in_array($page.'.func.js',$pages_js)){
    ?>
    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
<?php
}

?>

</body>
</html>