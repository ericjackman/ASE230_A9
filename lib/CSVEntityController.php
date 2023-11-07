<?php
require_once('CSVFileHandler.php');

class CSVEntityController {
    private $file;

    function __construct($file) {
        $this->file = $file;
    }

    public function getAllItems() {
        $data = CSVFileHandler::read($this->file);
        unset($data[0]);
        return array_values($data);
    }

    public function getItem($index) {
        $data = CSVFileHandler::read($this->file);
        if ($data === false) return false;
        if ($index > sizeof($data) - 1) return false;
        return $data[$index];
    }

    public function addItem($item) {
        $data = CSVFileHandler::read($this->file);
        if ($data === false) return false;
        $data[] = $item;
        CSVFileHandler::create($this->file, $data);
        return true;
    }

    public function updateItem($item, $index) {
        $data = CSVFileHandler::read($this->file);
        if ($data === false) return false;
        if ($index > sizeof($data)) return false;
        $data[$index] = $item;
        CSVFileHandler::create($this->file, $data);
        return true;
    }

    public function deleteItem($index) {
        $data = CSVFileHandler::read($this->file);
        if ($data === false) return false;
        if ($index > sizeof($data) - 1) return false;
        unset($data[$index]);
        $data = array_values($data);
        CSVFileHandler::create($this->file, $data);
        return true;
    }
}
