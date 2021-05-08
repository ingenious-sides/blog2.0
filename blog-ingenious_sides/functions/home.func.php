<!--<?php

echo 'Hello World !';
?>-->



<?php

function get_posts(){ /* fonction unique get_posts() pour récupérer les différents posts */

    global $db; /* et ici requête sql je fais un global $db pour éviter de mettre en paramètre $db  et l'objet PDO à chaque fois */

    $req = $db->query("  
            SELECT  posts.id, 
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts  
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,2

    "); /*-- ma reqête va récupérer SELECT FROM posts les id, titre, image, date, contenu et nom auteur pour les posts */

    /* elle va aller récupérer tout ce qu'elle peut sélectionner dans la table posts de la bdd*/ 
    /* ordonné par date pour avoir les articles du plus anciens au plus récents à la suite = order by date desc - ordre décroissant
    where posted = 1 cela veut dire qu on récupère uniquement les articles en ligne si = 0 les articles sont visibles only pour l'admn et le modo ds bdd
    jointure admins table des emails car on veut recuperer l'email de l'auteur = l'email de l'admin quand a posté */


    $results = array();  /*les résultats sont stockés dans un tableau vide array */

    while($rows = $req->fetchObject()){
        $results[] = $rows; /* je parcours les résultats de ma requete et pour chaque résultat trouvé je créé une nouvelle ligne de résultats dans le tableau fetchobject results*/
    }

    return $results; /* pour l'afficher à l'utilisateur - les résultats des requetes lancées */

}