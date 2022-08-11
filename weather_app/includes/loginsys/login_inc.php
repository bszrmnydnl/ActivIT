<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pwd = $_POST["password"];

    include "../../classes/dbConnect_class.php ";
    include "../../classes/loginsys/login_class.php";
    include "../../classes/loginsys/login_controller_class.php";

    $login = new LoginContr($username, $pwd);

    $login->LoginUser($username, $pwd);

    header('Location: ../../index.php?error=none');

}

?>