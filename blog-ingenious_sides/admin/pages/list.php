<?php
if(admin()!=1){ /*CONDITION pour dire si admin différent de 1 ou égal à 0 dans ce cas on redirige vers le tableau de bord */
    header("Location:index.php?page=dashboard");
}

?>
<h2>Listing des articles</h2>
<hr/>

<?php

$posts = get_posts();
foreach($posts as $post){  /*dans un tableau avec colonne $post*/
    ?>
    <div class="row">
        <div class="col s12"> <!--prend la totalité de l'écran*/
            <h4><?= $post->title ?><?php echo ($post->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4> <!-- CONDITION PHP pour faire apparaitre le cadenas 
                                                                si pas rendu public dans la bdd = 0 -->

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= substr(nl2br($post->content),0,1200) ?>... <!--on affiche un échantillon de l'article jusqu'à 1200 caractères-->
                </div>
                <div class="col s12 m6 l4">
                    <img src="../img/posts/<?= $post->image ?>" class="materialboxed responsive-img" alt="<?= $post->title ?>"/>
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}