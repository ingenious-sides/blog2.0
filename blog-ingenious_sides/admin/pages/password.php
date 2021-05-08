<?php
            /*CONDITION pour vérifier si mot de passe ou passe si 0 ou 1 en retour*/
if(hasnt_password() == 0){
    header("Location:index.php?page=dashboard");
}

?>
    <!--ici on va créer le pavé bloc de connexion nouveau modo ou admin -->
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/modo.png" alt="Modérateur" width="100%"/> <!-- on insert ici l'image illustrant la partie admin login--> <!-- alt= on met ici le texte 
                                                                                        alternatif pour décrire l'image -seo référencement-->
                </div>
            </div>

            <h4 class="center-align">Choisir un mot de passe</h4>

            <?php
             /* validation du formulaire au clic de submit =>  CONDITION créé pour vérifier si le bouton submit a bien été pressé en définissant variable email et 
                                                                                variable password-*/

                if(isset($_POST['submit'])){
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password_again = htmlspecialchars(trim($_POST['password_again']));
                     /* htmlspecialchars empeche l'internaute de mettre n'importe quoi comme texte et trim qui enlève les espaces 
                                                    en début et en fin qui pourrait etre mal interprété par le navigateur pour les espaces en trop lors copié-collé*/
/*ici on va afficher les erreurs*/
                    $errors = [];
                    if(empty($password) || empty($password_again)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }

                    if($password != $password_again){
                        $errors['different'] = "Les mots de passe sont différents";
                    }
 /* CONDITION pour vérifier si le tableau errors n'est pas vide et si ne l est pas doit afficher message erreur */
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
                         /*echo "Pas d'erreur!" ;*/
                        update_password($password); /*ici on créé une session admin à l'utilisateur afin qu'il ne soit pas déconnecté par la suite*/
                        header("Location:index.php?page=dashboard"); /* ici on redirige vers l'url de la page dashboard */
                    }
                }

            ?>
<!--on créé le formulaire de connexion method = post-->
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/><!-- s est pour taille écran mobile  s12 pour avoir largeur de 100%- responsive -->
                        <label for="password">Mot de passe</label><!-- ici le label se réfere à l'id et non au name -->
                    </div>

                    <div class="input-field col s12">
                        <input type="password" name="password_again" id="password_again"/><!-- ici le label se réfere à l'id et non au name -->
                        <label for="password_again">Répéter le mot de passe</label>
                    </div>
                </div>
                <center>
                    <button type="submit" name="submit" class="btn light-blue waves-effect waves-light"><!-- css materialize-->
                        <i class="material-icons left">perm_identity</i><!-- css materialize-->
                        Se connecter
                    </button>
                </center>



            </form>

        </div>
    </div>
</div>