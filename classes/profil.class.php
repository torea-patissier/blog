<?php 
require_once('classes/bdd.php');
class modprofil extends bdd{
    
    public function profil()
    {

        if (isset($_POST['modifier'])) {
            $log = $_SESSION['user']['login'];
            $con = $this->connectDb();
            $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE login = '$log' ");
            $stmt->execute();
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            $login = htmlspecialchars($_POST['login']);
            $mdp = htmlspecialchars($_POST['password']);
            $conf =  htmlspecialchars($_POST['confpass']);
            $email = htmlspecialchars($_POST['email']);
            $options = ['cost' => 12,];
            $hash = password_hash($mdp, PASSWORD_BCRYPT, $options);

            if (!empty($_POST['login'])) {
                $requete = "UPDATE utilisateurs SET login='$login' WHERE id = '" . $_SESSION['user']['id'] . "' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['login'] = $_POST['login'];
                echo '<br/> Login modifié ';
            }
            if ($mdp != $conf) {
                echo ('<br/> Mot de passe incorrecte ');
                return false;
            } elseif (!empty($_POST['password'])&&!empty($_POST['confpass'])) {

                $requete = "UPDATE utilisateurs SET password='$hash' WHERE id = '" . $_SESSION['user']['id'] . "' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['password'] = $_POST['password'];

                echo '<br/> Mot de passe modifié ';
            }
            if(!empty($_POST['email'])){
                $requete = "UPDATE utilisateurs SET email='$email' WHERE id ='" . $_SESSION['user']['id'] . "' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                echo '<br/> Email modifié ';
            }
        }
    }
}

?>