<?php
// DETAIL.php: show one of the products in detail.
require 'products.php';
require_once('../../settings.php');

$products=readJSONFile(APP_PATH.'/data/data.json');

$index=$_GET['index'];
$product = getProduct($products,$index);

// seperating the applications into their own array.
$applications=$product['Applications'];
$appKeys = array_keys($applications);

print_r(count($applications));

$i=0;
?>
<div>
    <a href="index.php">Product Index</a> | <a href="edit.php?index=<?= $index ?>">Edit Product</a>
    <h2><?= $product['Name'] ?></h2>
    <p><?= $product['Description'] ?></p>
    <h3>Applications</h3>
    <?php 
        while($i < count($applications)){
            echo '<p>'.$appKeys[$i].': '.$applications[$appKeys[$i]].'</p>';
            $i++;
        }
    ?>
           
</div>
<?php 