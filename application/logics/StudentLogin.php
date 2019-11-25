<?php 
	$group = $_POST['group'];
	$code = $_POST['code'];

	$link =  mysqli_connect("localhost","root","","cygli");
	$result = mysqli_query ($link,"SELECT ST_ID FROM STUDENTS S INNER JOIN GROUPS G ON (S.GR_ID = G.GR_ID) WHERE (S.GR_ID = '$group') AND (S.ADC = '$code')");

	$arr1 = array($row["ST_ID"],1);
	$json_str = json_encode($arr1);
	
	while( $row = mysqli_fetch_assoc($result) ){
		echo $json_str;
	}
?>