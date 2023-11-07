<?php
// CREATE.php: add a product to the already existing json file.

require 'products.php';
require_once('../../settings.php');

if(count($_POST)>0){
    // create applications array
    if($_POST['applicationName']!='')
    {
        // if the second field for application names is not empty.
        if($_POST['applicationName1']!='')
        {
            $applications=array($_POST['applicationName']=>$_POST['applicationDescription'],$_POST['applicationName1']=>$_POST['applicationDescription1']);
        }
        else{
            // only load the first two bits in.
            $applications=array($_POST['applicationName']=>$_POST['applicationDescription']);
        }
    }else{
        // create empty array for applications.
        $applications=array();
    }
    
    $result = createInJSON(APP_PATH.'/data/data.JSON',$applications);

    if($result==true)
    {
        header('location: index.php');
    }
}else{
?>
<a href="index.php">Product Index</a>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <div>
        <label>Product Name</label><br />
        <input type="text" name="productName" placeholder="Product Name" />
    </div>
    <div>
        <label>Description</label><br />
        <textarea name="productDescription" placeholder="Product Description"></textarea><br />
    </div>

    <div>
    <label>Applications</label><br />
        <div>
            <label>Application Name</label><br />
            <input type="text" name="applicationName" placeholder="Application Name"/>
        </div>
        <div>
            <label>Application Description</label><br />
            <input type="text" name="applicationDescription" placeholder="Application Description"/>
        </div>
        <div>
            <label>Application Name</label><br />
            <input type="text" name="applicationName1" placeholder="Application Name"/>
        </div>
        <div>
            <label>Application Description</label><br />
            <input type="text" name="applicationDescription1" placeholder="Application Description"/>
        </div>
    </div>
    <div>
	    <button type="submit" a href="index.php">Create</button>
    </div>
</form>
<?php 
}