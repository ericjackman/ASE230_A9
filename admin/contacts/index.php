<?php
require_once '../../lib/readCSV.php';
$contacts = readCSVFile('../../data/contacts.csv');
array_shift($contacts);
?>
<h2>Inbox</h2>
<table>
    <?php
    $ind = 0;
    foreach($contacts as $message) {
        echo '<tr>';
            echo '<th><a href="detail.php?index='.$ind.'">'.$message[1].'</a></th>';
            echo '<th>Name: '.$message[0].'</th>';
            echo '<th>Subject:'.$message[2].'</th>';
        echo '</tr>';
        $ind++;
    }
    ?>
</table>
