<?php
require_once('classes/bdd.php');

class ModifUser extends bdd
{
    public function ShowUtilisateur()
    {
        $con = $this->connectDb();
        $req = $con->prepare("SELECT * FROM utilisateurs WHERE id = '" . $_GET['id'] . "' ");
        $req->execute();
        $result = $req->fetchAll();
        var_dump($_GET['id']);
        foreach ($result as $value) {
            $id = $value['id'];
            $login = $value['login'];
            $email = $value['email'];
            $id_droits = $value['id_droits'];
            var_dump($id);
?>
            <form action="" method="POST">
                <label>Login</label><br />
                <input type="text" name="login" value="<?php echo $login; ?>"><br />
                <label>Mail</label><br />
                <input type="text" name="email" value="<?php echo $email; ?>"><br />
                <label>ID droit</label><br />
                <input type="text" name="id_droits" value="<?php echo $id_droits; ?>"><br />
                <input type="submit" name="modifier" value="Modifier">
            </form>
<?php
            if (isset($_POST['modifier'])) {
                $newLogin = htmlspecialchars($_POST['login']);
                $newEmail = htmlspecialchars($_POST['email']);
                $newId_droits = htmlspecialchars($_POST['id_droits']);

                if (!empty($_POST['login'])) {
                    $reqID = $con->prepare("UPDATE utilisateurs SET  login = '$newLogin' WHERE id = '" . $id . "' ");
                    $reqID->execute();
                }
                if (!empty($_POST['email'])) {
                    $reqEmail = $con->prepare("UPDATE utilisateurs SET  email = '$newEmail' WHERE id = '" . $id . "' ");
                    $reqEmail->execute();
                    
                }
                if (!empty($_POST['id_droits'])) {
                    $reqIddroits = $con->prepare("UPDATE utilisateurs SET  id_droits = '$newId_droits' WHERE id = '" . $id . "' ");
                    $reqIddroits->execute();
                }
                header("location:http://localhost:8888/blog/modifier_utilisateur.php?id=".$id." ");
            }
        }
    }
}


?>