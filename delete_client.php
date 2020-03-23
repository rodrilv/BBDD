<?php
include("conexion.php");
$id = $_POST["id"];
if(!empty($id)){
	$_id1 = $bulk->update(
		["_id" => intval($id)], 
		['$set'=>["Status"=>"false"]],
		["multi"=>"true"]
	); 
			$result = $m->executeBulkWrite('sample_airbnb.Clients',$bulk);
    		echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
    	}else{
	 		echo"<script>alert('Make sure all fields are filled!')</script>";
     		echo"<script>location.href='http://localhost/bbdd/clientes.php'</script>";
		}
 ?>