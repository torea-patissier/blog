<?php
require_once('../classes/bdd.class.php');
class connexion extends bdd {
        // Function pour s'inscrire
    public function connect()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM utilisateurs");// Requete
        $stmt->execute();
        $result = $stmt->fetchAll();     
        if(isset($_POST['connecter'])&& !empty($_POST)){

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        
        for ($i = 0; isset($result[$i]); $i++) { // Boucle for pour parcourir le tableau
            $logcheck = $result[$i]['login']; // On recupère le login dans le tableau parcouru
            $passcheck = $result[$i]['password']; // Et ici le MDP 
            $idcheck = $result[$i]['id'];
            if ($login == $logcheck and password_verify($password, $passcheck) == TRUE) { // Si Login et MDP == aux valeurs dans le tab alors co + Verify pass 
                
                $_SESSION['user'] = $result[$i];
                var_dump($_SESSION['user']);
                // header('location:http://localhost/travail/blog/Profil/profil.php');
                return [$login, $password]; // JA-MAIS DE EXIT DANS LA BOUCLE FOR
            }
        }
        if ($login !== $logcheck and password_verify($password, $passcheck) == FALSE){
            echo 'Identifiant ou mot de passe incorrecte';
            return FALSE; 
        } 
    }    
    }
}
?>
