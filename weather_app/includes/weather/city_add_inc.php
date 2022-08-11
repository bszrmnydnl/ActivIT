<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    include "../../classes/dbConnect_class.php ";
    include "../../classes/weather/city_class.php";
    include "../../classes/weather/city_controller_class.php";

    $city = new CityContr($name, $latitude, $longitude);
    $city->addCity($name, $latitude, $longitude);

    header('Location: ../../settings.php?error=none');

}

?>