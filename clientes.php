<!DOCTYPE html>
<html>
<head>
	   <link rel="stylesheet" type="text/css" href="css/estilos.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
	  <title>Clientes</title>
    </head>
    <body>
      <label class="titulo">Customers</label>
      <form action="altas_cliente.php" method="POST">
      <div class="formulario">
      <div class = "dropdown column "><span><h2>Register</h2></span><div class = "dropdown-content">
      <div class="input">
      <b>ADDRESS</b><br>
      Street:<input class="form-control" type="text" name="street"></input>
      Int Numb(optional):<input class="form-control" type="text" name="intnum"></input>
      Ext Numb<input class="form-control" type="text" name="extnum"></input>
      City:<input class="form-control" type="text" name="city"></input>
      Country:<input class="form-control" type="text" name="country"></input>
      District:<input class="form-control" type="text" name="district"></input>
      First Name:<input class="form-control" type="text" name="fname"></input>
      Last Name:<input class="form-control" type="text" name="lname"></input><br>
      <!--<label>Status (Active/Inactive)</label>
      <select class="form-control">
      <option>Active</option>
      <option>Inactive</option></select><p>-->
      <div class="psn">
      <button type="submit" class="btn btn-secondary ">Register</button></div>
      </div>
  </div>
</div>
</div>
  		</form>
  		<form method="POST" action="delete_client.php">
      <div class="formulario2">
      <div class = "dropdown column "><span><h2>Delete</h2></span><div class = "dropdown-content">
      <div class="input">
      ID:<input class="form-control" type="number" name="id"></input>
      <div class="psn"><br>
      <button type="submit" class="btn btn-secondary ">Delete</button></div>
      </form>
      <form method="POST" action="recover_client.php">
      <br><label><b>Recover Him</b></label></br>
      What is your name?:<input class="form-control" type="text" name="name"></input>
      And Last name?:<input class="form-control" type="text" name="last_name"></input>
      Which country?:<input class="form-control" type="text" name="country"></input>
      <br><button type="submit" class="btn btn-secondary ">Recover</button></div></br>
      </div></a></div></div>
      </div>
      </div></a></div></div>
      </div>
      </form>
      <script type="text/javascript">function con_av(){
        window.open("http://localhost/bbdd/search.php","Avanzadas","height=370, width=600");
        }
    </script>
      <div class="formulario3">
      <div class = "dropdown column" onclick="con_av()"><h2>Search</h2>
      </div></a></div>
      <a class="custom2" href="rentals.php">Rentals</a>
      
  </form>
<table class="table table-dark table-bordered tabla">
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
  	error_reporting(0);
  	include('conexion.php');
  	$id = $_POST["id"];
  	$name = $_POST["name"];
  	$country = $_POST["country"];
	$filter = ["Status"=>"true"];
	$options =[ ['_id' => 1] ]; 
	$query = new MongoDB\Driver\Query($filter, $options);
	$rows = $m->executeQuery('sample_airbnb.Clients', $query); // $m contains the connection object to MongoDB
	foreach($rows as $r){
		$r = json_decode(json_encode($r),true);
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
	}
  	?>
  </tbody>
  	 </table>
     		</body>  
</form>
</html>


	