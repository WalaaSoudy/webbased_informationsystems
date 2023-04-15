<?php

function getID($month, $day)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=" . $month . "&day=" . $day,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: 33401b971emshe443233464b2b58p1bef0fjsn31ec6d4c0d4f"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return $response;
    }
}

function getName($code)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=" . $code,
        CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
		"X-RapidAPI-Key: 33401b971emshe443233464b2b58p1bef0fjsn31ec6d4c0d4f"
	],
]);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }
}


$k = $_REQUEST['k'];

$month = date("m", strtotime($k));
$day = date("d", strtotime($k));


$response = getID($month, $day);
$response = substr($response, 1, strlen($response) - 1);
$array = explode(",", $response);

for ($i = 0; $i < sizeof($array); $i++) {
    $array[$i] = substr($array[$i], 7, 9);
}

for ($i = 0; $i < sizeof($array); $i++) {
    $str = getName($array[$i]);
    $x = strpos($str, '"name":"');
    $y = strpos($str, '"birthDate":');
    $result_array[$i] = substr($str, $x + 8, $y - $x - 10);
}

for ($i = 0; $i < sizeof($result_array); $i++) {
    echo $result_array[$i] . "<br>";
}
