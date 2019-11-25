<?php
	$i=0;
	while (isset ($_POST[$i])){
	    echo ($_POST[(string)$i]);
	    $i++;
	}
?>