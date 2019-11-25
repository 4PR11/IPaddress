<?php 
	$login = $_POST['Lgn'];
	$pass = $_POST['pass'];
	
	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT * FROM WORKERS WHERE (LOGIN = '$login')");

	$row = mysqli_fetch_assoc($result)
	if ($row["PASSWORD"] != ""){
		
	}

	if ($result != ""){
		echo "ВОШЕЛ";
	}
?>