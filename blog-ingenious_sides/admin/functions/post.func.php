<?php

function get_post(){ /*fonction qui permet d'afficher le post - un seul à récupérer */

    global $db; /* connexion à la bdd*/


                        /*je veux récupérer des choses à l intérieur de la bdd je fais un query et un SELECT */
    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                posts.posted,
                admins.name
        FROM posts
        JOIN admins  
        ON posts.writer = admins.email
        WHERE posts.id = '{$_GET['id']}'
    ");  /* je joins la table admins sur le writer avec son adresse email*/

    $result = $req->fetchObject(); /*je retourne un objet - un tableau (array)*/
    return $result; /*je retourne un seul résultat*/
}


/*si pas d'erreur tableau $errors est vide on affiche la valeur du résultat*/

function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id"; /*on veut apporter une modif ds la bdd je peux changer le titre
                                                                                la date en bdd le statué publié ou non*/
    $req = $db->prepare($sql);
    $req->execute($e);

}