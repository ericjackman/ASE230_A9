<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$awardController = new CSVEntityController(APP_PATH.'/data/awards.csv');
$content = $awardController->getAllItems();
$index = 0;
?>
<div>
    <a href="create.php">Add a new award</a>
</div><br><br><hr />
<?php 
foreach($content as $award) {
    ?>
        <div>
            <h3><?= $award['0'].' - '.$award['1'] ?></h3><br />
            <a href="detail.php?index=<?= $index ?>">View Detail</a> | 
            <a href="edit.php?index=<?= $index ?>">Edit</a> | 
            <a href="delete.php?index=<?= $index ?>">Delete</a>
        </div>
        <hr />
    <?php
    $index++;
}
