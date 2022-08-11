<?php

class Login extends dbConnect
{

    protected function getUser($username, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header('Location: ../../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../../login.php?error=wrongUsernameOrEmail');
            exit();
        }

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $data[0]["password"]);

        if (!$checkPwd) {
            $stmt = null;
            header('Location: ../../login.php?error=wrongPassword');
            exit();
        } elseif ($checkPwd) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE `username` = ? OR `email` = ? AND `password` = ?;');

            if (!$stmt->execute(array($username, $username, $pwd))) {
                $stmt = null;
                header('Location: ../../index.php?error=stmtfailed');
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header('Location: ../../login.php?error=wrongUsernameOrEmail');
                exit();
            }

            $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user_data[0]["uid"];
            $_SESSION["username"] = $user_data[0]["username"];

        }


        $stmt = null;
    }

}