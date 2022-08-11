<?php

    include 'classes/dbConnect_class.php';
    include 'classes/data_class.php';
    include 'classes/data_controller_class.php';

    echo (new DataContr("","","","","","",""))->getDatas();

?>