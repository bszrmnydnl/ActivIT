<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];

    include "../../classes/dbConnect_class.php ";
    include "../../classes/weather/city_class.php";
    include "../../classes/weather/city_controller_class.php";

    $city = new CityContr($name, "", "");
    $city->deleteCity($name);

    header('Location: ../../settings.php?error=none');

}

?>