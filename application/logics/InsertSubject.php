<?php
	$name = $_POST['subject-name'];	

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT * FROM subjects WHERE (NAME = '$name')");

	$row = mysqli_fetch_assoc($result);
	if ($row["NAME"] != ""){
		echo "error_is_alredy";
	}else{
		$result = mysqli_query ($link,"INSERT INTO subjects (NAME) VALUES ('$name')");
		echo "success_status";
	}

	mysqli_close($db);
?>