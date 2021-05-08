<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Ingenious Sides - Blog</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a><!--responsive-->

            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li> <!--($page=="home")?"active" : "" condition ternaire si $page = home alors j'aimerai affiché active et ce n'est pas le cas: affiché une liste de caractère vide ''--> 
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li> <!--($page=="blog")?"active" : "" condition ternaire si $page = blog alors j'aimerai affiché active et ce n'est pas le cas: affiché une liste de caractère vide ''-->
            </ul>

            <ul class="side-nav" id="mobile-menu"> <!-- partie responsive --><
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
            </ul>

        </div>
    </div>
</nav>