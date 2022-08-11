<?php

    include 'classes/dbConnect_class.php';
    include 'classes/weather/city_class.php';
    include 'classes/weather/city_controller_class.php';

    echo (new CityContr("","",""))->getCities();

?>


