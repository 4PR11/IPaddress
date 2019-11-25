<?php
	require 'Slim/Slim.php';

	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();
	$GLOBALS['Current_User'] = array(
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
	        Include_once("main.php");
	    }
	);

	$app->get(
	    '/teacher',
	    function () {
	        Include("teacher.php");
	    }
	);

	$app->post(
	    '/WorkerSignIn',
	    function () {
	        $login = $_POST['Lgn'];
			$pass = $_POST['pass'];
			
			$link =  mysqli_connect("localhost","root","","cygli");
			$result = mysqli_query ($link,"SELECT * FROM WORKERS WHERE (LOGIN = '$login')");

			$row = mysqli_fetch_assoc($result);
			if (($row["PASSWORD"] != "") && (strcmp($row["PASSWORD"],$pass)===0)){
				$Current_User["isAnonimus"] = false;
				$Current_User["name"] = $row["NAME"];
				$Current_User["id"] = $row["WO_ID"];

				echo "МЫ ОТПРАВЛЯЕМСЯ";
			} else{
				echo "error";
			}
	    }
	);

	$app->post(
	    '/StudentSignIn',
	    function () {
	        $group = $_POST['group'];
			$code = $_POST['code'];
			
			$link =  mysqli_connect("localhost","root","","cygli");
			$result = mysqli_query ($link,"SELECT * FROM STUDENTS S INNER JOIN GROUPS G ON (S.GR_ID = G.GR_ID) WHERE (S.GR_ID = '$group') AND (S.ADC = '$code')");

			$row = mysqli_fetch_assoc($result);
			if (($row["GR_ID"] != "") && (strcmp($row["GR_ID"],$group)===0)){
				$Current_User["isAnonimus"] = false;
				$Current_User["name"] = $row["NAME"];
				$Current_User["id"] = $row["ST_ID"];

				echo "МЫ ОТПРАВЛЯЕМСЯ";
			} else{
				echo "error";
			}
	    }
	);

	$app->run();
?>