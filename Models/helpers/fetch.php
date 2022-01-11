<?php

class FetchData
{
    static function fetch(string $class)
    {

        $url = "https://rozvrh.spse.cz/index.php";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $time = time();

        $data = '
        {
          "cmd": "get",
          "data": { "id": "' . $class . '", "date": ' . $time . '000 }
        }';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        return json_decode($resp, true);
    }

}



