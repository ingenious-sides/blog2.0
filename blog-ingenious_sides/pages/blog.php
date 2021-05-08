<h3>Mes derniers articles</h3>

<?php

$posts = get_posts();
foreach($posts as $post){
                            /* print_r($post);  montre l'article en entier */
                        /*echo $post->title."<br/>";   montre le titre des articles*/


    ?>
                <!-- html css -->

    <div class="row">                <!-- div qui porte le design avec le row on redimensionnera les éléments -->
        <div class="col s12 m12 l12">       <!-- avec le row il y a une colonne col, s est pour taille écran portable, m est pour taille écran médium internémdiaire, l pour les écrans
                                         larges -->
            <h4><?= $post->title ?></h4>

            <div class="row">            <!-- div qui porte le design avec le row on redimensionnera les éléments avec la prise en compte des retours à la ligne -->
                <div class="col s12 m6 l8">         <!-- taille intermédiaire tablette -->
                    <?= substr(nl2br($post->content),0,1200) ?>... <!-- substr = on demande seulement une partie du texte un extrait de 0 à 1200 caractères-->
                </div>
                <div class="col s12 m6 l4">             <!-- taille plus petit mais dans la totalité de l'écran-->
                    <img src="img/posts/<?= $post->image ?>" class="materialboxed responsive-img" alt="<?= $post->title ?>"/> 
                    
                                     <!-- j'affiche les images des articles avec un léger effet vague sur l'image  et j'appelle j affiche le nom des images contenues 
                                         dans la bdd en php <img src="img/posts/</*?= $post->image ?>-->
                    <br/><br/>                  <!-- class="materialboxed responsive-img" redimensionne automatiquement les images avec materalize -->
                                         <!-- class="materialboxed responsive-img" alt=" /> alt = texte alternatif pour l'image très important pour le SEO référencement 
                                             ici j'ai mis le titre de l'article avec $post->title ?>"-->

                    <a class="btn light-green waves-effect waves-light" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
