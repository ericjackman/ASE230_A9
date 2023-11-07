<?php
function readJson($filename) {
    if (!file_exists($filename)) {
        return "File not found!";
    }
    $fileContent = file_get_contents($filename);

    $data = json_decode($fileContent, true);

    return $data;
}