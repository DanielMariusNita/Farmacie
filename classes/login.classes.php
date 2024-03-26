<?php
class Login  extends Dbh {
    protected function getUser($email, $parola){
        $utilizator="Utilizator";
        $stmt = $this->connect()->prepare('SELECT Parola FROM utilizatori WHERE Email = ?;');
        //$hashedPwd = password_hash($parola, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($email))){
            $stmt=null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt=null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        $pwd=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($parola==$pwd[0]["Parola"]){
            $checkpwd = true;
        } else $checkpwd=false;
        if($checkpwd==false){
            $stmt=null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } else{
            $stmt = $this->connect()->prepare('SELECT * FROM utilizatori WHERE Email = ? AND Parola = ?;');

            if(!$stmt->execute(array($email, $parola))){
                $stmt=null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount()==0){
                $stmt=null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($user[0]["Rol"]);
            session_start();
            $_SESSION["Nume"] = $user[0]["Nume"] ." " . $user[0]["Prenume"];
            $_SESSION["Email"] = $user[0]["Email"];
            $_SESSION["Rol"] = $user[0]["Rol"];
            $_SESSION["UtilizatorID"]= $user[0]["UtilizatorID"];
            }
        

        
        $stmt=null;
    }

}
?>