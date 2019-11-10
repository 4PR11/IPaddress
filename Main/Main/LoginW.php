<?php 
	$login = $_POST['Lgn'];
	$pass = $_POST['pass'];

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT WO_ID FROM WORKERS WHERE (LOGIN = '$login') AND (PASSWORD = '$pass')");

	while( $row = mysqli_fetch_assoc($result) ){
		echo $row["WO_ID"];
	}
?>