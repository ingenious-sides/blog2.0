<?php

    session_start(); /* démarrage de la session*/

    $dbhost = 'localhost';
    $dbname = 'blog';
    $dbuser = 'root';
    $dbpswd = '';
  
             /*(Définition) PDO = PHP Data Objects (extension définissant l’interface pour accéder à une bdd avec PHP ; Elle est orientée objet ; la classe s’appelle PDO*/
    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Attention, une erreur est survenue lors de la connexion à la base de données !");
    }

            /*partie administrateur du site - back office */
            function admin(){   /*on  crééé la fonction admin qui n a pas de paramètre*/
                    //role modérateur ou admin
                    //si role admin oui il peut y accéder si role modérateur =non accès <restreint></restreint>
                     //droit d'accéder (admin) = 1//
               //accès restreint - pas le droit d'accéder (modo) = 0//
                /*pas de session = pas le droit => 0*/

                    /*CONDITIONS pour vérifier si l'utilisateur a bien une session de créée*/
    if(isset($_SESSION['admin'])){
        global $db; /*connexion à la bdd pour vérifier les sessions de connexion créées */
        $a = [  /*je créé un tableau $a comme admin */
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role"; /*on sélectionne les éléments depuis la table admin le mail et le role admin*/
        $req = $db->prepare($sql); /*je prépare la requête sql */
        $req->execute($a); /*on exécute en fonction du tableau array $a*/
        $exist = $req->rowCount($sql); /*le résultat retourné est  = 1 et est stocké ds $exist*/
        return $exist; /*on retoutne $exist*/


    }else{
        
        return 0;
    }
}

function hasnt_password(){
    global $db;

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;
}