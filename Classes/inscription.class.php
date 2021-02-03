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
                    echo '<br/> Identifiant déjà existant';
                    return $user;
                    // Vérifier si les MDP sont les mêmes
                }
                if ([$password] != [$confpassword]) {
                    echo '<br />' . 'Les mots de passe ne correspondent pas';
                    return $password;
                } 
                
                if($testpwd < 4){
                    echo '<br />' . 'Rappel : Votre mot de passe doit contenir au minimum 7 caractères, incluant une Majuscule, un chifre et un caractère spécial.';
                }else { // Si oui on créer le compte en Db
                    $newuser = $con->prepare("INSERT INTO utilisateurs (login, password, email,id_droits) VALUES ('$login','$hash','$email','$chiffre')");
                    $newuser->execute(array($login, $hash, $email));
                    return $newuser;
                    Header ('Location: hhtps://localhost/blog/Connexion/connexion.php');
                }
            }
        }
}
?>