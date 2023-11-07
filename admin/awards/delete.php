<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$awardController = new CSVEntityController(APP_PATH.'/data/awards.csv');
$award = $awardController->getItem($_GET['index'] + 1);

if(count($_POST) > 0) {
    $awardController->deleteItem($_GET['index'] + 1);
    header('location: index.php');
} else {
    ?>
    <a href="index.php">Back</a><br><br>
    <h3>Are you sure you wish to delete the following information?</h3>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?index=<?= $_GET['index'] ?>" method="POST">
                <input type="text" name="year" placeholder="Year" value="<?= $award[0]?>" /><br /><br />
                <textarea name="achievement" placeholder="Achievement"><?= $award[1] ?></textarea><br /><br />
                <button type="submit" a href="index.php">Delete</button>
            </form>
            <?php 

}
