                    <!--la topbar ici est sensiblement identique à celle de la partie utilisateur je vais juste la recopier et modifier les liens -->


<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Ingenious Sides - Blog</a>
           
            <?php

            /*CONDITION POUR ADMIN NEW*/
            if($page != 'login' && $page != 'new' && $page != 'password'){
                ?>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                       
                        <?php
                        /*CONDITION POUR ADMIN NEW*/
                        if(admin()==1){  /*CONDITION pour dire si admin différent de 1 ou égal à 0 dans ce cas on redirige vers le tableau de bord en cachant des éléments */
                            ?>                      <!--ici admin = 1 on met tous les liens auxquels l'admin a accès-->

                            <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li> 
                            <!-- href="index.php?page=write lien pour aller sur la page admin où on peut écrire article-->
                            <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
                            <!--href="index.php?page=list lien pour aller sur la page admin où on peut lister les articles -->
                            <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>
                                <!--href="index.php?page=list lien pour aller sur la page admin paramètres -->
                            <?php
                        }

                        ?>

                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>

                    <ul class="side-nav" id="mobile-menu"> <!-- et on fait de meme pour la partie mobile responsive-->
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
                        
                        <?php
                        /*CONDITION POUR ADMIN NEW*/

                        if(admin()==1){
                            ?>
                                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write">Publier un article</a></li>
                                 <!-- href="index.php?page=write lien pour aller sur la page admin où on peut écrire article-->
                                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list">Liste des articles</a></li>
                                <!--href="index.php?page=list lien pour aller sur la page admin où on peut lister les articles -->
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings">Paramètres</a></li>
                                <!--href="index.php?page=list lien pour aller sur la page admin paramètres -->
                            <?php
                        }

                        ?>
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
