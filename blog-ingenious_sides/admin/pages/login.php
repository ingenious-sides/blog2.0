<?php
        /*on ajoute ici une CONDITION pour vérifier qu'il n'y a pas deja de session active et si oui alors on redirige l'utilisateur admin vers la page dashboard*/
    if(isset($_SESSION['admin'])){  
        header("Location:index.php?page=dashboard"); /*on redirige vers la page dashboard*/
    }
?>

<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3"> <!--pour rappel L = écran large M = écran intermédiaire type tablette et S = écran mobile -responsive-->
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.png" alt="Administrateur" width="100%"/> <!-- on insert ici l'image illustrant la partie admin login--> <!-- alt= on met ici le texte 
                                                                                        alternatif pour décrire l'image -seo référencement-->
                </div>
            </div>

            <h4 class="center-align">Se connecter</h4>

            <?php

            /*die(sha1("")); au départ sha1 a été mis ici  $password =sha1htmlspecialchars(trim($_POST['password'])); et le mdp crypté est visible mme si chaine caractère vide*/

            /* validation du formulaire au clic de submit =>  CONDITION créé pour vérifier si le bouton submit a bien été pressé en définissant variable email et 
                                                                                variable password-*/
                if(isset($_POST['submit'])){  
                    $email = htmlspecialchars(trim($_POST['email']));  /* htmlspecialchars empeche l'internaute de mettre n'importe quoi comme texte et trim qui enlève les espaces 
                                                                                    en début et en fin qui pourrait etre mal interprété par le navigateur 
                                                                                    pour les espaces en trop lors copié-collé*/
                    $password =htmlspecialchars(trim($_POST['password']));
                                   

                    $errors = [];

                    if(empty($email) || empty($password)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                    }else if(is_admin($email,$password) == 0){
                        $errors['exist']  = "Cet administrateur n'existe pas";
                    }

                    if(!empty($errors)){ /* CONDITION pour vérifier si le tableau errors n'est pas vide et si ne l est pas doit afficher message erreur */
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

                        $_SESSION['admin'] = $email; /* ici on créé une session admin à l'utilisateur afin qu'il ne soit pas déconnecté par la suite*/
                        header("Location:index.php?page=dashboard"); /* ici on redirige vers l'url de la page dashboard */
                    }

                }


            ?>
                    <!--création du formulaire de connexion LOGIN-->
            <form method="post">
                <div class="row">
                    <div class="input-field col s12"> <!-- s est pour taille écran mobile  s12 pour avoir largeur de 100%- responsive -->
                        <input type="email" id="email" name="email"/>
                        <label for="email">Adresse email</label> <!-- ici le label se réfere à l'id et non au name -->
                    </div>

                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Mot de passe</label>
                    </div>
                </div>

                <center>
                    <button type="submit" name="submit" class="waves-effect waves-light btn light-blue"> <!-- css materialize-->
                        <i class="material-icons left">perm_identity</i>  <!-- css materialize-->
                        Se connecter
                    </button>
                    <br/><br/>
                    <a href="index.php?page=new">Nouveau modérateur</a>
                </center>




            </form>

        </div>
    </div>
</div>