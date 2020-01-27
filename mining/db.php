<?php

// Create connection
$db_connect = new mysqli ("localhost", "root", "", "datamining");

// Check connection
if ($db_connect->connect_error) {
    die("Connection failed: " . $db_connect->connect_error);
}


// // SQL Min 
$sql_min ='SELECT LEAST(kab_pandeglang,kab_lebak,kab_tangerang,kab_serang,kota_tangerang,kota_cilegon,kota_serang,kota_tangerang_selatan) FROM data';

// // SQL Max
$sql_max = 'SELECT GREATEST(kab_pandeglang,kab_lebak,kab_tangerang,kab_serang,kota_tangerang,kota_cilegon,kota_serang,kota_tangerang_selatan) FROM data';



// Another Syntax SQL
?>