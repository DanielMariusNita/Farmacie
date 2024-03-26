<?php

class LoginContr extends Login
{
    private $email;
    private $parola;


    public function __construct($email, $parola)
    {
        $this->email = $email;
        $this->parola = $parola;
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->email, $this->parola);
    }

    private function emptyInput()
    {
        $result = true;
        if (empty($this->email) || empty($this->parola)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
