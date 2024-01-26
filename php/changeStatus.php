<?php
header(('content-type: application/json'));
// policy per server comunicazioni
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");


// prendere il file json e trasformarlo in linguaggio php 
$fileJson = file_get_contents('lista.json');
$compito = json_decode($fileJson, true);

// codice per modificare il file 
$changestatus = $_GET['index'];

if ($compito[$changestatus]['done']) {
    $compito[$changestatus]['done'] = false;
} else {
    $compito[$changestatus]['done'] = true;
}
// ritrasformarlo in un jsno
$fileJson = json_encode($compito);
file_put_contents('lista.json', $fileJson);

echo $fileJson;
