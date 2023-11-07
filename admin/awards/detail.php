<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$awardController = new CSVEntityController(APP_PATH.'/data/awards.csv');
$award = $awardController->getItem($_GET['index'] + 1);
?>
    <a href="index.php">Back</a><br><br>
    <h3><?= 'Year: '.$award['0'] ?></h3>
    <h3><?= 'Award: '.$award['1'] ?></h3>
<?php
