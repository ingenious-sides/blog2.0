<h1>Bienvenue et bonne lecture !</h1>
                    <!-- echo "Hello World!" -->
<div class="row">

<?php

$posts = get_posts();                    /* je créé une nouvelle variable $posts qui va etre égale à notre fonction get_posts() */
foreach($posts as $post){                /* maintenant je vais parcourir les résultats avec foreach la variable que je veux parcourir c'est $posts qui est dans un tableau
                             et je veux récupérer tous les éléments du tableau je mets $post */
   /* echo $post->title."<br/>".nl2br($post->content)."<hr>"; hr = une ligne horizontale pour bien séparer les 2 articles*/
   /*.nl2br pour les interlignes*/ 
   
      ?>
        <div class="col l6 m6 s12"> 
                                    <!-- style css materialize-->
            <div class="card">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"><?= $post->title ?></h5>
                    <h6 class="grey-text">Le <?= date("d/m/Y à H:i",strtotime($post->date)); ?> par <?= $post->name ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">                   <!-- image des articles div class= card-image avec effets de vagues-->
                    <img src="img/posts/<?= $post->image ?>" class="activator" alt="<?= $post->title ?>"/>
                </div>
                <div class="card-content"> <!-- ce card content va contenir un lien pour aller voir l'article complet mais avant avec la span ce sera un aperçu court de l'article-->
                    <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>             <!-- aperçu court de l'article -->
                    <p><a href="index.php?page=post&id=<?= $post->id ?>">Voir l'article complet</a></p>                                     <!--apercu de l'article complet -->
                </div>
                <div class="card-reveal">           <!-- pour révéler l'article -->
                    <span class="card-title grey-text text-darken-4"><?= $post->title ?> <i class="material-icons right">close</i></span>
                    <p><?= substr(nl2br($post->content),0,1000); ?>...</p> <!-- substr = on demande seulement une partie du texte un extrait de 0 à 1200 caractères-->
                </div>
            </div>
        </div>
    <?php
}

?>
</div>