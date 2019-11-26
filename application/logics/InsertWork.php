<?php
	$date = $_POST['work-date'];
	$subject = $_POST['subject-select']; 
	$modul = $_POST['modul-selects'];
	$theme = $_POST['theme-name'];

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"INSERT INTO works (DATE, SB_ID, MO_ID, THEME,MD_ID,WO_ID) VALUES ('$date', $subject, $modul,'$theme',2,30)");
	$workId = mysqli_insert_id($link);

	$i=0;
	while (isset ($_POST[$i])){
		$stuId = $_POST[$i];
		$result = mysqli_query ($link,"INSERT INTO lists (ST_ID, WR_ID) VALUES ($stuId, $workId)");
	    $i++;
	}
	echo "успех";
?>