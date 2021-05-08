<?php

function post($title,$content,$posted){
    global $db; /*conenxion à la bdd sql*/

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";

    $req = $db->prepare($sql); /*je prépare ma requete sql*/
    $req->execute($p); /*j execute ma requete par $p*/

}

function post_img($tmp_name, $extension){
    global $db;
    $id = $db->lastInsertId(); /*fonction de php qui permet de récupérer le dernier id en base de donnée*/
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];

    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
    header("Location:index.php?page=post&id=".$id);
}