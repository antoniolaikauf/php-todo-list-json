<?php

header(('content-type: application/json'));
// policy per server comunicazioni
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");
// lista per compiti 
$lista = [
    [
        'compito' => 'comprare il pane ',
        'done' => false
    ],
    [
        'compito' => 'comprare il cibo per cani ',
        'done' => true
    ],
    [
        'compito' => 'pulire la casa ',
        'done' => true
    ]
];
// trasformata lalista in un json 
$json_lista = json_encode($lista);

echo $json_lista;
// echo $json_lista;
