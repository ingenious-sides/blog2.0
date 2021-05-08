<?php
 /*je créé une fonction maj password qui a 1 paramètre: $password*/

function update_password($password){
    global $db; /*connexion à la bdd*/

    $p = [ /*on créé un tableau $p pour password*/
        'password'  =>  sha1($password), /*sha1 mdp crypté*/
        'session'   =>  $_SESSION['admin']
    ];

    $sql = "UPDATE admins SET password = :password WHERE email=:session"; /*on vérifie que email et la session correspondent bien */
    $req = $db->prepare($sql);  /*je prepare ma requete sql et l exécute avec le tableau $p et j'exécute la requete et les présente dans un tableau [array] $p*/
    $req->execute($p);

}

/* ici on va empecher quelqu'un qui a déjà mdp d'accéder à password et je créé une fonction sans paramètre*/
function has_password(){
    global $db;/*connexion à la bdd*/

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;

}