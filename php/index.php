<?php

header(('content-type: application/json'));
// policy per server comunicazioni
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");
// preso file 
$json_lista = file_get_contents('lista.json');
// senza l'echo il file sarebbe vuoto
echo $json_lista;
