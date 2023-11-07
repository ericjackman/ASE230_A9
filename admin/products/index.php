<?php
    // INDEX.php Shows all the existing products in a list.
require 'products.php';
require_once('../../settings.php');

$products=readJSONFile(APP_PATH.'/data/data.JSON');

$index=0;
echo '<a href="create.php">Create a New Product</a>';
foreach($products as $productname => $details){
    ?>
        <div>
            <h1><?= $details['Name'] ?></h1>
            <a href="detail.php?index=<?= $index ?>">View Details</a> | 
            <a href="edit.php?index=<?= $index ?>">Edit</a> | 
            <a href="delete.php?index=<?= $index ?>">Delete</a>
        </div>
        <hr />
    <?php
    $index++;
}

