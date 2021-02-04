<?php 
require_once('../classes/bdd.class.php');
class modprofil extends bdd{
    
    public function profil()
    {

        if (isset($_POST['modifier'])) {
            $id = $_SESSION['user']['id'];
            $log = $_SESSION['user']['login'];
            $con = $this->connectDb();
            $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE login = '$log' ");
            $stmt->execute();
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            $userName = htmlspecialchars($_POST['username']);
            $login = htmlspecialchars($_POST['login']);
            $mdp = htmlspecialchars($_POST['password']);
            $conf =  htmlspecialchars($_POST['confpass']);
            $email = htmlspecialchars($_POST['email']);
            $options = ['cost' => 12,];
            $hash = password_hash($mdp, PASSWORD_BCRYPT, $options);

            if (isset($_POST['username']) && !empty($_POST['username'])){
                $requete = "UPDATE utilisateurs SET username='$userName' WHERE id = '$id' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['username'] = $userName;
                echo '<br /> Nom d\'utilisateur mis a jour';
            }

            if (isset($_POST['login']) && !empty($_POST['login'])) {
                $requete = "UPDATE utilisateurs SET login='$login' WHERE id = '$id' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['login'] = $_POST['login'];
                echo '<br/> Login modifié ';
            }
            if ($mdp != $conf) {
                echo ('<br/> Mot de passe incorrecte ');
                return false;
            } elseif (isset($_POST['password']) || isset($_POST['confpass']) && !empty($_POST['password']) && !empty($_POST['confpass'])) {

                $requete = "UPDATE utilisateurs SET password='$hash' WHERE id = '$id' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['password'] = $_POST['password'];

                echo '<br/> Mot de passe modifié ';
            }
            if(isset($_POST['email']) && !empty($_POST['email'])){
                $requete = "UPDATE utilisateurs SET email='$email' WHERE id = '$id' ";
                $sql = $con->prepare($requete);
                $sql->execute();
                $_SESSION['email'] = $_POST['email'];
                echo '<br/> Email modifié ';



            }
        }
    }
}

?>