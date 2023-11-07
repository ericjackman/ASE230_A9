<?php
// reads the text file and returns a string
function readTxtFile($file){
    if(!file_exists($file) || !is_readable($file)) return false;

    return file_get_contents($file);
}
