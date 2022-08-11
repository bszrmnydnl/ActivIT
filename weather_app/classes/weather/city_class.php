<?php

class City extends dbConnect
{

    public function insertCity($name, $latitude, $longitude)
    {
        ob_start();
        session_start();
        $stmt = $this->connect()->prepare('INSERT INTO `cities`(`name`, `latitude`, `longitude`, `uid` ) VALUES (?,?,?,?)');

        if (!$stmt->execute(array($name, $latitude, $longitude, $_SESSION["userid"]))) {
            header('Location: ../../settings.php?error='. $_SESSION["userid"] . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }

        $stmt = null;
    }

    public function selectCities(){
        $stmt = $this->connect()->prepare('SELECT `name`, `latitude`, `longitude` FROM `cities` WHERE `uid`=?;');

        if (!$stmt->execute(array($_SESSION["userid"]))) {
            header('Location: ../../settings.php?error=' . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }

        $city_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $table = "";
        foreach($city_datas as $city_data){
            $table = $table . '<tr>
                                    <td>'. $city_data["name"] .'</td>
                                    <td>'. $city_data["latitude"] .'<br></td>
                                    <td>'. $city_data["longitude"] .'<br></td>
                                    <td>
                                    <form action="includes/weather/delete_city_inc.php" method="post">
                                        <input type="hidden" value="'. $city_data["name"] .'" id="name" name="name">
                                        <button class="btn btn-danger btn-sm" type="submit" name="submit" style="width: 70px;">
                                            Delete
                                        </button>
                                    </form>
                                    </td>
                                </tr>';
        }

        $stmt = null;
        return $table;
    }

    public function getTemps(){
        $stmt = $this->connect()->prepare('SELECT `name`, `latitude`, `longitude` FROM `cities` WHERE `uid`=?;');

        if (!$stmt->execute(array($_SESSION["userid"]))) {
            header('Location: ../../settings.php?error=' . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }

        $city_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $columns = "";
        foreach($city_datas as $city_data){
            $temperature = $this->getTemp($city_data["latitude"], $city_data["longitude"]);
            $columns = $columns . '<div class="col-lg-6 col-xl-2 mb-4">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <p class="m-0">'. $city_data["name"] .'</p>
                                        <p class="text-white-50 small m-0">'. $temperature .'°C</p>
                                    </div>
                                </div>
                            </div>';
        }

        $stmt = null;
        return $columns;
    }

    public function removeCity($name){
        $stmt = $this->connect()->prepare('DELETE FROM `cities` WHERE `name`=?;');

        if (!$stmt->execute(array($name))) {
            header('Location: ../../settings.php?error=' . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }
    }

    protected function checkCity($name)
    {
        $stmt = $this->connect()->prepare('SELECT `name` FROM cities WHERE name = ? AND uid = ?;');

        if (!$stmt->execute(array($name, $_SESSION["userid"]))) {
            header('Location: ../../settings.php?error=' . json_encode($stmt->errorInfo()));
            $stmt = null;
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    public function getTemp($latitude, $longitude){
        $url = 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat='. $latitude .'&lon=' . $longitude;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'User-Agent: testing boszormenyi.daniel@outlook.com',
            'Accept: application/json'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_encode(json_decode($response, true)["properties"]["timeseries"]["0"]["data"]["instant"]["details"]["air_temperature"]);
    }

}

?>