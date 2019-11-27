<?php
	$name = $_POST['group-name'];	

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT * FROM groups WHERE (NAME = '$name')");

	$row = mysqli_fetch_assoc($result);
	if ($row["NAME"] != ""){
		echo "error_is_alredy";
	}else{
		$result = mysqli_query ($link,"INSERT INTO groups (NAME) VALUES ('$name')");
		echo "success_status";
	}

	mysqli_close($db);
?>
