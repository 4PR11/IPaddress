<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	echo $root;
	include($root."/logics/constants.php");

	$db = mysqli_connect(type,db_login,db_password, db_name);
	$sql = "SELECT GR_ID, NAME FROM GROUPS";
	if ($result = mysqli_query($db, $sql))
	{
		while($myrow = mysqli_fetch_assoc($result)) {
			echo ('<option value ="'.$myrow['GR_ID'].'">'.$myrow['NAME'].'</option>');
		}
		mysqli_free_result($result);
	}
	mysqli_close($db);
?>