<?php
require_once '../../lib/readCSV.php';
$contacts = readCSVFile('../../data/contacts.csv');
array_shift($contacts);
$ind = $_GET['index'];
?>


<?php
echo '<h2>'.$contacts[$ind][1].'</h2>';
echo '<h2>'.$contacts[$ind][0].'</h2>';
echo '<h3>Subject: '.$contacts[$ind][2].'</h3>';
echo '<h3>'.$contacts[$ind][3].'</h3>';
?>
