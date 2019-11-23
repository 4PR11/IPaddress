<?php
	require 'Slim/Slim.php';

	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();

	//$app->render('index.php', ['nickname' => $_POST['nickname']]);

	$app->get(
	    '/',
	    function () {
	        Include("login.php");
	    }
	);

	$app->run();
?>