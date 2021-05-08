<?php

function inTable($table){ /* on met une fonction ds la table */
    global $db;                 /* je met la connexion à la bdd en global et ensuite e=je fais ma requete qui sera a la connexion a la bdd db  pour laquelle 
                            elle va compte le nbre d'id ds la table*/
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch(); /* pas de req (requete) preparer car l utilisateur ne va rentrer aucun paramère et fetch va récupérer un nombre */
}

function getColor($table,$colors){
    /*CONDITION */
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange"; /*couleur par défaut*/
    }
}
                            /*pour récuperer les commentaires article en bdd on créé la fonction get_comments*/
function get_comments(){
    global $db;   /*connexion à la bdd on fait une query pour récupérer les données avec une jointure sur posts/post_id*/

    $req = $db->query("                 
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts  
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){ /*fetchobject retourne le resultat row ds un tableau kom un objet*/
        $results[] = $rows;
    }
    return $results;
}

function get_user(){
    global $db;

    $req = $db->query("
        SELECT * FROM admins WHERE email='{$_SESSION['admin']}';
    ");

    $result = $req->fetchObject();
    return $result;
}