<?php

function get_post(){ /* fonction unique get_posts() pour récupérer les différents posts */
    global $db; /* et ici requête sql je fais un global $db pour éviter de mettre en paramètre $db  et l'objet PDO à chaque fois */

    $req = $db->query("   
    
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");
    
    /*-- on fait la requête avec $req */
    /* je ne mets pas * apres SELECT car je dois faire des jointures */

    $result = $req->fetchObject(); /* comme il n'y a qu'un seul résultat demandé il y a pas de array tableau our résults on fait fetchobject directement*/
    return $result;
/* les résultats de la requête sont stockés dans une variable - tableau qui s'appelle results [] = (array)*/
}


function comment($name,$email,$comment){
    /* fonction pour récupérer le nom l email et les commentaires*/

    global $db;  /*ici requête sql je fais un global $db pour éviter de mettre en paramètre $db  et l'objet PDO à chaque fois */

    $c = array( /*les résultats de la requête comments (nom-email-comment-id) sont stockés dans une variable $c = array - tableau */
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );
/* SQL  on cherche à insérer dans la bdd sql les éléménts name email comments post id et date récupérés sur le blog en ligne*/
    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql); /*je prepare ma requete sql et sa variable $sql*/
    $req->execute($c); /* je l'éxécute sans le tabeau array $c*/

}

function get_comments(){  /*fonction pour récuoérer tous les commentaires relatif à un article*/

    global $db;
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC"); /*SELECT* = SELECT ALL*/
    $results = [];
    while($rows = $req->fetchObject()) /*je retourne les resultats sous forme de tableau*/
            {  $results[] = $rows;
    }
/*fetch object = renvoi les résultats de la ligne courante sous forme d'objet*/
    return $results;
}