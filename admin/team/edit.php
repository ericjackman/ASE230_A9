<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

$teamController = new CSVEntityController(APP_PATH.'/data/teams.csv');
$teamMember = $teamController->getItem($_GET['index']);

if(count($_POST)>0){
    $updatedTeamMember = array($_POST['name'], $_POST['title'], $_POST['description'], $_FILES['image']['name']);
    $teamController->updateItem($updatedTeamMember, $_GET['index']);
    move_uploaded_file($_FILES['image']['tmp_name'], APP_PATH.'/images/team/'.$_FILES['image']['name']);
    header('location: index.php');
}
?>
    <a href="index.php">Back</a><br><br>
            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" enctype="multipart/form-data">
                <div>
                    <label>Name</label><br>
                    <input type="text" name="name" value="<?= $teamMember[0] ?>"  />
                </div><br>
                <div>
                    <label>Title</label><br>
                    <input type="text" name="title" value="<?= $teamMember[1] ?>" />
                </div><br>
                <div>
                    <label>Description</label><br>
                    <textarea name="description" cols="30" rows="10"><?= $teamMember[2] ?></textarea>
                </div><br>
                <div>
                    <label>Update Profile Picture</label><br>
                    <input type="file" name="image" />
                </div><br><br>
                <button type="submit">Save Changes</button>
            </form>
