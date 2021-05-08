<?php


function is_admin($email,$password)
{
    global $db;
    $a = [
        'email'     =>  $email,
        'password'  =>  sha1($password)
    ];
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password"; /* dans sql les : fait référence au contenu du tableau qu'on va injecter ici email et password -
                                             SELECT * = sélectionne tout depuis email jusqu'à password*/ 
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount($sql);
    return $exist;
}
