<?php
    unset($_SESSION['admin']); /*unset = on détruit la variable session admin et on redirige vers le dossier parent qui est la page d'accueil du blog */
    header("Location:../");