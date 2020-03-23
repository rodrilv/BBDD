<?php
  		include("conexion.php");
  		error_reporting(0);
  		$fname = $_POST["fname"];
  		$lname = $_POST["lname"];
  		$street = $_POST["street"];
  		$intnum = $_POST["intnum"];
  		$extnum = $_POST["extnum"];
  		$city = $_POST["city"];
  		$district = $_POST["district"];
  		$country = $_POST["country"];
    $filter = [];
    $options =[ ['_id' => 1] ]; 
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
      foreach($rows as $r){
        $r = json_decode(json_encode($r),true);
      }
  		$document = [ 
  		 '_id' => $r['_id']+1,		
  		 'Firstname' => $fname,
  		 'Lastname' => $lname, 
  		 'Country' => $country,
       'City' => $city, 
  		 'District' => $district,
  		 'Address' => ['street'=>$street, "InNumb"=>$intnum, "ExtNumb"=>$extnum],
       'Status' => 'true'
		];
		$_id1 = $bulk->insert($document);
		//var_dump($document);
		if(!empty($fname) && !empty($lname) && !empty($city) && !empty($country) && !empty($street) && !empty($district) && !empty($extnum)){
		$result = $m->executeBulkWrite('sample_airbnb.Clients',$bulk);
    echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
		}else{
			echo"<script>alert('Llena todos los formularios')</script>";
      echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
		}
  		?>