<?php
         /*meme codes que pour la page login.php - on ajoute ici une CONDITION pour vérifier qu'il n'y a pas deja de session active et si oui alors on redirige l'utilisateur
                                                     admin vers la page dashboard*/
if(isset($_SESSION['admin'])){
    header("Location:index.php?page=dashboard"); /*on redirige vers la page dashboard*/
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
            <h4 class="center-align">Se connecter</h4>

            <?php
            /* validation du formulaire au clic de submit =>  CONDITION créé pour vérifier si le bouton submit a bien été pressé en définissant variable email et 
                                                                                variable password-*/

                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $token = htmlspecialchars(trim($_POST['token']));
                                /* htmlspecialchars empeche l'internaute de mettre n'importe quoi comme texte et trim qui enlève les espaces 
                                                    en début et en fin qui pourrait etre mal interprété par le navigateur pour les espaces en trop lors copié-collé*/
                    $errors = [];

                    if(empty($email) || empty($token)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }else if(is_modo($email,$token) == 0){
                        $errors['exist'] = "Ce modérateur n'existe pas";
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
                        $_SESSION['admin'] = $email;  /*ici on créé une session admin à l'utilisateur afin qu'il ne soit pas déconnecté par la suite*/
                        header("Location:index.php?page=password"); /* ici on redirige vers l'url de la page dashboard */
                    }

                }


            ?>
            <!--on créé le formulaire de connexion method = post-->

            <form method="post">
                <div class="row">
                    <div class="input-field col s12"> <!-- s est pour taille écran mobile  s12 pour avoir largeur de 100%- responsive -->
                        <input type="email" id="email" name="email"/>
                        <label for="email">Adresse email</label><!-- ici le label se réfere à l'id et non au name -->
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="token" name="token"/>
                        <label for="token">Code unique</label> <!-- ici le label se réfere à l'id et non au name -->
                    </div>
                    
                    <center>
                        <button type="submit" name="submit" class="btn waves-effect waves-light light-blue"><!-- css materialize-->
                            <i class="material-icons left">perm_identity</i> <!-- css materialize-->
                                            Se connecter
                        </button>
                        <br/><br/>

                        <a href="index.php?page=login">Déjà modérateur</a>
                  
                    </center>
                </div>

            </form>
        </div>

    </div>
</div>