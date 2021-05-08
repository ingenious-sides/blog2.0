<?php
if(admin()!=1){ /*CONDITION pour dire si admin différent de 1 ou égal à 0 dans ce cas on redirige vers le tableau de bord */
    header("Location:index.php?page=dashboard");
}

?>

<h2>Poster un article</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
                 /* die(var_dump($_POST));*/
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = [];

                /*CONDITION IF  ELSE*/
        if(empty($title) || empty($content)){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }


                                                                    /*partie upload de fichier */

            /*CONDITION IF  ELSE*/ 
        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF']; /*tableau qui va accueillir toutes les extensions de fichier image en maj ou en minuscule*/
            $extension = strrchr($file,'.'); /*la fonction strrchr ()en php est utilisé pour recherché l'extension d'un fichier (photo, image, audio, setc...) et trouve la 
                                                dernière occurence d'un caractère dans une chaîne*/

            if(!in_array($extension,$extensions)){ 
                $errors['image'] = "Cette image n'est pas valable";
            }
        }
            /*CONDITION IF  ELSE*/
        if(!empty($errors)){
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                            foreach($errors as $error){
                                echo $error."<br/>";
                            }
                        ?>
                    </div>
                </div>
            <?php
        }else{
            post($title,$content,$posted); 
            if(!empty($_FILES['image']['name'])){
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?page=post&id=".$id);
            }
        }
    }


?>

        <!--création d'un formulaire Création d’un formulaire pour Publier un article, avec le method= post

C'est un formulaire qui contient un champ de type texte un textarea, on a aussi un champ de type file et une checkbox (oui/non pour rendre public le post) ainsi que le bouton publier (type submit => bouton de validation)

Comme on va devoir uploader des fichiers on ajoute un enctype=multipart/fotm-data car c’est un formulaire qui comprend des <input type=file> éléments.-->
 
                                                    <!--création d'un formulaire -->

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-field col s12"> <!--prendra la totalité de la largeur de l'écran-->
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu de l'article</label>
        </div>

        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s2">
                    <span>Image de l'article</span>
                    <input type="file" name="image" class="col s12"/>
                </div>
                <input type="text" class="file-path col s10" readonly/>
            </div>
        </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

    </div>



</form>