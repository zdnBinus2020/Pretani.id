<?php 


$host       =   "sql12.freemysqlhosting.net";
$user       =   "sql12214602";
$password   =   "c7FkFkE4TZ";
$database   =   "BlueJack";


$link = mysqli_connect('$sql12.freemysqlhosting.net', '$sql12214602', '$c7FkFkE4TZ','$BlueJack');


	$books = [];

	while($data = $query_result->fetch_assoc() )
	{

		$restaurants[] =$data;
	}

	header('content-type: application/json');
	print json_encode($restaurants);

	
 ?>