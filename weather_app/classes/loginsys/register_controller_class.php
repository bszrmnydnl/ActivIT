<?php

class RegisterContr extends Register
{

    private $username;
    private $email;
    private $pwd;
    private $pwdrpt;

    public function __construct($username, $email, $pwd, $pwdrpt)
    {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdrpt = $pwdrpt;
    }

    public function registerUser()
    {
        if ($this->emptyInput()) {
            header('Location: ../../register.php?error=emptyInput');
            exit();
        }
        if ($this->invalidUsername()) {
            header('Location: ../../register.php?error=invalidUsername');
            exit();
        }
        if ($this->invalidEmail()) {
            header('Location: ../../register.php?error=invalidEmail');
            exit();
        }
        if ($this->pwdMatch()) {
            header('Location: ../../register.php?error=pwdMatch');
            exit();
        }
        if ($this->userExists()) {
            header('Location: ../../register.php?error=userExists');
            exit();
        }

        $this->setUser($this->username, $this->email, $this->pwd);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdrpt)) {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z\d]*$/", $this->username)) {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = false;
        if ($this->pwd !== $this->pwdrpt) {
            $result = true;
        }
        return $result;
    }

    private function userExists()
    {
        $result = false;
        if ($this->checkUser($this->username, $this->email)) {
            $result = true;
        }
        return $result;
    }
}