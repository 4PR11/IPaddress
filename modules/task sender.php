<?php
	include('Gens/Gens.php');
	session_start();
	$num = (int)$_POST['now_num_task'];
	if ($num < 3){
		echo $_SESSION['ip']->getTaskStr($num);
	} else {
		echo "some error";
	}
?>