<?php

    if(admin()!=1){
        header("Location:index.php?page=dashboard");
    }


    $post = get_post();
    if($post == false){ /*ici on redirige l'utilisateur vers essage d'erreur (page error) si mauvais id article*/
        header("Location:index.php?page=error");
    }

?>  
<!--je ferme ici la div class=container afin de ne pas etre limitee dans espace à gauche et a droite et qui se trouve dans la topbar admin qui est ouverte 
                            sur admin/index.php -->
</div>

    <div class="parallax-container">
        <div class="parallax">  <!--effet de style materialize sur l'image effet parallax--> 
            <img src="../img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
        </div>
    </div>
<div class="container"> 

    <?php


/*  CONDITIONS*/
        if(isset($_POST['submit'])){
            $title = htmlspecialchars(trim($_POST['title']));
            $content = htmlspecialchars(trim($_POST['content']));
            $posted = isset($_POST['public']) ? "1" : "0";  /*on définit ici si la variable $post est défini ou non en public si définit=1 si pas défini = 0 */
            $errors = [];

            /*si erreur on affiche message*/
            if(empty($title) || empty($content)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }

            /*si pas d'erreur tableau $errors est vide on affiche la valeur du résultat*/

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
                edit($title,$content,$posted,$_GET['id']) /*on doit récupérer l id ds l url*/
                ?>
                    <script>
                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                        /*redirection js attention à utiliser si pas fondamental car l'utilisateur peut avoir désactivé javascript sur son pc
                        ici redirection côté serveur afin de rediriger l'utilisateur lorsqu'il se trouve su une page où il ne devrait pas car pas le droit de s'y rendre
                        il ne verra pas la modif en direct*/

                    </script>
                <?php
            }
        }

    ?>
<!--je créé un formulaire de type POST-->

    <form method="post">
        <div class="row">
            <div class="input-field col s12">  <!--colonne qui prend toute la largeur-->
                <input type="text" name="title" id="title" value="<?= $post->title ?>"/><!-- valeur du titre actuel avant modification-->
                <label for="title">Titre de l'article</label>
            </div>


            <div class="input-field col s12"> <!--colonne qui prend toute la largeur-->
                <textarea id="content" name="content" class="materialize-textarea"><?= $post->content ?></textarea> <!--ici j'affiche le contenu e l'article-->
                <label for="content">Contenu de l'article</label>
            </div>

            <div class="col s6">
                <p>Public</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo ($post->posted == "1")?"checked" : "" ?>/>
                        <span class="lever"></span>
                        Oui
                    </label>
                </div>
            </div>

            <div class="col s6 right-align"><!-- dans la deuxieme moitié de l'écran-->
                <br/><br/>
                <button type="submit" class="btn" name="submit">Modifier l'article</button>

            </div>
       </div>
    </form>