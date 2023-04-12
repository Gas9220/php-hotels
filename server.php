<?php
//params
$param = isset($_GET['index']) ? $_GET['index'] : NULL;
$newHotel = isset($_POST['newhotel']) ? $_POST['newhotel'] : NULL;
//lettura file json
$hotels = file_get_contents(__DIR__.'/hotels.json');

//gestione aggiunta hotel
if($newHotel !== NULL){
    $hotels = json_decode($hotels, true);
    $hotels[] = [
        "name" => $newHotel,
        "description" => "Lorem ipsum",
        "parking" => false,
        "vote" => rand(1,5),
        "distance_to_center" => rand(1,100)
    ];

 $hotels = json_encode($hotels);
 file_put_contents(__DIR__.'/hotels.json', $hotels);
}


//filtro hotel
if($param !== NULL){
    $hotels = json_decode($hotels, true);
    $hotels = $hotels[$param];
    $hotels = json_encode($hotels);
}

//restituisco content type: json
header('Content-Type: application/json');

//stampo string json hotel
echo $hotels;



