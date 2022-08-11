<?php

if (isset($_GET["iban"])) {

    $iban = $_GET["iban"];

    include '../classes/dbConnect_class.php';
    include '../classes/data_class.php';
    include '../classes/data_controller_class.php';

    $data = new DataContr("","","","","","", "");
    $data->deleteData($iban);

    header('Location: ../../index.php?error=none');

}

?>