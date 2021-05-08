<?php

function get_posts(){ /* cette fonction va reprendre l'ensemble des posts*/

    global $db;  /* et ici requête sql je fais un global $db pour éviter de mettre en paramètre $db  et l'objet PDO à chaque fois de n'importe où = avoir
    un accès depuis cette fonction à la bdd */


    $req = $db->query("SELECT * FROM posts ORDER BY date DESC"); /* $req = ma requête $db = la connexion à la bdd avec une query
    nous allons sélectionner la totalité de la table posts (public ou non)  ET ON FINIT PAR ORDONNER les résultats en fonction de leur date par date décroissante.*/

    $results = []; /* les résultats de la requête sont stockés dans une variable - tableau qui s'appelle results [] = (array)*/

    while($rows = $req->fetchObject()){
        $results[] = $rows;  /*je stoke le contenu de la variable $rows dans $results*/
    }

    return $results; /* je retoure à la fin de cette fonction la variable $results*/


}