<?php

class LoginContr extends Login
{

    private $username;
    private $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function LoginUser()
    {
        if ($this->emptyInput()) {
            header('Location: ../../login.php?error=emptyInput');
            exit();
        }

        $this->getUser($this->username, $this->pwd);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->username) || empty($this->pwd)) {
            $result = true;
        }
        return $result;
    }

}