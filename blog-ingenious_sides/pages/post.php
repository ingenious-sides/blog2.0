<?php
if(admin()!=1){ /*CONDITION pour dire si admin différent de 1 ou égal à 0 dans ce cas on redirige vers le tableau de bord */
    header("Location:index.php?page=dashboard");
}

$post = get_post();                 /*variable post*/
                            /* CONDITION si erreur et pas de correspondance */
if($post == false){
    header("Location:index.php?page=error");                /* on est redirigé vers la page d'erreur error.php */
                                    /*et si ca fonctionne bien on va pouvoir travailler dessus en utilisant materialize (div) pour le css */
}else{
    ?>
        </div> <!--ici on ferme la div class=container de la page index.php ouverte à la ligne 42 ce container empeche le texte de déborder et il reste dans son bloc meme
                    si on agrandit l'écran
                        on ferme cette div class container car elle empeche les images de s'afficher - de se positionner comme il faut 
                         c est pour cela que l'on ferme cette div ici -->
                            <!-- à partir d'ici les images ne sont plus soumis à cette restriction car div fermée -->

    <div class="parallax-container"> <!--l'image bouge avec le curseur  c'est l'effet parallax de materialize-->
        <div class="parallax">
            <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/> <!-- j'affiche les images des articles et j'appelle
                          j affiche le titre des images contenues dans la bdd en php <img src="img/posts/</*?= $post->title?> alt = texte alternatif pour l'image très important 
                                pour le SEO référencement - ici j'ai mis le titre de l'article avec $post->title ?>"-->
        </div>
    </div>

        <div class="container">

            <h2><?= $post->title ?></h2>                 <!-- on affiche le titre par article posté-->
            <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></h6>       <!-- on affiche
                                        par nom auteur de la bdd par date j/m/année et l'heure + minutes et strtotime  string to time de date
                                                             ($post->date))-->
            <!-- on rajoute ici le contenu du post-->
            <p><?= nl2br($post->content); ?></p> <!--.nl2br pour les interlignes--> 
    <?php
}
?>
                <!-- on entre ici dans la partie commentaire pour les afficher-->
            <hr>
            <h4>Commentaires:</h4>
            <?php
                $responses = get_comments(); /*on va créer une nouvelle table pour contenir tous les commentaires dans la bdd ds un tableau array ou () */
                if($responses != false){
                    foreach($responses as $response){
                        ?>
                            <blockquote>
                                <strong><?= $response->name ?> (<?= date("d/m/Y", strtotime($response->date)) ?>)</strong>
                                <p><?= nl2br($response->comment); ?></p>
                            </blockquote>
                        <?php
                    }
                }else echo "Aucun commentaire n'a été publié... Soyez le premier!"; /* si aucun résultat dans le foreach apparait un message alerte suivant apparait pour inviter 
                                            à laisser un commentaire*/
            ?>
            
            
            <h4>Commenter:</h4>

            <?php /*On va gérer le renvoi du formulaire (en php) dans la bdd */
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = [];

                    /*CONDITIONS */
                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis"; /* si l'un de ces 3 champs est vide => message erreur apparait */

                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "L'adresse email n'est pas valide"; /* pour filtrer la variable $email on met FILTER_VALIDATE_EMAIL
                            si jamais email différent de valide  => message erreur apparait */
                        }
                    }


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
                        comment($name,$email,$comment);
                        ?>
                            <script>
                                window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>"); /*redirection javascript attention javascript peut etre désactivé
                                sur ordi de l'utilisateur */


                            </script>
                        <?php
                    }

                }

            ?>
        <!-- on créé ici un formulaire -->
            <form method="post">

                <div class="row"> <!-- pour garder dans l'espace le formulaire commentaire - pour pas qu'il déborde mm si changement de taille d'écran-->
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label> <!-- attention le for=name ici se rapporte à l'id=name de l input -->
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label> <!-- attention le for=email ici se rapporte à l'id=email de l input -->
                    </div>

                    <div class="input-field col s12"> <!-- partie du commentaire en text area -->
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">Commentaire</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" name="submit" class="btn waves-effect">
                            Commenter ce post 
                        </button>
                    </div>
                </div>
            </form>