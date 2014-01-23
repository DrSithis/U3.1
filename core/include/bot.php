</div>
<nav class="span4 nav main_nav" style="">
    <h2>Menu</h2>
    <ul class="nav-list">
        <li><a href="index.php">Accueil</a></li>
        <?PHP
            if ($connect) {
                br();
                echo '<h4>Bienvenue '.$email.'</h4>';
                echo '<li><a href="article.php">Rédiger un article</a></li>';
                br();
                echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
                
            } else {
                echo '<li><a href="connexion.php">Se connecter</a></li>';
            }
        ?>
    </ul>

</nav>
</div>
</div>
<footer><p>Hoflack David</p></footer>
</div>

</body>
</html>

