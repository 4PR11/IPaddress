<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include($root."/logics/constants.php");

	$db = mysqli_connect(type,db_login,db_password, db_name);
	$sql = "SELECT ST_ID, NAME FROM Students";
	if ($result = mysqli_query($db, $sql))
	{
		$i=0;
		while($myrow = mysqli_fetch_assoc($result)) {
			echo ('<input class="form-check-input" type="checkbox" value="'.$myrow['ST_ID'].'" name="'.$i.'">');
			echo ('<label class="form-check-label" for="memberships1">'.$myrow['NAME'].'</label>');
			echo "<br/>";
			$i++;
		}
		mysqli_free_result($result);
	}
	mysqli_close($db);
?>