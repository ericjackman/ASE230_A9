<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$teamController = new CSVEntityController(APP_PATH.'/data/teams.csv');
$teamMember = $teamController->getItem($_GET['index']);
unlink(APP_PATH.'/images/team/'.$teamMember[3]);
$teamController->deleteItem($_GET['index']);
header('location: index.php');
