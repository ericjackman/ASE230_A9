<?php
// reads the CSV file and returns an array of arrays.
function readCSVFile($file, $sep = ','){
    // check if file exists and is readable. Stolen from bit of code Jacob shared
    if(!file_exists($file) || !is_readable($file)) return false;
	// Everything else below is modified from 09-csv-read.php
    // create array to return
    $outerArray=array();
    // open file with fOpen & get path
    $fp=fopen($file,'r');
    while($content=fgetcsv($fp, 0, $sep)){
        array_push($outerArray,$content);
    }
    return $outerArray;
    // close the file.
    fclose($fp);
}
