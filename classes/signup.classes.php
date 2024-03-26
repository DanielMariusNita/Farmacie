<?php
class Signup  extends Dbh {
    protected function setUser($nume, $prenume, $email, $parola){
        $utilizator="Utilizator";
        $stmt = $this->connect()->prepare('INSERT INTO utilizatori (Nume, Rol, Prenume, Email, Parola, Domiciliu) VALUES (?, "Utilizator", ?, ?, ?, NULL);');
        //$hashedPwd = password_hash($parola, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($nume, $prenume, $email, $parola))){
            $stmt=null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }

    protected function checkUser($nume, $prenume, $email){
        $stmt = $this->connect()->prepare('SELECT UtilizatorID FROM utilizatori WHERE Email = ? OR Nume + " " + Prenume = ?;');

        if(!$stmt->execute(array($nume, $prenume, $email))){
            $stmt=null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck=true;
        if($stmt->rowCount() > 0){
            $resultCheck=false;
        }
        else{
            $resultCheck=true;
        }
        return $resultCheck;
    }
}
?>