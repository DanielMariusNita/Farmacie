<?php
if(isset($_POST["submit"]))
{
    //Grabbing the data

    $email=$_POST["email"];
    $parola=$_POST["password"];


    //Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $parola);

    $login->LoginUser();
    header("location: ../index.php?error=none");
}

?>