<?php
require_once('../../settings.php');
require '../../lib/readCSV.php';
// Assuming you've set up a function `getAllItems` in an included file.
$fp=fopen(APP_PATH.'/data/pages.csv','r');
?>
<a href="create.php">Add a new item</a>
<table>
    <?php
    $index=0;
    while(!feof($fp)){
        $line=trim(fgets($fp));
        if(strlen($line)>0){
            $line=explode(',',$line);
            echo '<tr><td>'.$line[0].'</td>';
            echo '<td>'.$line[1].'</td>';
            echo '<td><a href="detail.php?index='.$index.'">Detail</a></td>';
            echo '<td><a href="edit.php?index='.$index.'">Edit</a></td>';
            echo '<td><a href="delete.php?index='.$index.'">Delete</a></td>';
            echo '</tr>';
        }
        $index++;
    }
    fclose($fp);
    ?>
</table>

<a href="create.php">Create New Page</a>
