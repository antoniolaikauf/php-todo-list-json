<?php

header(('content-type: application/json'));

header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");
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

$json_lista = json_encode($lista);
echo $json_lista;
