<?php

require "../../functions/main-functions.php";  /* on relie et on fait connexion à la bdd depuis la page de fonctions principales du site main.function*/

$db->exec("UPDATE comments SET seen='1' WHERE id='{$_POST['id']}'"); /*on fait une mise à jour de la table commentaire si seulement vu et position = 1 pour vu avec un id*/