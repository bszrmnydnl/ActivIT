<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdrpt = $_POST["password_rpt"];

    include "../../classes/dbConnect_class.php ";
    include "../../classes/loginsys/register_class.php";
    include "../../classes/loginsys/register_controller_class.php";

    $register = new RegisterContr($username, $email, $pwd, $pwdrpt);
    $register->setUser($username, $email, $pwd);

    header('Location: ../../login.php?error=none');

}

?>