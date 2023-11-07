<?php
require_once('../../settings.php');
require '../../lib/readCSV.php';

$fp=fopen(APP_PATH.'/data/pages.csv','r');
?>
<?php
$index=0;
while(!feof($fp)){
    $line=trim(fgets($fp));
    if($_GET['index']==$index){
        if(strlen($line)>0){
            $line=explode(',',$line);
            echo 'Page: '.$line[0].'<br />';
            echo 'ID '.$line[1].'<br />';
        }
        break;
    }
    $index++;
}

fclose($fp);
?>
<a href="index.php">Go back to index</a><br />
