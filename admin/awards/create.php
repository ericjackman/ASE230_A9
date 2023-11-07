<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

if(count($_POST) > 0) {
	$awardController = new CSVEntityController(APP_PATH.'/data/awards.csv');
    $newAward = array($_POST['year'], $_POST['achievement']);
    $awardController->addItem($newAward);
    header('location: index.php');
} else {
?>
<a href="index.php">Back</a><br><br>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<input type="text" name="year" placeholder="Year" /><br />
	<textarea name="achievement" placeholder="Achievement"></textarea><br />
	<button type="submit" a href="index.php">Create</button>
</form>
<?php 
}
