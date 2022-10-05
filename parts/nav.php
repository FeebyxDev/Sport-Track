<nav>
    <div class="nav-wrapper orange lighten-1">
        <a href="/" class="brand-logo c-primary">SportTracks</a>
        <?php 
            include_once($_SERVER['DOCUMENT_ROOT']."/parts/includes.php");

            echo '<ul class="right hide-on-med-and-down">';
            echo '<li><a href="/"><i class="material-icons left">home</i>Home</a></li>';
            if(isset($_SESSION['user'])){
                echo '<li><a href="upload"><i class="material-icons left">directions_run</i>Ajout d\'une course</a></li>';
                echo '<li><a href="activities"><i class="material-icons left">format_list_bulleted</i>Liste des activités</a></li>';
                echo '<li><a href="informations"><i class="material-icons left">settings</i>Paramètres du compte</a></li>';
                echo '<li><a href="disconnect"><i class="material-icons left">exit_to_app</i>Déconnexion</a></li>';
            } else {
                echo '<li><a href="login"><i class="material-icons left">person</i>Sign In</a></li>';
                echo '<li><a href="register"><i class="material-icons left">person_add</i>Sign Up</a></li>';
            }
            echo '</ul>';
        ?>
    </div>
</nav>