<?php
    session_start();
require_once('html_partials/header.php');
$titreheader = 'Inscription';
?>
<body>
    <main>
        <?php
        require_once('classes/inscription.class.php');
        $user = new inscription();

        ?>
        <h1>Inscription</h1>
        <p>Votre mot de passe doit contenir au minimum 7 caractères, incluant une majuscule, un chifre et un caractère spécial.</p>
        <form action="inscription.php" method="POST">
            <label>Identifiant</label><br />
            <input type="text" name="login" required><br /><br />
            <label>Mot de passe</label><br />
            <input type="password" name="password" required><br /><br />
            <label>Confirmation de mot de passe</label><br />
            <input type="password" name="confpassword" required><br /><br />
            <label>Email</label><br />
            <input type="email" name="email" size="20"><br /><br />
            <input type="submit" name="inscription" value="S'inscrire">
        </form>
        <p class="preservationform">Vous avez un  compte?</p><br />
        <form class="preservationform" action="connexion.php" method="GET">
            <input class="submit" type="submit" name="connexion" value="Se connecter">
        </form>
        <?php
    $user->register();

if(isset($_GET['connexion'])){
    header('location:http://localhost:8888/blog/connexion.php');
}

?>
</main>
</body>


</html>