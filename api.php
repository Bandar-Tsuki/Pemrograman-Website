<?php
// Atur header untuk memberitahu bahwa ini adalah respons JSON
header('Content-Type: application/json');

// Konversi data ke format JSON
$jsonData = json_encode($data);

// Keluarkan data JSON sebagai respons
echo $jsonData;
