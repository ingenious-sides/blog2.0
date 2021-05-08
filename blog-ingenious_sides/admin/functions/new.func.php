<?php
        /*je créé une fonctin qui a 2 paramètres $email et $token*/
function is_modo($email,$token){
    global $db; /*connexion à la bdd*/

    $a = [ /*je créé un tableau array [] qui s'appelle $a et qui prend en compte l'ensemble des mes variables email et $token*/
        'email' =>  $email,
        'token' =>  $token
    ];
    $sql = "SELECT * FROM admins WHERE email=:email AND token=:token";  /*on vérifie que email et token correspondent bien */
    $req= $db->prepare($sql); /*je prepare ma requete sql et l exécute avec le tablea $a et retourne les résultats soit 0 ou 1 dans rowCount sql*/
    $req->execute($a);
    return $req->rowCount($sql);
}