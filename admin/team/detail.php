<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$teamController = new CSVEntityController(APP_PATH.'/data/teams.csv');
$teamData = $teamController->getAllItems();
$ind = $_GET['index'];
?>

<table>
    <tr>
        <th><a href="index.php">Back</a></th>
        <th><a href="edit.php?index=<?= $ind + 1 ?>">Edit</a></th>
        <th><a href="delete.php?index=<?= $ind + 1 ?>">Delete</a></th>
    </tr>
</table>

<?php
echo '<h1>'.$teamData[$ind][0].'</h1>';
echo '<h2>'.$teamData[$ind][1].'</h2>';
echo '<h4>'.$teamData[$ind][2].'</h4>';
echo '<img src="../../images/team/'.$teamData[$ind][3].'" alt="'.$teamData[$ind][0].'">';
?>
