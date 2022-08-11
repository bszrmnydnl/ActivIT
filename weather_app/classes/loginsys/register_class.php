<?php

class Register extends dbConnect
{

    public function setUser($username, $email, $pwd)
    {
        $stmt = $this->connect()->prepare('INSERT INTO `users`(`username`, `password`, `email`) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $hashedPwd, $email))) {
            header('Location: ../../login.php?error=' . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username, $email)
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header('Location: ../../login.php?error=stmtfailed2');
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}