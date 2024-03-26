<?php
if(isset($_POST["submit"]))
{
    //Grabbing the data
    $nume=$_POST["nume"];
    $prenume=$_POST["prenume"];
    $email=$_POST["email"];
    $parola=$_POST["password"];
    $pwdrepeat=$_POST["confirmareParola"];

    //Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup= new SignupContr($nume, $prenume, $email, $parola, $pwdrepeat);

    $signup->signupUser();
    header("location: ../index.php?error=none");
}

?>