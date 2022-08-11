<?php
echo "1";
if (isset($_POST["iban"])) {
    echo "2";
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $street = $_POST["street"];
    $number = $_POST["no"];
    $zipcode = $_POST["zip"];
    $municipality = $_POST["town"];
    $iban = $_POST["iban"];

    include "../classes/dbConnect_class.php ";
    include "../classes/data_class.php";
    include "../classes/data_controller_class.php";

    $data = new DataContr($firstname, $lastname, $street, $number, $zipcode, $municipality, $iban);
    $data->addData();

    header('Location: ../index.php?error=none');

}

?>