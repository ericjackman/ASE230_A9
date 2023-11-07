<?php
require_once('../../settings.php');
require_once('../../lib/CSVEntityController.php');

if(count($_POST) > 0) {
    $teamController = new CSVEntityController(APP_PATH.'/data/teams.csv');
    $newMember = array($_POST['name'], $_POST['title'], $_POST['description'], $_FILES['image']['name']);
    $teamController->addItem($newMember);
    move_uploaded_file($_FILES['image']['tmp_name'], APP_PATH.'/images/team/'.$_FILES['image']['name']);
    header('location: index.php');
} else {
?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <div>
        <label>Name</label><br>
        <input type="text" name="name" />
    </div><br>
    <div>
        <label>Title</label><br>
        <input type="text" name="title" />
    </div><br>
    <div>
        <label>Description</label><br>
        <textarea name="description" cols="30" rows="10"></textarea>
    </div><br>
    <div>
        <label>Profile Picture</label><br>
        <input type="file" name="image" />
    </div><br>
    <button type="Submit">Create item</button>
</form>
<?php
}
?>
