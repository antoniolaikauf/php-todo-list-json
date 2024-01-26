<?php
// leggerlo in json
header(('content-type: application/json'));
// policy per server comunicazioni
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");

// prendere il file json e trasformarlo in linguaggio php 
$fileJson = file_get_contents('lista.json');
$compito = json_decode($fileJson, true);

// fare il codice di aggiunta della task dentro al file 
$deleteindex = $_GET['index'];
// elimina il compito dalla lista 
array_splice($compito, $deleteindex, '1');

// ritrasformare il file in un file json e aggiorna automaticamente il file con dentro il componente nuovo 
$fileJson = json_encode($compito);
file_put_contents('lista.json', $fileJson);
// senza l'echo il file sarebbe vuoto
echo $fileJson;
