<?php
require_once('bdd.class.php');

class ModifUser extends bdd
{
    public function ShowUtilisateur()
    {
        $getId = $_GET['id'];
        $con = $this->connectDb();
        $req = $con->prepare("SELECT * FROM utilisateurs WHERE id = :getId ");
        $req->bindValue('getId', $getId, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll();
        foreach ($result as $value) {
            $id = $value['id'];
            $login = $value['login'];
            $username = $value['username'];
            $email = $value['email'];
            $id_droits = $value['id_droits'];
?>
            <form action="" method="POST">
                <label>Login</label><br />
                <input type="text" name="login" value="<?php echo $login; ?>"><br />
                <label>Username</label><br />
                <input type="text" name="username" value="<?php echo $username; ?>"><br />
                <label>Mail</label><br />
                <input type="text" name="email" value="<?php echo $email; ?>"><br />
                <label>ID droit</label><br />
                <input type="text" name="id_droits" value="<?php echo $id_droits; ?>"><br />
                <input type="submit" name="modifier" value="Modifier">
            </form>
<?php
            if (isset($_POST['modifier'])) {
                $newLogin = htmlspecialchars($_POST['login']);
                $newUsername = htmlspecialchars($_POST['username']);
                $newEmail = htmlspecialchars($_POST['email']);
                $newId_droits = htmlspecialchars($_POST['id_droits']);

                if (!empty($_POST['login'])) {
                    $reqID = $con->prepare("UPDATE utilisateurs SET  login = :newLogin WHERE id = :id ");
                    $reqID->bindValue('newLogin', $newLogin, PDO::PARAM_STR);
                    $reqID->bindValue('id', $id, PDO::PARAM_INT);
                    $reqID->execute();
                }
                if (!empty($_POST['username'])) {
                    $reqUser = $con->prepare("UPDATE utilisateurs SET  username = :newUsername WHERE id = :id ");
                    $reqUser->bindValue('newUsername', $newUsername, PDO::PARAM_STR);
                    $reqUser->bindValue('id', $id, PDO::PARAM_INT);
                    $reqUser->execute();
                }
                if (!empty($_POST['email'])) {
                    $reqEmail = $con->prepare("UPDATE utilisateurs SET  email = :newEmail WHERE id = :id ");
                    $reqEmail->bindValue('newEmail', $newEmail, PDO::PARAM_STR);
                    $reqEmail->bindValue('id', $id, PDO::PARAM_INT);
                    $reqEmail->execute();
                    
                }
                if (!empty($_POST['id_droits'])) {
                    $reqIdDroits = $con->prepare("UPDATE utilisateurs SET  id_droits = :newIdDroits WHERE id = :id ");
                    $reqIdDroits->bindValue('newIdDroits', $newId_droits, PDO::PARAM_INT);
                    $reqIdDroits->bindValue('id', $id, PDO::PARAM_INT);
                    $reqIdDroits->execute();
                }
                header("Refresh: 0;url=http://localhost/blog/Admin/admin.php");
            }
        }
    }
}


?>