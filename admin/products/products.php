<?php
    // functions for retrieving and indexing all items, showing a specific item, creating an item, modifying an item, and deleting an item from the database

    // reads json file and turns it into an array.
    function readJSONFile($file){
        // check if file exists and is readable. Stolen from bit of code Jacob shared
        if(!file_exists($file) || !is_readable($file)) return false;

        $content=file_get_contents($file);
        $content=json_decode($content,true);

        return $content;
    }

    // returns a single product's information from the larger array.
    function getProduct($array,$index){
        $product = $array[$index];

        return $product;
    }

    function createInJSON($file,$applications){
        if(!file_exists($file) || !is_readable($file)) return false;
        // read file.
        $products=file_get_contents($file);
        // convert string into a PHP array
        $content=json_decode($products,true);

        // add new Item into the array
        $content[]=array('Name'=>$_POST['productName'],'Description'=>$_POST['productDescription'],'Applications'=>$applications);
        // Encode the array into a JSON string
        $content=json_encode($content,JSON_PRETTY_PRINT);
        // Save the file
        file_put_contents($file,$content);

        return true;
    }

    function  updateInJSON($file,$array,$index){
         // read file.
         $products=file_get_contents($file);
         // convert string into a PHP array
         $products=json_decode($products,true);
        
         // 
        $product=array('Name'=>$_POST['productName'],'Description'=>$_POST['productDescription'],'Applications'=>$array);
        // update the element
        $products[$index]=$product;

        // Encode the array into a JSON string
        $products=json_encode($products,JSON_PRETTY_PRINT);
        // Save the file
        file_put_contents($file,$products);
 
         return true;
    }

    function deleteFromJSON($file,$array,$index){
                 // read file.
                 $products=file_get_contents($file);
                 // convert string into a PHP array
                 $products=json_decode($products,true);
                
                 // 
                $product=array('Name'=>$_POST['productName'],'Description'=>$_POST['productDescription'],'Applications'=>$array);

                // remove the element
                unset($products[$index]);
                
                // restores array as index array.
                $products=array_values($products);
        
                // Encode the array into a JSON string
                $products=json_encode($products,JSON_PRETTY_PRINT);
                // Save the file
                file_put_contents($file,$products);
         
                 return true;
    }