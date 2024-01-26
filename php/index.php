<?php

header(('content-type: application/json'));
// policy per server comunicazioni
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");

$json_lista = file_get_contents('lista.json');

echo $json_lista;
