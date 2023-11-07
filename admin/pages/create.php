<?php
require_once('../../settings.php');
require '../../lib/readCSV.php';
if(count($_POST)>0){

    $fp=fopen(APP_PATH.'/data/pages.csv','a+');
    fwrite($fp,$_POST['name'].','.$_POST['index'].PHP_EOL);
    fclose($fp);
    header('location: index.php');
}else{
    ?>

    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div>
            <label>Name</label><br />
            <input type="text" name="name" />
        </div>
        <div>
            <label>ID</label><br />
            <input type="text" name="index" />
        </div>
        <button type="submit">Create item</button>
    </form>
    <?php
}