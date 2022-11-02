<?php 
    
    
    $data = [];
    if(($file = fopen("db/onepiece_datos.csv" , "r")) !== FALSE) {
        while (($csv = fgetcsv($file, 1000, ",")) !== FALSE){
            $data[] = $csv;
        }
        fclose($file);
    }
    print_r($data);
?>