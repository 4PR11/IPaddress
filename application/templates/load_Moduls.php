<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include($root."/logics/constants.php");

	$db = mysqli_connect(type,db_login,db_password, db_name);
	$sql = "SELECT MO_ID, NAME FROM Modules";
	if ($result = mysqli_query($db, $sql))
	{
		while($myrow = mysqli_fetch_assoc($result)) {
			echo ('<option value ="'.$myrow['MO_ID'].'">'.$myrow['NAME'].'</option>');
		}
		mysqli_free_result($result);
	}
	mysqli_close($db);
?>