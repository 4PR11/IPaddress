<?php
	include('Gens/Gens.php');
	session_start();
	$data = json_decode($_POST['dat']);
	$answers = $_SESSION['ip']->inspect($data);
	echo (json_encode($answers));
		#$_SESSION['ip']->getTask($i)
	for ($i = 0; $i < 3; $i++) {
		if ($answers[$i]['netAddress']) 
			$flag = 1;
		else $flag = 0;

		$task = $_SESSION['ip']->getTask($i);
		$d = ltrim($task->getIp()->dec(), "0").'/'.$task->getMask()->hex();

		$link =  mysqli_connect("localhost","root","","cygli");
		$result = mysqli_query ($link,"INSERT INTO logs (WR_ID, QUEST, ANSWER, RIGHT_FALSE) VALUES (-1,'".$d."','".$data[$i]->netAddress."', ".$flag.")");
	}
?>