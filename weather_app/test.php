<?php

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

echo json_encode(json_decode($response, true)["properties"]["timeseries"]["0"]["data"]["instant"]["details"]["air_temperature"]);