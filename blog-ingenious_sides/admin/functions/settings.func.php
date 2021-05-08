<?php

function email_taken($email){  /*je cré une fionction pour vérifier si adresse email est prise */
    global $db; /*connexion à la bdd*/
    $e = ['email'   =>  $email]; /*je créé un tablea $e qui va prendre le champs email*/
    $sql = "SELECT * FROM admins WHERE email = :email"; /*reprend l'ensemble des champs qui sont ds la colonne email de la bdd* SELECT * SELECT ALL*/
    $req = $db->prepare($sql); /*je prepare ma requete sql que je vais exécuter avec mon tableau $e* =email*/
    $req->execute($e);
    $free = $req->rowCount($sql); /*je compte les résultats*/

    return $free; /*variable $free qui va retourné le rowcount des résultas*/
}

function token($length){  /* je créé ici une nouvelle fonction ke j'appel token pour gérer le nouveau contact admin ou modo*/
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789"; /*on va utiliser l'ensemble des lettres de l'alphabet en min et en maj ainsi que les chiffres 
                                                                                    pour plus de choix dans une chaine de caractère*/
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length); /*la variable $length va traiter de la longueur de la chaine de caractère - ici je vais me limiter*/
                                                            /*sa longueur est définie sur page setting*/
                                                        /*on utilise str_shuffle pour manipuler la length avec chaine caractère et on utilise repeat pour que ce soit répéter
                                                         autant de fois que nécessaire et n utilise la longueur $chars sur la variable $length ici longueur de 30 pour token*/
                          
}

function add_modo($name,$email,$role,$token){ /*on créé une fnction et on stocke l ensemble de ces paramètres dans un tableau array*/
    global $db; /*connexion à la bdd*/

    $m= [  /*$m  pour modérateur est un opérateur d'affectation comme $e pour email auparavant*/
        'name'      =>  $name,
        'email'     =>  $email,
        'token'     =>  $token,
        'role'      =>  $role
    ];

    /*je créé ma requete $sql ds ma table admins avec les champs mentionnés*/

    $sql = "INSERT INTO admins(name,email,token,role) VALUES(:name,:email,:token,:role)";
    $req = $db->prepare($sql); /*je prepare ma requete et l 'éxecute sur le tableau $m*/ 
    $req->execute($m);

    /*on envoit un mail à l'utilisateur en php recu sur maildev  boite mail virtuelle pour la démo soutenance*/
    /*on créé la $message avec le message et les entetes et on définit le role de l utilisateur selon son submit dans le formulaire création modo/admin new*/
    $subject = "Une nouvelle mission de Modo sur le blog...";
    $message = '
        <html lang="en" style="font-family: sans-serif;">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                Bonjour à toi cher Modo et bienvenue dans cette nouvelle aventure !
                <br/><br/><br/>Voici ton identifiant et code unique à insérer sur cette page: http://127.0.0.1/blog-ingenious_sides/admin/index.php?page=login
                    <br/><br/><br/>Clic sur nouveau modérateur et renseigne les informations ci-dessous pour ta première connexion.
                    <br/><br/><br/>Identifiant: '.$email.'
                    <br/><br/>Mot de passe: '.$token.'
                    <br/><br/>Dans la Dream Team, tu es: '.$role.'.
                    <br/><br/><br/><br/>Après avoir inséré ces éléments, tu devras choisir un mot de passe personnel.
                <br/><br/>Bonne journée à toi !
                <br/> <br/><br/>INGENIOUS SIDES
            </body>
        </html>
    ';
                            /*Note: charset- UTF8 permet de gérer les accents qui seront affichés lors de la récupération */

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=UTF-8\r\n"; /*\r\n retour de ligne et nouvelle ligne - tabulation mise en forme du mail ici */
    $header .= 'From: ingenious_sides@outlook.fr' . "\r\n" . 'Reply-To: virginie.allaghenkhaldi@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($email,$subject,$message,$header);

}

                            /*je créé une fonction get_modos*/
function get_modos(){
    global $db;                 /*connexion à la bdd*/  /*ici on affiche seulement l'ensemble des utilisateurs */
    $req = $db->query("
        SELECT * FROM admins          
    ");

 /* si je voulais sélectionner uniquement les admins  SELECT * FROM admins WHERE role = 'admin' et si je voulais uniquement les modos SELECT * FROM admins WHERE role = 'modo'*/


    $results = [];                      /*je créé mon tableau array [] results qui va accueillr l'ensemble des résultats*/
    while($rows = $req->fetchObject()){
        $results[] = $rows;                     /*retourne un tableau vide*/
    }  
    return $results;                /*les résultats sont mis dans le tableau results*/
}