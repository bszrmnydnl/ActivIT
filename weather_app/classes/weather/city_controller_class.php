<?php

class CityContr extends City
{
    private $name;
    private $latitude;
    private $longitude;

    public function __construct($name, $latitude, $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function addCity($name, $latitude, $longitude)
    {
        if ($this->cityExists()) {
            header('Location: ../../settings.php?error=cityExists');
            exit();
        }

        $this->insertCity($this->name, $this->latitude, $this->longitude);
    }

    public function getCities(){
        return $this->selectCities();
    }

    public function deleteCity(){
        $this->removeCity($this->name);
    }

    private function cityExists()
    {
        $result = false;
        if ($this->checkCity($this->name)) {
            $result = true;
        }
        return $result;
    }
}

?>