<?php

class SignupContr extends Signup{
    private $nume;
    private $prenume;
    private $email;
    private $parola;
    private $pwdrepeat;

    public function __construct($nume, $prenume, $email, $parola, $pwdrepeat)
    {
        $this->nume=$nume;
        $this->prenume=$prenume;
        $this->email=$email;
        $this->parola=$parola;
        $this->pwdrepeat=$pwdrepeat;

    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->setUser($this->nume, $this->prenume, $this->email, $this->parola);
    }

    private function emptyInput(){
        $result=true;
        if(empty($this->nume) || empty($this->prenume) || empty($this->email) || empty($this->parola) || empty($this->pwdrepeat)){
            $result=false;
        }
        else {
            $result=true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result=true;
        if($this->parola !== $this->pwdrepeat){
            $result=false;
        }
        else {
            $result=true;
        }
        return $result;
    }

}

?>