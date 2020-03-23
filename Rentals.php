<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
     <link rel="stylesheet" type="text/css" href="css/estilos.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
    <title>Rentals</title>
    </head>
       <form method="POST" action="">
      <label class="titulo">Rentals</label>
      <div class="formulario">
      <div class = "dropdown column "><span><h2>Rent</h2></span><div class = "dropdown-content">
      <div class="input">
      ID_customer:<input class="form-control" type="text" name="id_customer"></input>
      ID_property:<input class="form-control" type="text" name="id_property"></input><br>
      <button type="submit" class="btn btn-secondary ">Register</button></div>
      </div><a></div></div>
      </div>
      </form>
      <a class="custom" href="clientes.php">Customers</a>



      <!-- TE DEJO ESTO AUNQUE ESTE MAL , POS SABE, PARA HACERTE EL COSO DE HTML EN PHP-->
      
<div>
<body>
<form method="POST" action="database.php">
  <table>
  <thead>
    <tr>
      <table class="table-dark table-bordered tabla2">
      <th scope="ccol">ID property</th>
      <th scope="col">Property Name</th>
      <th scope="col">Price</th>
      <th scope="col">Host Name</th>
  </thead>
<tbody>
  <?php
      include("conexion.php");
      error_reporting(0);
      $filter = ['price' => ['$gt'=>250]];
      $options =[ ['_id' => 1], ['name'=> 1], ['price'=> 1], ['host'=>["host_name"=>1]]]; 
      $query = new MongoDB\Driver\Query($filter, $options);
      $rows = $m->executeQuery('sample_airbnb.listingsAndReviews', $query); // $m contains the connection object to MongoDB
      foreach($rows as $r){
      $r = json_decode(json_encode($r),true);
      printf("<tr><th>%d</th><th>%s</th><th><center>%d</center></th><th>%s</th></tr>", 
        $r['_id'],
        $r['name'],
        implode(" ",$r['price']),
        $r['host']['host_name']
      );
      }
      ?>
</tbody>
</table>
</div>
<table>
 <thead>
    <tr>
           <div id="contenedor">
     <table class=" table-dark table-bordered tabla3">
      <th scope="ccol">ID customer</th>
      <th scope="col">Name</th>
      <th scope="col">ID rented property</th>
      <th scope="col">Price</th>
  </thead>
  <tbody>
     <?php
      include("conexion.php");
      error_reporting(0);
      $id_customer = $_POST["id_customer"];
      $id_property = $_POST["id_property"];
      $filter = ['_id'=>$id_property];
      $options =[ ['_id' => 1], ['name'=> 1], ['price'=> 1], ['host'=>["host_name"=>1]]]; 
      $query = new MongoDB\Driver\Query($filter, $options);
      $rows = $m->executeQuery('sample_airbnb.listingsAndReviews', $query); // $m contains the connection object to MongoDB
      foreach($rows as $r){
      $r = json_decode(json_encode($r),true);
    }
    //var_dump($r);
      $_id1 = $bulk->update(
      ["_id"=>intval($id_customer)], 
      ['$set'=>["Rented_properties"=>["property_id"=>intval($id_property), "property_name"=>$r['name']]]],
      ["multi"=>"true", "upsert"=>"false"]);
      if(!empty($id_property)&&!empty($id_customer)){
      $result = $m->executeBulkWrite('sample_airbnb.Clients',$bulk);
    }
    $filter = ["Status"=>"true"];
    $options =[ ['_id' => 1] ]; 
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
    foreach($rows as $r){
    $r = json_decode(json_encode($r),true);
  
    printf("<tr><th>%d</th><th>%s</th><th>%s</th><th>%s</th>",
  $r['_id'],
  $r['Firstname'],
  $r['Rented_properties']['property_id'],
  $r['Rented_properties']['property_name'],
  );
  }
       header('Location: rentals.php');
       unset($id_customer);
       unset($id_property);
      ?>
  </tbody>
 <body>
  <thead></div>
</form>
</html>