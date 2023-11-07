<?php

class CSVFileHandler {
    static public function create($file, $data = array()) {
        $fp = fopen($file, 'w');
        if ($fp === false) return false;
        foreach ($data as $row) {
            fputs($fp, implode(';', $row)."\n");
        }
        fclose($fp);
        return true;
    }

    static public function read($file) {
        if(!file_exists($file) || !is_readable($file)) return false;
        $data = array();
        $fp = fopen($file,'r');
        while($content = fgetcsv($fp, 0, ';')){
            $data[] = $content;
        }
        fclose($fp);
        return $data;
    }

    static public function update($file, $data) {
        if (!file_exists($file)) return false;
        $fp = fopen($file, 'a');
        foreach ($data as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
        return true;
    }

    static public function delete($file) {
        if (!file_exists($file)) return false;
        if (unlink($file)) {
            return true;
        } else {
            return false;
        }
    }
}
