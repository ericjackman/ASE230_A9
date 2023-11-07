<?php
// EDIT.php: alter an already existing product.

require 'products.php';
require_once('../../settings.php');

$products=readJSONFile(APP_PATH.'/data/data.JSON');
$product=$products[$_GET['index']];

// seperating the applications into their own array.
$applications=$product['Applications'];
$appKeys = array_keys($applications);

$i=0;

// did user submit the form?
if(count($_POST)>0){
    // create applications array
    // check if there is data in first applicationName field.
    if($_POST['applicationName']!='')
    {
        // if the second field for application names is not empty.
        if(isset($_POST['applicationName1']))
        {
            $applications=array($_POST['applicationName']=>$_POST['applicationDescription'],$_POST['applicationName1']=>$_POST['applicationDescription1']);
        }
        else{
            // only load the first application Name & Description in.
            $applications=array($_POST['applicationName']=>$_POST['applicationDescription']);
        } 
    }else{
        // create empty array for applications.
        $applications=array();
    }

    // check if update successful.
    $result = updateInJSON(APP_PATH.'/data/data.json',$applications,$_GET['index']);
    if($result==true)
    {
        header('location: index.php');
    }
}else{
?>
<a href="index.php">Product Index</a>
<form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
    <div>
        <label>Product Name</label><br />
        <input type="text" name="productName" value="<?= $product['Name'] ?>" />
    </div>
    <div>
        <label>Description</label><br />
        <textarea name="productDescription"><?= $product['Description'] ?></textarea><br />
    </div>
    <div>
    <label>Applications</label><br />
    <?php
        while($i < count($applications)){
            if($i==0)
            {
                echo '<div>';
                echo '<label>Application Name</label><br />';
                echo '<input type="text" name="applicationName" value="'.$appKeys[$i].'"/>';
                echo '</div>';
                echo '<div>';
                echo '<label>Application Description</label><br />';
                echo '<textarea name="applicationDescription">'.$applications[$appKeys[$i]] .'</textarea><br />';
                echo '</div>';
            }
            else{
                echo '<div>';
                echo '<label>Application Name</label><br />';
                echo '<input type="text" name="applicationName'.$i.'" value="'.$appKeys[$i].'"/>';
                echo '</div>';
                echo '<div>';
                echo '<label>Application Description</label><br />';
                echo '<textarea name="applicationDescription'.$i.'">'.$applications[$appKeys[$i]] .'</textarea><br />';
                echo '</div>';

            }
            $i++;
        }
    ?>
    </div>
    <div>
	    <button type="submit" a href="index.php">Edit</button>
    </div>
</form>
<?php 
}