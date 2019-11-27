<?php
	$name = $_POST['student-name'];
	$group = $_POST['group'];
	$code = $_POST['code'];	

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT * FROM students WHERE ((ADC = '$code'))");

	$row = mysqli_fetch_assoc($result);
	if ($row["ADC"] != ""){
		echo "error_is_alredy";
	}else{
		$result = mysqli_query ($link,"INSERT INTO students (NAME, GR_ID, ADC) VALUES ('$name', $group, '$code')");
		echo "success_status";
	}

	mysqli_close($db);
?>