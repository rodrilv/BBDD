<?php
include("conexion.php");
$name = $_POST["name"];
$last = $_POST["last_name"];
$country = $_POST["country"];
	$filter = ["Firstname"=> $name, "Lastname"=> $last, "Country"=>$country];
	$options =[ ['_id' => 1] ]; 
	$query = new MongoDB\Driver\Query($filter, $options);
	$rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
	foreach($rows as $r){
		$r = json_decode(json_encode($r),true);
	}
	$_id1 = $bulk->update(
		["Firstname" => $r["Firstname"], "Lastname"=>$r["Lastname"], "Country"=>$r["Country"]], 
		['$set'=>["Status"=>"true"]],
		["multi"=>"true"]
	); 
		if(!empty($name) && !empty($last) && !empty($country)){
			$result = $m->executeBulkWrite('sample_airbnb.Clients',$bulk);
			echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
		}else{
			echo"<script>alert('Cannot recover without info!')</script>";
     		echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
		}

  ?>