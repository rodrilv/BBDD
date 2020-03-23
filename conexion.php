<?php
try{
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;
}catch(Exception $e){
	echo "Couldn't connect to DB";
}
?>