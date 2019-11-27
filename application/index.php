<?php
	require 'Slim/Slim.php';

	\Slim\Slim::registerAutoloader();

	session_start();

	$app = new \Slim\Slim();

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

	$app->get(
	    '/Student',
	    function () {
	        Include("Student.php");
	    }
	);

	$app->post(
	    '/InsertWork',
	    function () {
	        Include("./logics/InsertWork.php");
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
				$_SESSION["name"] = $row["NAME"];
				$_SESSION["id"] = $row["WO_ID"];
				$_SESSION["role"] = "0";
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
			$result = mysqli_query ($link,"SELECT S.ST_ID, G.GR_ID, S.NAME FROM STUDENTS S INNER JOIN GROUPS G ON (S.GR_ID = G.GR_ID) WHERE (S.GR_ID = '$group') AND (S.ADC = '$code')");

			$row = mysqli_fetch_assoc($result);
			if (($row["GR_ID"] != "") && (strcmp($row["GR_ID"],$group)===0)){
				$_SESSION["name"] = $row["NAME"];
				$_SESSION["id"] = $row["ST_ID"];
				$_SESSION["role"] = "1";
			} else{
				echo "error";
			}
	    }
	);

	$app->run();
?>