$(document).ready(function () {

    $('.modal-trigger').leanModal();   /* partie de validation du commentaire - indiqué marqué comme Lu*/  /* je vérifie que l'utilisateur a bien cliqué sur
                                            le bouton - on utilise modal de materialize pour confirmer le message ou tout autre contenu qui a été appelé ici au click voir commentaire
                                            et trigger leanModal fonctionne avec le css et jquery*/

    $(".see_comment").click(function () {                 /*je créé donc une  fonction click => voir commentaire*/
        var id = $(this).attr("id");                    /*attr = attribute = attribut*/ /* variable de l id du commentaire var id*/
        $.post('ajax/see_comment.php', { id: id }, function () {               /* on redirige vers l'url du fichier ajax/see_comment*/
            $("#commentaire_" + id).hide();     /*permet d'effacer -cacher il le sort de la liste - le commentaire de la liste des comments à valider par l'admin dès qu'il l'a validé*/
        });
    });

    $(".delete_comment").click(function () {              /*je créé donc une  fonction click => supprimer commentaire*/
        var id = $(this).attr("id");                 /*attr = attribute = attribut*/ /* variable de l id du commentaire var id*/
        $.post('ajax/delete_comment.php', { id: id }, function () {   /* on redirige vers l'url du fichier ajax/delete_comment*/
            $("#commentaire_" + id).hide();  /*permet de supprimer -il le sort de la liste - le commentaire de la liste des comments à valider par l'admin dès qu'il l'a supprimé*/
        });
    });

});