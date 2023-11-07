<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$teamController = new CSVEntityController(APP_PATH.'/data/teams.csv');
$teamData = $teamController->getAllItems();
?>
<h2>Team Members</h2>
<table>
    <?php
    $ind = 0;
    foreach($teamData as $member) {
        echo '<tr>';
            echo '<th><a href="detail.php?index='.$ind.'">'.$member[0].'</a></th>';
            echo '<th>'.$member[1].'</th>';
        echo '</tr>';
        $ind++;
    }
    ?>
</table>
<br><br>
<a href="create.php">Add another member</a>
