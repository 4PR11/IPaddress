<?php
	require 'Slim/Slim.php';

	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();

	$Current_User = array(
		'isAnonimus' => true,
		'name' => "Dima pidor",
		'id' => "10"
	); 

	$app->get(
	    '/login',
	    function () {
	        Include("login.php");
	    }
	);

	$app->get(
	    '/',
	    function () {
	        Include("main.php");
	    }
	);

	$app->get(
	    '/teacher',
	    function () {
	        Include("teacher.php");
	    }
	);

	$app->post(
	    '/getUser',
	    function () {
	        $login = $_POST['Lgn'];
			$pass = $_POST['pass'];
			
			$link =  mysqli_connect("localhost","root","","cygli");
			$result = mysqli_query ($link,"SELECT * FROM WORKERS WHERE (LOGIN = '$login')");

			$row = mysqli_fetch_assoc($result);
			header('http://localhost');
			if (($row["PASSWORD"] != "") && (strcmp($row["PASSWORD"],$pass)===0)){
				$Current_User["isAnonimus"] = false;
				$Current_User["name"] = $row["NAME"];
				$Current_User["id"] = $row["WO_ID"];

				header('Location: http://localhost');
			} else{
				echo "error";
			}
	    }
	);

	$app->run();
?>