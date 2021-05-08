<?php
        /*condition pour voir si le formulaire a bien été envoyé par utilisateur lors de l'envoi du formulaire lors appui 
                            du submit action - on récupère l'ensemble des données saisies */
                            
if(admin()!=1){   /* si c est bien admin on redirige vers le tableau de bord page*/
    header("Location:index.php?page=dashboard"); 
}

?>
                            <!--on va créer un tableau pour la gestion des roles modérateur/ administrateur et si le profil est validéd ou non-->
<h2>Paramètres</h2>
<div class="row">
    <div class="col m6 s12">
        <h4>Modérateurs</h4>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Validé</th>
                </tr>
            </thead>
            <tbody>

            <?php
                $modos = get_modos(); /*je créé ma variable get_modo et je vais la parcourir*/
                foreach($modos as $modo){
                    ?>
                        <tr>
                            <td><?= $modo->name ?></td>
                            <td><?= $modo->email ?></td>
                            <td><?= $modo->role ?></td>
                            <td><i class="material-icons"><?php echo (!empty($modo->password)) ? "verified_user" : "av_timer" ?></i></td> 
                                                            <!--CONDITION TERNAIRE avec echo (!empty($modo->password)) ? "verified_user" : "av_timer" ?>-->
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>


    </div>
    <div class="col m6 s12">
        <h4>Ajouter un modo</h4>

        <?php

                /*CONDITIONS IF ELSE */
            if(isset($_POST['submit'])){

                $name = htmlspecialchars(trim($_POST['name'])); /*pour les caractères spéciaux il les transforme pour ne pas avoir d'injection de code js ou html
                                                        et trim enlève les espaces en début et en fin de chaîne de caractère et j'oublie pas la variable $_POST 'name'*/
                $email = htmlspecialchars(trim($_POST['email']));
                $email_again = htmlspecialchars(trim($_POST['email_again'])); /*email_again pour redemander le mot de passe en confirmation*/
                $role = htmlspecialchars(trim($_POST['role']));
                $token = token(30); /*ici on met le chiffre 30 pour limiter le nbre de caractère de la chaine indiqué -ce n est pas aléatoire*/

                /*die(token)30));*/

                $errors = []; /*je créé mon tableau erreur*/

                if(empty($name) || empty($email) || empty($email_again)){ /*ici je vérifie que tous les champs sont bien rneseignés avec les éléments demandés - message erreur*/
                       $errors['empty'] = "Veuillez remplier tous les champs";
                }
                    /*CONDITIONS POUR VERIFIER QUE LES 2 ADRESSES @ CORRESPONDENT BIEN*/
                if($email != $email_again){
                    $errors['different'] = "Les adresses email ne correspondent pas";
                }

                if(email_taken($email)){
                    $errors['taken'] = "L'adresse email est déjà assignée à un modérateur";
                }

                /*print_r ($errors); 
                die();*/


                if(!empty($errors)){ /*si jamais j'ai une erreur amors je l'affiche*/
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
                }else{                      /*si pas d''erreur je gère ce nouveau modo et lui envoit un message mail*/
                    add_modo($name,$email,$role,$token);
                }
            }


        ?>
    <!--création d'un formulaire de connexion de type METHOD =POST-->
        <form method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name"/>
                    <label for="name">Nom</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email"/>
                    <label for="email">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email_again" id="email_again"/>
                    <label for="email_again">Répéter l'adresse email</label>
                </div>
                <div class="input-field col s12">
                    <select name="role" id="role"> <!--ici balise select pas inmut comme au dessus-->
                        <option value="modo">Modérateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                    <label for="role">Rôle</label>
                </div>

                <div class="col s12">
                    <button type="submit" name="submit" class="btn">Ajouter</button> <!--on envoit le formulaire de soumission-->
                </div>

            </div>
        </form>

    </div>
</div>