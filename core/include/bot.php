</div>
<nav class="span4">
    <h2>Menu</h2>
    <form action="index.php" method="get">
        Recherche:<br>
        <input type="text" name="r" placeholder="informatique, ubuntu..." value="" 
               class="span3">&nbsp;<input type="submit" value="OK" class="btn">                      
    </form>
    <ul>

        <li><a href="index.php">Accueil</a></li>
        <?PHP
        if ($connect) {
            echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
            echo '<li><a href="article.php">Rédiger un article</a></li>';
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

