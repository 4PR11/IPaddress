<?php
	$date = $_POST['work-date'];
	$subject = $_POST['subject-select']; 
	$modul = $_POST['modul-selects'];
	$theme = $_POST['theme-name'];

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"INSERT INTO works (DATE, SB_ID, MO_ID, THEME,MD_ID,WO_ID) VALUES ('$date', $subject, $modul,'$theme',2,30)");
	$i=0;
	while (isset ($_POST[$i])){
	    echo ($_POST[(string)$i]);
	    $i++;
	}
	echo "успех";
?>