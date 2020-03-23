<html>
<title>Search</title>
<head>
	  <link rel="stylesheet" type="text/css" href="css/estilos.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<form method="POST" action="">
	<div class="in1">
	Id:<input class="form-control" type="text" name="id"></input>
    Name:<input class="form-control" type="text" name="name"></input>
    Country:<input class="form-control" type="text" name="country"></input><br></div>
    <button type="submit" class="btn btn-secondary ">Search</button></div>
	</form>
    <table class="table table-dark table-bordered tabla5">
  	<thead>
  	<tr>
  	   <th scope="col">ID</th>
  	   <th scope="col">First Name</th>
  	   <th scope="col">Last Name</th>
       <th scope="col">Country</th>
  	   <th scope="col">City</th>
  	   <th scope="col">District</th>
  	   <th scope="col">Street</th>
  	   <th scope="col">#In</th>
  	   <th scope="col">#Out</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php
include("conexion.php");
error_reporting(0);
$id = $_POST["id"];
$name = $_POST["name"];
$country = $_POST["country"];
	$filter = ["Firstname"=> $name];
	$options=[ ['Firstname' => 1], ['_id' => 1], ['Country' => 1]  ]; 
	$query= new MongoDB\Driver\Query($filter, $options);
	$rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
	foreach($rows as $r){
		$r = json_decode(json_encode($r),true);
	}
 	$filter = ["Country"=>$country];
	$options=[ ['Firstname' => 1], ['_id' => 1], ['Country' => 1]  ]; 
	$query= new MongoDB\Driver\Query($filter, $options);
	$rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
	foreach($rows as $r){
		$r = json_decode(json_encode($r),true);
	}
 	$filter = ["_id"=>intval($id)];
	$options=[ ['Firstname' => 1], ['_id' => 1], ['Country' => 1]  ]; 
	$query= new MongoDB\Driver\Query($filter, $options);
	$rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
	foreach($rows as $r){
		$r = json_decode(json_encode($r),true);
	}
	printf("<tr><th>%d</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th>",
 	$r['_id'],
	$r['Firstname'],
 	$r['Lastname'],
 	$r['Country'],
 	$r['City'], 
 	$r['District'],
 	$r["Address"]["street"],
 	$r["Address"]["InNumb"],
 	$r["Address"]["ExtNumb"],
 	$r["Status"]);


  	?>
  	</tbody>