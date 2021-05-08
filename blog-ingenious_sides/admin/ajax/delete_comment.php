<?php
require "../../functions/main-functions.php";  /* on relie et on fait connexion à la bdd depuis la page de fonctions principales du site main.function*/
$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}"); /* supprime aussi de la base de donnée le commentaire effacé*/