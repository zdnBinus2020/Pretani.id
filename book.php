<?php 
		header("https://dashboard.heroku.com/apps/radiant-dawn-22720");

//Server: sql12.freemysqlhosting.net
//Name: sql12214602
//Username: sql12214602
//Password: c7FkFkE4TZ
//Port number: 3306
			

$host       =   "sql12.freemysqlhosting.net";
$user       =   "sql12214602";
$password   =   "c7FkFkE4TZ";
$database   =   "sql12214602";


$link = mysqli_connect($host, $user, $password  ,$database);

$query_result = $link->query("SELECT * FROM BlueJack")
	$books = [];

	while($data = $query_result->fetch_assoc() )
	{

		$books[] =$data;
	}

	header('content-type: application/json');
	print json_encode($books);

	
 ?>