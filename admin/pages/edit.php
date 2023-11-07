<?php
require_once('../../settings.php');
require '../../lib/readCSV.php';

if(count($_POST)>0){
    $output='';
    $fp=fopen(APP_PATH.'/data/pages.csv','r');
    $index=0;
    while(!feof($fp)){
        $line=fgets($fp);
        if($index==$_GET['index']){
            // modify line
            $output.=$_POST['name'].','.$_POST['index'].PHP_EOL;
        }else{
            $output.=$line;
        }
        $index++;
    }
    fclose($fp);
    $fp=fopen(APP_PATH.'/data/pages.csv','w');
    fputs($fp,$output);
    fclose($fp);
    header("Location: index.php");
}
$fp=fopen(APP_PATH.'/data/pages.csv','r');
?>
    <a href="index.php">Go back to index</a><br />
<?php
$index=0;
while(!feof($fp)){
    $line=trim(fgets($fp));
    if($_GET['index']==$index){
        if(strlen($line)>0){
            $line=explode(',',$line);
            ?>

            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>">
                <div>
                    <label>Name</label><br />
                    <input type="text" name="name" value="<?= $line[2] ?>"  />
                </div>
                <div>
                    <label>ID</label><br />
                    <input type="text" name="index" value="<?= $line[3] ?>"  />
                </div>
                <button type="submit">Edit item</button>
            </form>
            <?php
        }
        break;
    }
    $index++;
}
fclose($fp);