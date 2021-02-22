<?php
require_once('bdd.class.php');
class inscription extends bdd {
        // Function pour s'inscrire
        public function register()
        {
            if (isset($_POST['inscription'])&& !empty($_POST['inscription'])) {
                //Connexion Db
                $con = $this->connectDb();
                //HTMLSPECHARS
                $userName = htmlspecialchars($_POST['username']);
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $confpassword = htmlspecialchars($_POST['confpassword']);
                $email = htmlspecialchars($_POST['email']);
                $chiffre = 1;
                $testpwd = preg_match("#[A-Z]#", $password) + preg_match("#[a-z]#", $password) + preg_match("#[0-9]#", $password) + preg_match("#[^a-zA-Z0-9]#", $password);
                // Hashage mdp
                $options = ['cost' => 12,];
                $hash = password_hash($password, PASSWORD_BCRYPT, $options);
                //Vérifier si un login est déjà existant
                $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE login =?");
                $stmt->execute([$login]);
                $user = $stmt->fetch();
                if ($user) {
                    // Si il existe déjà echo message d'erreur
                    echo '<br/> <p class="erreur_inscription">Identifiant déjà existant.</p>';
                    return $user;
                    // Vérifier si les MDP sont les mêmes
                }
                if ([$password] != [$confpassword]) {
                    echo '<br />' . '<p class="erreur_inscription">Les mots de passe ne correspondent pas.</p>';
                    return $password;
                } 
                
                if($testpwd < 4){
                    echo '<br />' . '<p class="erreur_inscription">Rappel : Votre mot de passe doit contenir au minimum 7 caractères, incluant une Majuscule, un chifre et un caractère spécial.</p>';
                }else { // Si oui on créer le compte en Db
                    $newuser = $con->prepare("INSERT INTO utilisateurs (username, login, password, email, id_droits) VALUES (:userName, :login, :hash, :email, :chiffre)");
                    $newuser->bindValue('userName', $userName, PDO::PARAM_STR);
                    $newuser->bindValue('login', $login, PDO::PARAM_STR);
                    $newuser->bindValue('hash', $hash, PDO::PARAM_STR);
                    $newuser->bindValue('email', $email, PDO::PARAM_STR);
                    $newuser->bindValue('chiffre', $chiffre, PDO::PARAM_INT);
                    $newuser->execute();
                    header("Refresh: 0;url=http://localhost:8888/blog/Connexion/connexion.php");
                    return $newuser;
                    
                }
            }
        }
}
?>