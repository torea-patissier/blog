<?php 

include "../Classes/inscription.class.php"; 
require_once('../html_partials/header.php');

$pageInscription = new inscription;
?>
<div class="imgBack">
<main class="main_inscription">
<section class="formulaire_inscription">
<h2 class="h2_inscription">Inscription</h2>
<p>Veuillez compléter les champs ci dessous</p>
<form action="inscription.php" method="POST">
    <input class="zonetxt_inscription" type="text" name="username" placeholder="Nom d'utilisateur" required><br /><br />
    <input class="zonetxt_inscription" type="text" name="login" placeholder="Login" required><br /><br />
    <input class="zonetxt_inscription" type="password" name="password" placeholder="Mot de passe" required><br /><br />
    <input class="zonetxt_inscription" type="password" name="confpassword" placeholder="Conf. Mot de passe" required><br /><br />
    <input class="zonetxt_inscription" type="email" name="email" placeholder="E-mail" required><br /><br />
    <input class="button-inscription" type="submit" name="inscription" value="Valider">
    <br /><br />
    <p class="dejauncompte_inscription">Vous avez déjà un compte chez nous ? <a class="href_inscription" href="../Connexion/connexion.php">Connectez vous</a>.</p>
</form>
</section>
<?php
    if(isset($_POST["inscription"])){
        $pageInscription->register();
    }
?>
</div>
</main>
<?php require_once('../html_partials/footer.php');?>
