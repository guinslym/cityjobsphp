<?php 

$string = file_get_contents("emplois.json");
$json_content = json_decode($string, true);


foreach($json_content as $key=>$value){

        //print_r($value);
        $iterator = new RecursiveArrayIterator($value);
while ($iterator->valid()) {

    if ($iterator->hasChildren()) {
        // print all children
        foreach ($iterator->getChildren() as $key => $value) {
        	if ($key =='POSTDATE'){

            echo $key . ' : ' . $value . "\n";
        	}
        }
    } else {
        echo "No children.\n";
    }

    $iterator->next();
}
	/*
    foreach($value as $key => $personal)
    {
        print_r($personal);
    }
    */
}
?>

