<?php 
	$group = $_POST['group'];
	$code = $_POST['code'];

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT ST_ID FROM STUDENTS S INNER JOIN GROUPS G ON (S.GR_ID = G.GR_ID) WHERE (S.GR_ID = '$group') AND (S.ADC = '$code')");

	while( $row = mysqli_fetch_assoc($result) ){
		echo $row["ST_ID"];
	}
?>